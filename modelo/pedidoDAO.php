<?php
    class pedidoDAO{
        public static function insertarPedido($fecha, $clienteId){
            $con = dataBase::connect();
            $insertarPedido = ("INSERT INTO `pedido`(`fecha_pedido`, `cliente_id`) VALUES ('$fecha','$clienteId')");
            $con->query($insertarPedido);
            $con->close();
        }
    }
?>      