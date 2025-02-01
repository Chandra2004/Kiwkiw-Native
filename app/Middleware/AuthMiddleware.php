<?php
    namespace {{NAMEPACE}}\Middleware;

    class AuthMiddleware implements Middleware {
        function before()
        {
            session_start();
            if (!isset($_SESSION['user_id'])) {
                header('location: ' . Config::get('BASE_URL') . '/login');
                exit();
            }
        }
    }
?>
