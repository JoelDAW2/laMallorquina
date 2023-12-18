<?php
    class pedidoProductoDAO{
        /*
        public static function obtenerIdProducto($nombre){
            $con = dataBase::connect();
            $seleccionarIdProducto = ("SELECT `pedido_id` FROM `producto` WHERE `nombre` ='$nombre'");
            $con->query($insertarPedidoProducto);
            $idProducto = $con->query($insertarPedidoProducto);
            return $idProducto;
        }
        */



        
        /*
        public static function insertarPedidoProducto($pedido_id, $producto_id, $cantidad, $precio_unidad){
            $con = dataBase::connect();
            $insertarPedidoProducto = ("INSERT INTO `pedido_producto`(`pedido_id`, `producto_id`, `cantidad`, `precio_unidad`) VALUES ('$pedido_id','$producto_id', '$cantidad', '$precio_unidad')");
            $con->query($insertarPedidoProducto);
            $con->close();
        }
        */

        /*
        public static function seleccionarPrecioUnidad($productoId){
            $con = dataBase::connect();
            $pUnidad = "SELECT `precio_unidad` FROM `producto` WHERE `producto_id` ='$productoId'";
            $result = $con->query($pUnidad);
        
            if ($result) {
                $row = $result->fetch_assoc();
                $precio_unidad = $row['precio_unidad'];
                return $precio_unidad;
            } else {
                echo "Error en la consulta: " . $con->error;
            }
        
            $con->close();
        }
        */
    }
?>      