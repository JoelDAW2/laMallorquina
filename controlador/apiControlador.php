<?php
    //Instala la extensión Thunder Client en VSC. Te permite probar si tu API funciona correctamente.
    include_once 'modelo/reseñasDAO.php';
    include_once 'modelo/productoDAO.php';
    class apiControlador{

        public static function apiGetAllReviews() {
            // Obtener las reseñas usando la función existente
            $reviews = reseñasDAO::getAllReviews();

            // Convertir los datos a formato JSON
            $jsonReviews = json_encode($reviews);

            // Imprimir la respuesta JSON
            header('Content-Type: application/json');
            echo $jsonReviews;
        }

        public static function apiGetAllReviewsByPunctuation($num){
            $reviewsPuntuacion = reseñasDAO::getReviewsByPunctuation($num);
            $jsonReviews = json_encode($reviewsPuntuacion);
            header('Content-Type: application/json');
            echo $jsonReviews;
        }

        public static function apiGetPedidoById(){
            if(isset($_GET['pedido_id'])){
                $id = $_GET['pedido_id'];
                $pedidoApi = reseñasDAO::apiGetInfoPedidoById($id);
                header('Content-Type: application/json');
                echo json_encode($pedidoApi);
            }
        }
        
        public static function apiInsertReview() {
            $data = json_decode(file_get_contents('php://input'), true);
        
            $cliente_id = $data['cliente_id'];
            $pedido_id = $data['pedido_id'];
            $nombre_cliente = $data['nombre_cliente'];
            $apellido_cliente = $data['apellido_cliente'];
            $puntuacion = $data['puntuacion'];
            $descripcion = $data['descripcion'];
            $fecha = $data['fecha'];
        
            reseñasDAO::insertReview($cliente_id, $pedido_id, $nombre_cliente, $apellido_cliente, $puntuacion, $descripcion, $fecha);
        }
        
        
        // IMPRIMIR EL CODIGO QR
        public static function cogerIdApi(){
            if(isset($_GET['pedido_id'])){
                include 'lib/phpqrcode/qrlib.php';
                $pedido_id = $_GET['pedido_id'];
                $urlRedireccion = URL . "?controller=carrito&action=indexInfoPedidoApi&pedido_id=" . $pedido_id;
                QRcode::png($urlRedireccion, 'img/image.png');
            }
        }

        public static function obtenerInfoUser(){
            if(isset($_SESSION['idCliente'])){
                $id = $_SESSION['idCliente'];
                $usuarioActivo = reseñasDAO::userActive($id);
                header('Content-Type: application/json');
                echo json_encode($usuarioActivo);
            }
        }

        public static function apiObtenerEnsaladas() {
            // Obtener las reseñas usando la función existente
            $productos = productoDAO::obtenerEnsaladas();
            // Convertir los datos a formato JSON
            $jsonProductos = json_encode($productos);
            // Imprimir la respuesta JSON
            header('Content-Type: application/json');
            echo $jsonProductos;
        }

        public static function apiObtenerSopas() {
            // Obtener las reseñas usando la función existente
            $productos = productoDAO::obtenerSopas();
            // Convertir los datos a formato JSON
            $jsonProductos = json_encode($productos);
            // Imprimir la respuesta JSON
            header('Content-Type: application/json');
            echo $jsonProductos;
        }

        public static function apiObtenerCremas() {
            // Obtener las reseñas usando la función existente
            $productos = productoDAO::obtenerCremas();
            // Convertir los datos a formato JSON
            $jsonProductos = json_encode($productos);
            // Imprimir la respuesta JSON
            header('Content-Type: application/json');
            echo $jsonProductos;
        }
    }
?>