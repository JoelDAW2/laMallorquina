<?php
    include("modelo/tablaAdminDAO.php");
    class tablaAdminControlador{

        public static function index(){
            if(!isset($_GET['controller'])){
                include_once 'vista/cuerpo.php';
            }else{
                $products = tablaAdminDAO::getAllProducts();
                $pedidos = tablaAdminDAO::getAllPedidos();
                include_once 'vista/tablaAdmin.php';
            }
        }

        public static function indexPedidoUsuario(){
            if(!isset($_GET['controller'])){
                include_once 'vista/cuerpo.php';
            }else{
                if(isset($_SESSION['idCliente'])){
                    $misPedidos = tablaAdminDAO::getAllMisPedidos($_SESSION['idCliente']);
                }
                include_once 'vista/pedidosUsuario.php';
            }
        }

        public static function indexModificar(){
          
            if(!isset($_GET['controller'])){
                include_once 'vista/cuerpo.php';
            }else{
                
                include_once 'vista/modificar.php';
            }
        }

        public static function indexAñadir(){
            if(!isset($_GET['controller'])){
                include_once 'vista/cuerpo.php';
            }else{
                include_once 'vista/añadir.php';
            }
        }

        /*
        public static function obtenerProductos() {
            tablaAdminDAO::getAllProducts();
        }
        */
        
        public static function procesarFormularioInsertar(){
            tablaAdminControlador::insertarProducto(
                $_POST['nombre'],
                $_POST['descripcion'],
                $_POST['precioUnitario'],
                $_POST['categoria'],
                $_POST['img']
            );
        }

        public static function procesarFormularioModificar(){
                tablaAdminDAO::modificar(
                    $_POST['nombre'],
                    $_POST['descripcion'],
                    $_POST['precioUnitario'],
                    $_POST['categoria'],
                    $_POST['img'],
                    $_POST['escondidoModificar']
                );
                header("Location:".URL."?controller=tablaAdmin");          
        }
    
        public static function insertarProducto($nombre, $descripcion, $precio, $categoria, $img){
            if(isset($_POST['btnInsertar'])  && isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['precioUnitario']) && isset($_POST['categoria']) && isset($_POST['img'])){
                tablaAdminDAO::insertar($nombre, $descripcion, $precio, $categoria, $img);
                header("Location:".URL."?controller=tablaAdmin");
            }
        }
    
        public static function eliminarProducto(){
                $id = $_POST['escondido'];
                tablaAdminDAO::eliminar($id);
                header("Location:".URL."?controller=tablaAdmin");
        }
    
        public static function modificarProducto($nombre, $descripcion, $precio, $categoria, $img, $id){
            if(isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['precioUnitario']) && isset($_POST['categoria']) && isset($_POST['img'])){
                tablaAdminDAO::modificar($nombre, $descripcion, $precio, $categoria, $img, $id);
                header("Location: tablaAdmin.php");
            }
        }

        public static function eliminarPedido(){
            $id = $_POST['escondidoPedido'];
            tablaAdminDAO::deletePedido($id);
            header("Location:".URL."?controller=tablaAdmin");
        }
    }
?>