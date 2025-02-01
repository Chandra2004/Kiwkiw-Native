<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Punyachandra\KiwkiwNative\BladeInit;
use Punyachandra\KiwkiwNative\App\Config;
use Punyachandra\KiwkiwNative\App\Router;
use Punyachandra\KiwkiwNative\Middleware\AuthMiddleware;
use Punyachandra\KiwkiwNative\Controller\HomeController;

Config::loadEnv(); // Muat file .env

Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/user', HomeController::class, 'user');
Router::add('GET', '/user/information/{id}', HomeController::class, 'detail');
Router::add('GET', '/404', ErrorController::class, 'error404');

// Contoh Penggunaan Middleware
// Router::add('GET', '/dashboard', DashboardController::class, 'homeDashboard', [AuthMiddleware::class]);

BladeInit::init(); // Inisialisasi Blade
Router::cacheRoutes();
Router::run();