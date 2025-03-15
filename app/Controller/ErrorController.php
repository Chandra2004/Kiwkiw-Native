<?php
    namespace User\KiwkiwNative\Controller;

    use User\KiwkiwNative\App\Config;
    use User\KiwkiwNative\App\View;

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