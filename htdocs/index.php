<?php
    require_once __DIR__ . '/../vendor/autoload.php';

    use Punyachandra\Main\BladeInit;

    use Punyachandra\Main\App\Config;
    use Punyachandra\Main\App\Router;

    use Punyachandra\Main\Middleware\AuthMiddleware;
    use Punyachandra\Main\Controller\HomeController;

    Config::loadEnv(); // Muat file .env

    Router::add('GET', '/', HomeController::class, 'index');
    Router::add('GET', '/user', HomeController::class, 'user');
    Router::add('GET', '/user/information/{id}', HomeController::class, 'detail');

    // Contoh Penggunaan Middleware
    // Router::add('GET', '/dashboard', DashboardController::class, 'homeDashboard', [AuthMiddleware::class]);

    BladeInit::init(); // Inisialisasi Blade
    Router::cacheRoutes();
    Router::run();
?>