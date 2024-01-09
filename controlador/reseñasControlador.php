<?php
    class reseñasControlador{
        public static function index(){
            if(!isset($_GET['controller'])){
                include_once 'vista/cuerpo.php';
            }else{
                include('vista/header.php');
                include_once 'vista/reseñas.php';
                include("vista/seccionInfoEnvio.php");
                include('vista/footer.php');
            }
        }
    }
?>