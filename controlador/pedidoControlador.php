<?php
    include("modelo/pedidoDAO.php");
    class pedidoControlador{
        public static function insertarPedido(){
            if(isset($_SESSION['idCliente']) && isset($_POST['confirmar'])){
                $fecha = date('Y-m-d H:i:s');
                $total = cantidadesControlador::calcularTotalInsertarPedido();
                $clienteId = $_SESSION['idCliente'];
    
                // Insert the order and get the inserted order ID
                $pedido_id = pedidoDAO::insertarPedido($fecha, $clienteId, $total);
    
                // Check if the order was successfully inserted
                if ($pedido_id > 0) {
                    // Pass the order ID to the function for inserting order products
                    pedidoProductoControlador::insertarPedidoProducto($pedido_id, $_SESSION['lista']);
                }
            }
        }
    }
?>