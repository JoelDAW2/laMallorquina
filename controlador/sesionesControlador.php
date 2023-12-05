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

        /*
        public static function destruirSesion() {
            self::crearSesion();
            if (isset($_POST['btnSesiones']) && $_POST['btnSesiones'] == "CERRAR SESIÓN") {
                session_destroy();
            }
        }
        */
    }
?>