<?php
    namespace Punyachandra\Main\Controller;

    use Punyachandra\Main\App\Config;
    use Punyachandra\Main\App\Database;
    use Punyachandra\Main\App\View;

    use Punyachandra\Main\Models\HomeModel;

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

            // Siapkan model yang akan diteruskan ke view
            $model = [
                'userData' => $data['users'] ?? [], // Pengecekan data user
                'user' => $userDetail ?? null, // Pengecekan detail user
                'base_url' => Config::get('BASE_URL')
            ];

            View::render('interface.detail', $model);
        }
    }
?>