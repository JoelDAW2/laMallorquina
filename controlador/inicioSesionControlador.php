<?php
    include("modelo/inicioSesionDAO.php");
    class inicioSesionControlador{

        public static function index(){
            if(!isset($_GET['controller'])){
                include_once 'vista/cuerpo.php';
            }else{
                include_once 'vista/iniciarSesion.php';
            }
        }

        public static function startSession($correo, $contraseña){
            inicioSesionDAO::iniciarSesion($correo, $contraseña);
        }
    }
?>