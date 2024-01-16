<?php
//Esto es un NUEVO CONTROLADOR
//hacer todas las configuraciones necesarias para que funcione como controlador

/** IMPORTANTE**/
//Cargar Modelos necesarios BBDD

/** IMPORTANTE**/
//Instala la extensión Thunder Client en VSC. Te permite probar si tu API funciona correctamente.


class apiControlador{    
 
    /*
    public function api(){
       
        if($_POST["accion"] == 'buscar_pedido'){

            $id_usuario = json_decode($_POST["id_usuario"]); //se decodifican los datos JSON que se reciben desde JS
            $pedidos = xxxxxxxxxxx; //puedes hacer un select de pedidos aqui, o un insert o lo que quieras, utilizando el MODELO
            
            // Si quieres devolverle información al JS, codificas en json un array con la información
            // y se los devuelves al JS
            echo json_encode($pedidos, JSON_UNESCAPED_UNICODE) ; 
            return; //return para salir de la funcion

        }else if($_POST["accion"] == 'add_review'){

            $id_pedido = json_decode($_POST["pedido"]); //se decodifican los datos JSON que se reciben desde JS
            $id_usuario = json_decode($_POST["id_usuario"]); //se decodifican los datos JSON que se reciben desde JS
          
            
            //si solo quieres devolver un pequeño mensaje, simplemente puedes hacer un echo de texto
            echo "Bienvenido Pedrito" ;
            return;
        }
    }
    */

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
}