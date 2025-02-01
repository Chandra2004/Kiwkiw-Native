<?php
    namespace Punyachandra\KiwkiwNative\app;

    use Punyachandra\KiwkiwNative\BladeInit; // Sesuaikan namespace
    
    class View {
        public static function render($view, $data = []) {
            echo BladeInit::getInstance()->make($view, $data)->render();
        }
    }
?>