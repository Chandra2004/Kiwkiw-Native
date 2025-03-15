<?php
    namespace User\KiwkiwNative\app;

    use User\KiwkiwNative\BladeInit;
    
    class View {
        public static function render($view, $data = []) {
            echo BladeInit::getInstance()->make($view, $data)->render();
        }
    }
?>