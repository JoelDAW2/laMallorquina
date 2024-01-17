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
    
    }
?>