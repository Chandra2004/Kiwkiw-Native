<?php

namespace {{NAMESPACE}}\Controller;

use {{NAMESPACE}}\App\Config;
use {{NAMESPACE}}\App\Database;
use {{NAMESPACE}}\App\View;
use Exception; // Ensure to include Exception

class HomeController
{
    function index() {
        Config::loadEnv(); // Muat file .env
        
        try {
            $db = new Database();
            $status = "success";
        } catch (Exception $e) {
            $status = $e->getMessage();
        }

        $model = [
            'title' => 'MVC Chandra',
            'status' => $status,
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
