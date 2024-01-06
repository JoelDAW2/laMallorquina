<?php
    class sesionesControlador{
        // Funcion para crear una sesion
        /*
        public static function crearSesion() {
            // Verificamos si no se ha iniciado sesion y de ser asi, la creamos 
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            // Si la variable de sesion lista no existe, se crea   
            if (!isset($_SESSION['lista'])) {
                $_SESSION['lista'] = array();
            }
        }
        */
    }

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    // Si la variable de sesion lista no existe, se crea   
    if (!isset($_SESSION['lista'])) {
        $_SESSION['lista'] = array();
    }
?>