<?php
    class pedidoDAO{
        /*
        public static function insertarPedido($fecha, $clienteId, $total){
            $con = dataBase::connect();
            $insertarPedido = ("INSERT INTO `pedido`(`fecha_pedido`, `cliente_id`, `estado`, `precio_total`) VALUES ('$fecha','$clienteId', 'En proceso', '$total')");
            $con->query($insertarPedido);
            $con->close();
        }
        */

        public static function insertarPedido($fecha, $clienteId, $total){
            $con = dataBase::connect();
            $insertarPedido = ("INSERT INTO `pedido`(`fecha_pedido`, `cliente_id`, `estado`, `precio_total`) VALUES ('$fecha','$clienteId', 'En proceso', '$total')");
            $con->query($insertarPedido);
    
            // Return the last inserted ID
            $idPedido = mysqli_insert_id($con);
    
            $con->close();
    
            return $idPedido;
        }

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

        public static function insertarPedidoProducto($pedido_id, $producto_id, $cantidad, $precio_unidad){
            $con = dataBase::connect();
            $insertarPedidoProducto = ("INSERT INTO `pedido_producto`(`pedido_id`, `producto_id`, `cantidad`, `precio_unidad`) VALUES ('$pedido_id','$producto_id', '$cantidad', '$precio_unidad')");
            $con->query($insertarPedidoProducto);
            $con->close();
        }
    }
?>      