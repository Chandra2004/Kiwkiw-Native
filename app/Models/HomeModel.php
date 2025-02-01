<?php
    namespace Punyachandra\KiwkiwNative\Models;

    use Punyachandra\KiwkiwNative\App\CacheManager;
    use Punyachandra\KiwkiwNative\App\Database;
    use Punyachandra\KiwkiwNative\App\Config;

    class HomeModel {
        private $db;

        public function __construct()
        {
            // $this->db = new Database();
            $this->db = Database::getInstance();
        }

        // public function getUserData() {
        //     $this->db->query("SELECT * FROM users");
        //     $data['users'] = $this->db->resultSet();

        //     return $data;
        // }

        // public function getUserDetail($id) {
        //     $this->db->query("SELECT * FROM users WHERE id = :id");
        //     $this->db->bind('id', $id);
        //     $data = $this->db->single();

        //     return $data;
        // }
        public function getUserData() {
            return CacheManager::remember(
                'all_users', 
                300, 
                function() {
                    $this->db->query("SELECT * FROM users");
                    $data['users'] = $this->db->resultSet();
                    return $data;
                }
            );
        }

        public function getUserDetail($id) {
            return CacheManager::remember(
                "user_detail:{$id}", // Unique key berdasarkan ID user
                300, // TTL 5 menit (sama dengan getUserData)
                function() use ($id) { // Gunakan use ($id) untuk akses parameter
                    $this->db->query("SELECT * FROM users WHERE id = :id");
                    $this->db->bind('id', $id);
                    $data = $this->db->single();
                    return $data;
                }
            );
        }
    }
?>
