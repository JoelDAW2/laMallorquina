<?php
    include("modelo/inicioSesionDAO.php");
    class inicioSesionControlador{
        public static function startSession($correo, $contraseña){
            inicioSesionDAO::iniciarSesion($correo, $contraseña);
        }
    }
?>