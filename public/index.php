<?php

    // ini file public/index.php
    require_once __DIR__ . '/../vendor/autoload.php';

    use {{NAMESPACE}}\App\Config;

    use {{NAMESPACE}}\App\Router;
    use {{NAMESPACE}}\Middleware\AuthMiddleware;

    use {{NAMESPACE}}\Controller\HomeController;

    Config::loadEnv(); // Muat file .env
    
    Router::add('GET', '/', HomeController::class, 'index');
    Router::add('GET', '/404', HomeController::class, 'error404');

    // Contoh Penggunaan Middleware
    // Router::add('GET', '/dashboard', DashboardController::class, 'homeDashboard', [AuthMiddleware::class]);

    Router::run();
?>
