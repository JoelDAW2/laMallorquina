<?php
    class cantidadesControlador {

        public static function cantidadCarrito($array){
            $cantidad = 0;
            for ($i=0; $i < count($array); $i++) { 
                $cantidad++;
            }
            echo ("<p>$cantidad</p>");
        }
    }
?>