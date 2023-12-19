<?php
    include_once 'producto.php';
    include_once 'ensalada.php';
    include_once 'sopa.php';
    include_once 'crema.php';

    class productoDAO {
        /*
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
        */







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

        public static function getAllByType($tipo) {
            $con = dataBase::connect();
    
            // Obtener el ID de la categoría
            $stmt = $con->prepare("SELECT categoria_id FROM categoria WHERE nombre_categoria = ?");
            $stmt->bind_param("s", $tipo);
            $stmt->execute();
            $result = $stmt->get_result();
    
            $categoria_id = null;
            if ($row = $result->fetch_assoc()) {
                $categoria_id = $row['categoria_id'];
            }
    
            // Obtener productos de la categoría
            $stmt = $con->prepare("SELECT * FROM producto WHERE categoria_id = ?");
            $stmt->bind_param("i", $categoria_id);
            $stmt->execute();
            $result = $stmt->get_result();
    
            $listaProductos = [];
            while ($productoDB = $result->fetch_object()) {
                // Crear instancias dinámicamente según el tipo
                switch ($tipo) {
                    case 'Ensalada':
                        $listaProductos[] = new ensalada($productoDB);
                        break;
                    case 'Cremas':
                        $listaProductos[] = new crema($productoDB);
                        break;
                    case 'Sopas':
                        $listaProductos[] = new sopa($productoDB);
                        break;
                    // Agrega más casos según sea necesario para otros tipos de productos
                }
            }
    
            $stmt->close();
            $con->close();
    
            return $listaProductos;
        }
    }
?>