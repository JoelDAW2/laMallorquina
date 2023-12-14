<?php
    class cantidadesControlador {
        public static function imprimirCantidades($producto, $cantidad, $precioUnidad) {
            echo ("<div id='cProductos' class='d-flex justify-content-between'>
                    <p>" . $producto->getNombre() . "</p>
                    <p>$cantidad</p>
                    <p>$precioUnidad €</p>
                   </div>");
        }

        public static function calcularTotal(){
            $total = $_SESSION['lista'];
            $cantidadProducto = 0;
            $sumaPrecio = 0;
            $sumaTotal = 0;
            foreach ($total as $key => $value) {
                $producto = productoDAO::getProductoById($_SESSION['lista'][$key]['id']);
                $cantidadProducto = $total[$key]['cantidada'];
                $sumaPrecio = $cantidadProducto * $producto->getPrecioUnidad();
                $sumaTotal = $sumaTotal + $sumaPrecio; 
            } 
            echo $sumaTotal." €";
        }

        public static function calcularTotalInsertarPedido(){
            $total = $_SESSION['lista'];
            $cantidadProducto = 0;
            $sumaPrecio = 0;
            $sumaTotal = 0;
            foreach ($total as $key => $value) {
                $producto = productoDAO::getProductoById($_SESSION['lista'][$key]['id']);
                $cantidadProducto = $total[$key]['cantidada'];
                $sumaPrecio = $cantidadProducto * $producto->getPrecioUnidad();
                $sumaTotal = $sumaTotal + $sumaPrecio; 
            } 
            return $sumaTotal;
        }

        public static function cantidadCarrito($array){
            $cantidad = 0;
            for ($i=0; $i < count($array); $i++) { 
                $cantidad++;
            }
            echo ("<p>$cantidad</p>");
        }

        public static function carritoVacio(){
            if(empty($_SESSION['lista'])){
                echo ("
                    <div class='contenedorVacio'>
                        <img id='fotoCarritoVacio' class='img-fluid' src='../img/logoCarritoCentro.svg' alt=''>
                        <p class='textoCarrito'>¡No hay productos en tu carrito!</p>
                    </div>
                ");
            }
        }
    }
?>