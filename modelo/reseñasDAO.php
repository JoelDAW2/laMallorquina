<?php
    class reseñasDAO{

        public static function getAllReviews() {
            try {
                $con = dataBase::connect();
                if (!$con) {
                    throw new Exception("Error de conexión a la base de datos.");
                }
    
                $result = $con->query("SELECT * FROM review");
                if (!$result) {
                    throw new Exception("Error al ejecutar la consulta: " . $con->error);
                }
    
                $listaReviews = [];
                while ($review = $result->fetch_object("reseña")) {
                    $listaReviews[] = $review;
                }
    
                $result->close();
                $con->close();
    
                return $listaReviews;
            } catch (Exception $e) {
                // Manejar el error, puedes imprimir un mensaje de error o devolver un array vacío
                // Puedes personalizar esto según tus necesidades
                error_log($e->getMessage());
                return [];
            }
        }

        public static function getReviewById($id) {
            // Creamos la conexion con la BBDD
            $con = dataBase::connect();
            // Preparamos la consulta: SELECCIONAR TODO EN LA TABLA REVIEW DONDE EL REVIEW_ID SEA IGUAL AL ID QUE LE PASAMOS
            $stmt = $con->prepare("SELECT * FROM review WHERE review_id = ?");
            $stmt->bind_param("i", $id);
            // Ejecutamos la consulta
            $stmt->execute();
            // Guardamos el resultado de la consulta
            $result = $stmt->get_result();
            // Cerramos la conexion
            $con->close();
            // Si el numero de registros de la consulta es superior a 0, devolvemos el objeto de tipo producto
            if ($result->num_rows > 0) {
                return $result->fetch_object('reseña');
            }
            // Si no, se devuelve null
            return null;
        }
    }
?>