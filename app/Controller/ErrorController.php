<?php
    namespace {{NAMESPACE}}\Controller;

    use {{NAMESPACE}}\App\Config;
    use {{NAMESPACE}}\App\View;

    class ErrorController
    {
        function error404() {
            Config::loadEnv(); // Muat file .env
            $model = [
                'base_url' => Config::get('BASE_URL')
            ];

            View::render('error.error404', $model);
        }
        
        function error500() {
            Config::loadEnv(); // Muat file .env
            $model = [
                'base_url' => Config::get('BASE_URL')
            ];

            View::render('error.error500', $model);
        }
    }
?>