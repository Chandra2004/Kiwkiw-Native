<?php
    namespace {{NAMESPACE}}\Controller;

    use Spatie\ImageOptimizer\OptimizerChainFactory;

    use {{NAMESPACE}}\App\Config;
    use {{NAMESPACE}}\App\Database;
    use {{NAMESPACE}}\App\View;

    // Models
    use {{NAMESPACE}}\Models\HomeModel;
    // ========

    use {{NAMESPACE}}\App\CacheManager;

    use Exception;

    class HomeController
    {
        public function index() {
            Config::loadEnv(); // Muat file .env
            
            try {
                // Ambil koneksi database jika diperlukan
                $db = Database::getInstance();
                $status = "success";
            } catch (Exception $e) {
                $status = $e->getMessage();
            }

            $model = [
                'status' => $status
            ];
            View::render('interface.home', $model);
        }

        public function user() {
            Config::loadEnv(); // Muat file .env

            $homeModel = new HomeModel();
            // Ambil data user dari model, yang sudah menerapkan cache Redis
            $data = $homeModel->getUserData();

            try {
                // Pastikan koneksi database juga bekerja dengan baik jika perlu
                $db = Database::getInstance();
                $status = "success";
            } catch (Exception $e) {
                $status = $e->getMessage();
            }

            // Pastikan $data berisi 'users' yang valid
            $model = [
                'userData' => $data['users'] ?? [], // Tambahkan pengecekan untuk mencegah error jika data kosong
                'status' => $status,
                'base_url' => Config::get('BASE_URL')
            ];

            View::render('interface.user', $model);
        }

        public function detail(string $id) {
            Config::loadEnv(); // Muat file .env
            
            $homeModel = new HomeModel();
            // Ambil data user dan detailnya
            $data = $homeModel->getUserData(); // Ini mengambil semua data user
            $userDetail = $homeModel->getUserDetail($id); // Ini mengambil detail user berdasarkan ID

            if (!$userDetail) {
                header("Location: " . Config::get('BASE_URL') . "/404");
                exit();
            }

            // Siapkan model yang akan diteruskan ke view
            $model = [
                'userData' => $data['users'] ?? [], // Pengecekan data user
                'user' => $userDetail ?? null, // Pengecekan detail user
                'base_url' => Config::get('BASE_URL')
            ];

            View::render('interface.detail', $model);
        }

        public function deleteUser(string $id) {
            Config::loadEnv();

            try {
                $homeModel = new HomeModel();
                // Hapus data pengguna dari database
                $homeModel->deleteUserData($id);

                // Hapus cache Redis
                CacheManager::forget('all_users');
                CacheManager::forget("user_detail:{$id}");
                
                // pesan sukses
                header('Location: ' . Config::get('BASE_URL') . '/user?status=success&message=User delete successfully');
            } catch (Exception $e) {
                //pesan gagal;
                header('Location: ' . Config::get('BASE_URL') . '/user?status=success&message=' . urldecode($e->getMessage()));
            }
        }

        public function createUser() {
            Config::loadEnv();
        
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'] ?? '';
                $email = $_POST['email'] ?? '';
                $profilePicture = $_FILES['profile_picture'] ?? null;
        
                // Validasi input
                if (empty($name) || empty($email)) {
                    View::render('interface.user', ['error' => "Name and email cannot be empty"]);
                    return;
                }
        
                if ($profilePicture && $profilePicture['error'] === UPLOAD_ERR_OK) {
                    // Validasi ekstensi file
                    $allowedExtensions = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'];
                    $fileExtension = pathinfo($profilePicture['name'], PATHINFO_EXTENSION);
        
                    if (!in_array($fileExtension, $allowedExtensions)) {
                        View::render('interface.user', ['error' => "Invalid file type. Only JPG, JPEG, and PNG are allowed."]);
                        return;
                    }
        
                    // Validasi ukuran file
                    $maxFileSize = 2 * 1024 * 1024; // 2MB
                    if ($profilePicture['size'] > $maxFileSize) {
                        View::render('interface.user', ['error' => "File size exceeds the maximum limit of 2MB."]);
                        return;
                    }
        
                    $uploadDir = __DIR__ . '/../../htdocs/uploads/';
                    if (!file_exists($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }
        
                    // Path file gambar yang akan disimpan
                    $fileName = uniqid() . '.webp';
                    $filePath = $uploadDir . $fileName;
        
                    // Pindahkan file sementara
                    move_uploaded_file($profilePicture['tmp_name'], $filePath);
        
                    // Konversi dan kompres gambar ke WebP
                    try {
                        $image = imagecreatefromstring(file_get_contents($filePath));
                        if ($image !== false) {
                            imagewebp($image, $filePath, 70); // 70 adalah kualitas WebP
                            imagedestroy($image);
                        } else {
                            throw new Exception("Failed to process the image.");
                        }
                    } catch (Exception $e) {
                        View::render('interface.user', ['error' => "Image conversion failed: " . $e->getMessage()]);
                        return;
                    }
        
                    // Optimasi file menggunakan Spatie
                    $optimizerChain = OptimizerChainFactory::create();
                    $optimizerChain->optimize($filePath);
        
                    // Simpan data ke database
                    try {
                        $db = Database::getInstance();
                        $query = "INSERT INTO users (name, email, profile_picture) VALUES (:name, :email, :profile_picture)";
                        $db->query($query);
                        $db->bind(':name', $name);
                        $db->bind(':email', $email);
                        $db->bind(':profile_picture', $fileName);
                        $db->execute();
        
                        header('Location: ' . Config::get('BASE_URL') . '/user');
                        exit;
                    } catch (Exception $e) {
                        View::render('interface.user', ['error' => "Failed to save user data: " . $e->getMessage()]);
                        return;
                    }
                } else {
                    View::render('interface.user', ['error' => "Failed to upload profile picture"]);
                }
            } else {
                View::render('interface.user');
            }
        }

        public function updateUser(string $id) {
            Config::loadEnv();
        
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'] ?? '';
                $email = $_POST['email'] ?? '';
                $profilePicture = $_FILES['profile_picture'] ?? null;
        
                if (empty($name) || empty($email)) {
                    header('Location: ' . Config::get('BASE_URL') . "/user/{$id}?status=error&message=Name and Email cannot be empty");
                    exit;
                }
        
                try {
                    $homeModel = new HomeModel();
                    $oldUser = $homeModel->getUserDetail($id);
                    $oldProfilePicture = $oldUser['profile_picture'] ?? null;
        
                    $newProfilePicture = null;
                    if ($profilePicture && $profilePicture['error'] === UPLOAD_ERR_OK) {
                        $allowedExtensions = ['jpg', 'jpeg', 'png'];
                        $fileExtension = pathinfo($profilePicture['name'], PATHINFO_EXTENSION);
        
                        if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
                            header('Location: ' . Config::get('BASE_URL') . "/user/{$id}?status=error&message=Invalid file type");
                            exit;
                        }
        
                        $uploadDir = __DIR__ . '/../../htdocs/uploads/';
                        if (!file_exists($uploadDir)) {
                            mkdir($uploadDir, 0777, true);
                        }
        
                        $fileName = uniqid() . '.webp';
                        $filePath = $uploadDir . $fileName;
        
                        move_uploaded_file($profilePicture['tmp_name'], $filePath);
        
                        // Konversi ke WebP dan optimasi
                        $image = imagecreatefromstring(file_get_contents($filePath));
                        if ($image !== false) {
                            imagewebp($image, $filePath, 70);
                            imagedestroy($image);
                        }
        
                        $optimizerChain = OptimizerChainFactory::create();
                        $optimizerChain->optimize($filePath);
        
                        $newProfilePicture = $fileName;
        
                        if ($oldProfilePicture && file_exists($uploadDir . $oldProfilePicture)) {
                            unlink($uploadDir . $oldProfilePicture);
                        }
                    }
        
                    $homeModel->updateUserData($id, $name, $email, $newProfilePicture);
        
                    CacheManager::forget('all_users');
                    CacheManager::forget("user_detail:{$id}");
        
                    header('Location: ' . Config::get('BASE_URL') . "/user?status=success&message=User updated successfully");
                    exit;
                } catch (Exception $e) {
                    header('Location: ' . Config::get('BASE_URL') . "/user/{$id}?status=error&message=" . urlencode($e->getMessage()));
                    exit;
                }
            } else {
                header('Location: ' . Config::get('BASE_URL') . "/user/{$id}");
                exit;
            }
        }    
    }
?>