<?php
//Esto es un NUEVO CONTROLADOR
//hacer todas las configuraciones necesarias para que funcione como controlador

/** IMPORTANTE**/
//Cargar Modelos necesarios BBDD

/** IMPORTANTE**/
//Instala la extensión Thunder Client en VSC. Te permite probar si tu API funciona correctamente.

class apiControlador{

    /*
    public static function api() {
       
        if ($_POST["accion"] == 'get_review') {

            $reviews = $reseñasDAO::getReviews();
            echo json_encode($reviews, JSON_UNESCAPED_UNICODE);
            return;

        } else if ($_POST["accion"] == 'add_review') {

            $id_pedido = json_decode($_POST["pedido"]);
            $id_usuario = json_decode($_POST["id_usuario"]);

            echo "Reseña agregada exitosamente";
            return;
        }
    }
    */

    public static function apiGetReviews(){
        $reviews = reseñasDAO::getReviews();
       print_r($reviews);

       $reviews = [1,2,3,4,5,6];
        $r = json_encode($reviews);
        echo $r;
        if(json_last_error() !== JSON_ERROR_NONE){
         //   echo json_last_error_msg();
        }
        return;
    }
}
?>