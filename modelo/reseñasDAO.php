<?php
    class reseñasDAO{

        public static function getAllReviews() {
            $listaReviews = [];
        
            $con = dataBase::connect();
            if (!$con) {
                // Manejar el error de conexión si es necesario
                return $listaReviews;
            }
        
            $result = $con->query("SELECT * FROM review");
            if (!$result) {
                // Manejar el error de ejecución de la consulta si es necesario
                $con->close();
                return $listaReviews;
            }
        
            while ($reviewData = $result->fetch_assoc()) {
                $listaReviews[] = [
                    'review_id' => $reviewData['review_id'],
                    'cliente_id' => $reviewData['cliente_id'],
                    'pedido_id' => $reviewData['pedido_id'],
                    'nombre_cliente' => $reviewData['nombre_cliente'],
                    'apellido_cliente' => $reviewData['apellido_cliente'],
                    'puntuacion' => $reviewData['puntuacion'],
                    'descripcion' => $reviewData['descripcion'],
                    'fecha' => $reviewData['fecha'],
                ];
            }
        
            $result->close();
            $con->close();
        
            return $listaReviews;
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