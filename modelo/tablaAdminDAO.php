<?php
    include_once 'modelo/producto.php';
    include_once 'modelo/pedido.php';
    include_once 'modelo/usuario.php';
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

        public static function getAllMisPedidos($id) {
            $con = dataBase::connect();
            if($result = $con->query("SELECT * FROM pedido WHERE cliente_id = $id;")) {
                $misPedidos = array();
                while ($miPedido = $result->fetch_object('pedido')) {
                    $misPedidos[] = $miPedido;
                }
                return $misPedidos;
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

        public static function deletePedido($id){
            $con = dataBase::connect();
            $con->query("DELETE FROM `pedido` WHERE `pedido_id` = $id;");
        }

        public static function deleteUsuario($id){
            $con = dataBase::connect();
            $con->query("DELETE FROM `cliente` WHERE `cliente_id` = $id;");
        }
        
        public static function obtenerInfoUsuariosAdmin(){
            $con = dataBase::connect();
            $result = $con->query("SELECT * FROM cliente");
            $con->close();
        
            $usuarios = array();  // Crear un array para almacenar objetos Usuario
        
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_object('Usuario')) {
                    $usuarios[] = $row;  // Agregar cada objeto Usuario al array
                }
            }
        
            return $usuarios;  // Devolver el array de objetos Usuario
        }
        
        public static function obtenerInfoUsuarioAdminById($id){
            $con = dataBase::connect();
            $stmt = $con->prepare("SELECT * FROM cliente WHERE cliente_id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $con->close();
    
            if ($result->num_rows > 0) {
                return $result->fetch_object('usuario');
            }
    
            return null;
        }

        public static function actualizarUsuarioAdmin($nombre, $apellido, $email, $rol, $genero, $contraseña, $id){
            $con = dataBase::connect();
            $con->query("UPDATE `cliente` SET `nombre` = '$nombre', `apellido` = '$apellido', `correo_electronico` = '$email', `sexo` = '$genero', `contraseña` = '$contraseña' WHERE `cliente_id` = $id");
        }
    }
?>