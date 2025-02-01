<?php
    namespace {{NAMEPACE}}\app;

    use {{NAMEPACE}}\BladeInit; // Sesuaikan namespace
    
    class View {
        public static function render($view, $data = []) {
            echo BladeInit::getInstance()->make($view, $data)->render();
        }
    }
?>