<?php

    // ini file public/index.php
    require_once __DIR__ . '/../vendor/autoload.php';

    use {{NAMESPACE}}\App\Router;
    use {{NAMESPACE}}\Middleware\AuthMiddleware;

    use {{NAMESPACE}}\Controller\HomeController;

    Router::add('GET', '/', HomeController::class, 'index');

    // Contoh Penggunaan Middleware
    Router::add('GET', '/dashboard', DashboardController::class, 'homeDashboard', [AuthMiddleware::class]);

    Router::run();
?>
