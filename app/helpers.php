<?php
    use User\KiwkiwNative\App\Config;

    if (!function_exists('url')) {
        function url($path = '') {
            return rtrim(Config::get('BASE_URL'), '/') . '/' . ltrim($path, '/');
        }
    }
?>