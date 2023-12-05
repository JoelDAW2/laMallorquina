<?php
    //controlador - conecta modelo con vista
    // modelo -todas las consultas bbdd
    // vista - lo que ve el usuario, y normalmente se carga al final de la funcion en el controlador para tener acceso a todas las variables
   
    include_once '../modelo/productoDAO.php';
    
    //Crearemos el controlador de pedidos.
    class productoControlador {
        public static function index() {
            productoDAO::getAllProducts();
        }

        public static function insertarProducto($nombre, $descripcion, $precio, $categoria){
            productoDAO::insertar($nombre, $descripcion, $precio, $categoria);
        }

        public static function eliminarProducto($id){
            productoDAO::eliminar($id);
        }

        public static function modificarProducto($nombre, $descripcion, $precio, $categoria, $id){
            productoDAO::modificar($nombre, $descripcion, $precio, $categoria, $id);
        }

        /*
        public static function crearSesion(){
            session_start();
            if(!isset($_SESSION['lista'])){
                $_SESSION['lista'] = array();
            }
        }
        */

        /*
        public static function destruirSesion(){
            if(isset($_POST['confirmar'])){
                session_destroy();
            }
        }
        */

        public static function botonBasura(){
            if(isset($_POST['productoBasura_x'])){
                $idBasura = $_POST['basura'];
                foreach ($_SESSION['lista'] as $key => $value){
                    if($_SESSION['lista'][$key]['id'] == $idBasura){
                        unset($_SESSION['lista'][$key]);   
                        break;   
                    }
                }
            }
        }

        //-----NO ACABA DE FUNCIONAR
        public static function sumarPlaceholder(){
            if(isset($_POST['sumarPlaceholder_x'])){
                $idBasura = $_POST['cogerIdArray'];
                foreach($_SESSION['lista'] as $key => $value){
                    if($_SESSION['lista'][$key]['id'] == $idBasura){
                        $_SESSION['lista'][$key]['cantidada'] = $_SESSION['lista'][$key]['cantidada'] + 1;   
                        break;   
                    }
                }
            }
        }

        public static function restarPlaceholder(){
            if(isset($_POST['restarPlaceholder_x'])){
                $idBasura = $_POST['cogerIdArray'];
                foreach($_SESSION['lista'] as $key => $value){
                    if($_SESSION['lista'][$key]['id'] == $idBasura){
                        $_SESSION['lista'][$key]['cantidada'] = $_SESSION['lista'][$key]['cantidada'] - 1;   
                        if($_SESSION['lista'][$key]['cantidada'] == 0){
                            unset($_SESSION['lista'][$key]);
                        }
                    }
                }
            }
        }    
    }
?>