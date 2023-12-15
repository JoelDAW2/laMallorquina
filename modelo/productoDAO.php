<?php
    include_once 'producto.php';

    class productoDAO {
        public static function getEnsaladas() {

            $con = dataBase::connect();

            if($result = $con->query("SELECT * FROM producto WHERE categoria_id = 1;")) {
                $products = array();
                while ($product = $result->fetch_object('producto')) {
                    $products[] = $product;
                }
                return $products;
            }
        }

        public static function getSopas() {

            $con = dataBase::connect();

            if($result = $con->query("SELECT * FROM producto WHERE categoria_id = 2;")) {
                $products = array();
                while ($product = $result->fetch_object('producto')) {
                    $products[] = $product;
                }
                return $products;
            }
        }

        public static function getCremas() {

            $con = dataBase::connect();

            if($result = $con->query("SELECT * FROM producto WHERE categoria_id = 3;")) {
                $products = array();
                while ($product = $result->fetch_object('producto')) {
                    $products[] = $product;
                }
                return $products;
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
            $con->query("UPDATE producto SET `nombre_producto` = $nombre, `descripcion` = $descripcion, `precio_unidad` = $precio,`categoria_id` = $categoria, `img` = $img  WHERE producto_id = $id");
        }







        
        public static function getProductoById($id) {
            $con = dataBase::connect();
            $stmt = $con->prepare("SELECT * FROM producto WHERE producto_id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $con->close();
    
            if ($result->num_rows > 0) {
                return $result->fetch_object('producto');
            }
    
            return null;
        }
    }
?>