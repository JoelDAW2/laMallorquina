<?php
    class carritoControlador{
        public static function index(){
            if(!isset($_GET['controller'])){
                include_once 'vista/cuerpo.php';
            }else{
                include_once 'vista/carrito.php';
            }
        }
    }
?>