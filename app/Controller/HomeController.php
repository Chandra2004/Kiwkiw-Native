<?php

namespace {{NAMESPACE}}\Controller;

use {{NAMESPACE}}\App\Config;
use {{NAMESPACE}}\App\View;

class HomeController
{
    function index() {
        Config::loadEnv(); // Muat file .env
        $model = [
            // 'title' => 'Judul Halaman'
            'base_url' => Config::get('BASE_URL')
        ];

        View::render('interface/home', $model);
    
    }
    
    function error404() {
        Config::loadEnv(); // Muat file .env
        $model = [
            // 'title' => 'Judul Halaman'
            'base_url' => Config::get('BASE_URL')
        ];

        View::render('interface/error404', $model);
    }
}
