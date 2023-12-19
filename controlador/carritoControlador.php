<?php
    class carritoControlador{
        public static function index(){
            if(!isset($_GET['controller'])){
                include_once 'vista/cuerpo.php';
            }else{
                if(isset($_COOKIE['totalUltimoPedido'])){
                    $valoresCookie = explode(",", $_COOKIE["totalUltimoPedido"]);
                    $totalUltimoPedido = $valoresCookie[1];
                    $idUltimoUsuario = $valoresCookie[0];
                }                
                $cantidadTotal = carritoControlador::calcularTotal();
                include_once 'vista/carrito.php';
            }
        }

        public static function calcularTotal(){
            $total = $_SESSION['lista'];
            $cantidadProducto = 0;
            $sumaPrecio = 0;
            $sumaTotal = 0;
            foreach ($total as $key => $value) {
                $producto = productoDAO::getProductoById($_SESSION['lista'][$key]['id']);
                $cantidadProducto = $total[$key]['cantidada'];
                $sumaPrecio = $cantidadProducto * $producto->getPrecioUnidad();
                $sumaTotal = $sumaTotal + $sumaPrecio; 
            } 
            return $sumaTotal;
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
            if(isset($_POST['sumarPlaceholder'])){
                self::sumarPlaceholder();
            }else if(isset($_POST['restarPlaceholder'])){
                self::restarPlaceholder();
            }
        }
        
    }
?>