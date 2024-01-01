<?php
    class cantidadesControlador {

        public static function cantidadCarrito($array){
            // Inicializamos la variable cantidad
            $cantidad = 0;
            // Recorremos el array que se le pasa a la funcion 
            for ($i=0; $i < count($array); $i++) { 
                // Por cada iteracion, se incrementa el valor de la cantidad
                $cantidad++;
            }
            // Se devuelve un parrafo con el valor de la cantidad 
            echo ("<p>$cantidad</p>");
        }
    }
?>