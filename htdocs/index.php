<?php
    require_once __DIR__ . '/../vendor/autoload.php';

    use {{NAMESPACE}}\BladeInit;

    use {{NAMESPACE}}\App\Config;
    use {{NAMESPACE}}\App\Router;

    use {{NAMESPACE}}\Middleware\AuthMiddleware;
    use {{NAMESPACE}}\Controller\HomeController;

    Config::loadEnv(); // Muat file .env

    Router::add('GET', '/', HomeController::class, 'index');
    Router::add('GET', '/user', HomeController::class, 'user');
    Router::add('POST', '/user', HomeController::class, 'createUser');
    Router::add('GET', '/user/information/{id}', HomeController::class, 'detail');
    Router::add('GET', '/user/{id}/delete', HomeController::class, 'deleteUser');
    Router::add('POST', '/user/{id}/update', HomeController::class, 'updateUser');

    // Contoh Penggunaan Middleware
    // Router::add('GET', '/dashboard', DashboardController::class, 'homeDashboard', [AuthMiddleware::class]);

    BladeInit::init(); // Inisialisasi Blade
    Router::cacheRoutes();
    Router::run();
?>