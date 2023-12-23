<?php
    class sesionesControlador{
        public static function crearSesion() {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if (!isset($_SESSION['lista'])) {
                $_SESSION['lista'] = array();
            }
        }
    }
?>