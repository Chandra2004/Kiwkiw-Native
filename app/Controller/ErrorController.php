<?php
    namespace {{NAMESPACE}}\Controller;

    use {{NAMESPACE}}\App\Config;
    use {{NAMESPACE}}\App\View;

    class ErrorController
    {
        function error404() {
            $model = [];

            View::render('error.error404', $model);
        }
        
        function error500() {
            $model = [];

            View::render('error.error500', $model);
        }
    }
?>