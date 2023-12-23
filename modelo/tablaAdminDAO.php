<?php
    include_once 'modelo/producto.php';
    include_once 'modelo/pedido.php';
    class tablaAdminDAO{
        public static function getAllProducts() {

            $con = dataBase::connect();

            if($result = $con->query("SELECT * FROM producto;")) {
                $products = array();
                while ($product = $result->fetch_object('producto')) {
                    $products[] = $product;
                }
                return $products;
            }
        }

        public static function getAllPedidos() {
            $con = dataBase::connect();
            if($result = $con->query("SELECT * FROM pedido;")) {
                $pedidos = array();
                while ($pedido = $result->fetch_object('pedido')) {
                    $pedidos[] = $pedido;
                }
                return $pedidos;
            }
        }

        public static function insertar($nombre, $descripcion, $precio, $categoria, $img){
            $con = dataBase::connect();
            $con->query("INSERT INTO producto (`nombre_producto`, `descripcion`, `precio_unidad`, `categoria_id`, `img`) VALUES ('$nombre', '$descripcion', '$precio', '$categoria', '$img')");
        }

        public static function eliminar($id){
            $con = dataBase::connect();
            $con->query("DELETE FROM `producto` WHERE `producto`.`producto_id` = $id");
        }

        public static function modificar($nombre, $descripcion, $precio, $categoria, $img, $id){
            $con = dataBase::connect();
            $con->query("UPDATE `producto` SET `nombre_producto` = '$nombre', `descripcion` = '$descripcion', `precio_unidad` = '$precio', `categoria_id` = '$categoria', `img` = '$img' WHERE `producto_id` = $id");
        }
        
    }
?>