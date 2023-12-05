<?php
    include("../modelo/tablaAdminDAO.php");
    class tablaAdminControlador{
        public static function obtenerProductos() {
            tablaAdminDAO::getAllProducts();
        }
    
        public static function insertarProducto($nombre, $descripcion, $precio, $categoria, $img){
            if(isset($_POST['btnInsertar'])  && isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['precioUnitario']) && isset($_POST['categoria']) && isset($_POST['img'])){
                tablaAdminDAO::insertar($nombre, $descripcion, $precio, $categoria, $img);
                header("Location: tablaAdmin.php");
            }
        }
    
        public static function eliminarProducto($id){
            if(isset($_POST['eliminar'])){
                $id = $_POST['escondido'];
                tablaAdminDAO::eliminar($id);
            }
        }
    
        public static function modificarProducto($nombre, $descripcion, $precio, $categoria, $img, $id){
            if(isset($_POST['btnActualizar'])){
                tablaAdminDAO::modificar($nombre, $descripcion, $precio, $categoria, $img, $id);
            }
        }
    }
?>