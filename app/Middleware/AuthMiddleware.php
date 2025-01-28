<?php

namespace {{NAMESPACE}}\Middleware;


class AuthMiddleware implements Middleware
{
    function before()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('location: ' . BASE_URL . '/login');
            exit();
        }
    }
}
