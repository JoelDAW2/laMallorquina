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
    }
?>      