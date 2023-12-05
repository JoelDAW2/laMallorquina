<?php
    include("../modelo/pedidoDAO.php");
    class pedidoControlador{
        public static function insertarPedido($clienteId){
            if(isset($_POST['confirmar'])){
                $fecha = date('Y-m-d H:i:s');
                pedidoDAO::insertarPedido($fecha, $clienteId);
            }
        }
    }
?>