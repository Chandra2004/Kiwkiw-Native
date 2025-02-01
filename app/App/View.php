<?php
    namespace Punyachandra\Main\app;

    use Punyachandra\Main\BladeInit;
    
    class View {
        public static function render($view, $data = []) {
            echo BladeInit::getInstance()->make($view, $data)->render();
        }
    }
?>