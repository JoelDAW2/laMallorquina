<?php
    class reseñasDAO{
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