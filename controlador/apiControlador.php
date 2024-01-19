<?php
    //Instala la extensión Thunder Client en VSC. Te permite probar si tu API funciona correctamente.
    include_once 'modelo/reseñasDAO.php';
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

        public static function apiInsertReview($cliente_id, $pedido_id, $nombre_cliente, $apellido_cliente, $puntuacion, $descripcion, $fecha){
            reseñasDAO::insertReview($cliente_id, $pedido_id, $nombre_cliente, $apellido_cliente, $puntuacion, $descripcion, $fecha);
        }
        
    }
?>