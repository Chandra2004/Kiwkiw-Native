<?php
    namespace {{NAMESPACE}}\Helpers;

    use {{NAMESPACE}}\App\Config;

    class Helper {
        /**
         * 1️⃣ Generate URL dari konfigurasi BASE_URL
         */
        public static function url($path = '') {
            $baseUrl = Config::get('BASE_URL') ?: '/';
            return rtrim($baseUrl, '/') . '/' . ltrim($path, '/');
        }

        /**
         * 2️⃣ Redirect ke halaman lain dengan status & pesan
         */
        public static function redirect($url, $status = null, $message = null) {
            $query = [];
            if ($status) $query['status'] = $status;
            if ($message) $query['message'] = urlencode($message);

            $queryString = !empty($query) ? '?' . http_build_query($query) : '';
            header("Location: " . self::url($url) . $queryString);
            exit();
        }

        /**
         * 3️⃣ Mengambil data dari GET & POST (lebih aman)
         */
        public static function request($key = null, $default = null) {
            $requestData = array_merge($_GET, $_POST);
            return $key === null ? $requestData : ($requestData[$key] ?? $default);
        }

        /**
         * 4️⃣ Flash Message (pesan sementara)
         */
        public static function set_flash($key, $message) {
            if (session_status() !== PHP_SESSION_ACTIVE) session_start();
            $_SESSION[$key] = $message;
        }

        public static function get_flash($key) {
            if (session_status() !== PHP_SESSION_ACTIVE) session_start();
            if (isset($_SESSION[$key])) {
                $message = $_SESSION[$key];
                unset($_SESSION[$key]);
                return $message;
            }
            return null;
        }

        /**
         * 5️⃣ Session helpers
         */
        public static function session_get($key, $default = null) {
            if (session_status() !== PHP_SESSION_ACTIVE) session_start();
            return $_SESSION[$key] ?? $default;
        }

        public static function session_write($key, $value) {
            if (session_status() !== PHP_SESSION_ACTIVE) session_start();
            $_SESSION[$key] = $value;
        }

        public static function session_destroy_all() {
            if (session_status() !== PHP_SESSION_ACTIVE) session_start();
            session_unset();
            session_destroy();
        }

        /**
         * 6️⃣ Escape output untuk menghindari XSS
         */
        public static function e($string) {
            return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
        }

        /**
         * 7️⃣ Hash & Verify Password
         */
        public static function hash_password($password) {
            return password_hash($password, PASSWORD_BCRYPT);
        }

        public static function verify_password($password, $hashedPassword) {
            return password_verify($password, $hashedPassword);
        }

        /**
         * 8️⃣ Validasi Email
         */
        public static function is_email($email) {
            return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
        }

        /**
         * 9️⃣ Mendapatkan tanggal sekarang
         */
        public static function current_date($format = 'Y-m-d H:i:s') {
            return date($format);
        }

        /**
         * 🔟 Format Rupiah
         */
        public static function rupiah($angka) {
            return "Rp " . number_format($angka, 0, ',', '.');
        }

        /**
         * 1️⃣1️⃣ Generate Random String
         */
        public static function random_string($length = 16) {
            return bin2hex(random_bytes(ceil($length / 2)));
        }

        /**
         * 1️⃣2️⃣ Cek Request Method
         */
        public static function is_post() {
            return $_SERVER['REQUEST_METHOD'] === 'POST';
        }

        public static function is_get() {
            return $_SERVER['REQUEST_METHOD'] === 'GET';
        }

        /**
         * 1️⃣3️⃣ Mendapatkan IP Address
         */
        public static function get_client_ip() {
            $ip_keys = ['HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR'];
            foreach ($ip_keys as $key) {
                if (!empty($_SERVER[$key])) {
                    return filter_var($_SERVER[$key], FILTER_VALIDATE_IP);
                }
            }
            return '0.0.0.0';
        }
    }
?>