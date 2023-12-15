<?php
    class carritoControlador{
        public static function index(){
            if(!isset($_GET['controller'])){
                include_once 'vista/cuerpo.php';
            }else{
                include_once 'vista/carrito.php';
            }
        }

        public static function botonBasura(){
            $idBasura = $_POST['basura'];
            foreach ($_SESSION['lista'] as $key => $value){
                if($_SESSION['lista'][$key]['id'] == $idBasura){
                    unset($_SESSION['lista'][$key]);   
                    break;   
                }
            }
            header("Location:".URL."?controller=carrito");
        }

        public static function sumarPlaceholder(){
            $idBasura = $_POST['cogerIdArray'];
            foreach($_SESSION['lista'] as $key => $value){
                if($_SESSION['lista'][$key]['id'] == $idBasura){
                    $_SESSION['lista'][$key]['cantidada'] = $_SESSION['lista'][$key]['cantidada'] + 1;   
                    break;   
                }
            }
            header("Location:".URL."?controller=carrito");
        }

        public static function restarPlaceholder(){
            $idBasura = $_POST['cogerIdArray'];
            foreach($_SESSION['lista'] as $key => $value){
                if($_SESSION['lista'][$key]['id'] == $idBasura){
                    $_SESSION['lista'][$key]['cantidada'] = $_SESSION['lista'][$key]['cantidada'] - 1;   
                    if($_SESSION['lista'][$key]['cantidada'] == 0){
                        unset($_SESSION['lista'][$key]);
                    }
                }
            }
            header("Location:".URL."?controller=carrito");
        }  

        public static function panelSumaResta(){
            //foreach ($_POST as $key => $value) { echo "Field ".htmlspecialchars ($key). " is ".htmlspecialchars ($value). "<br>" ;}
            echo $_POST['sumarPlaceholder_x'];
            if(isset($_POST['sumarPlaceholder_x'])){
                echo "prueba";
                //sumarPlaceholder();
            }else if(isset($_POST['restarPlaceholder_x'])){
                restarPlaceholder();
            }
        }
    }
?>