<?php
    include("../modelo/pedidoProductoDAO.php");
    class pedidoProductoControlador{
        public static function insertarPedidoProducto($pedido_id, $array){
            foreach ($array as $key => $value){
                $precio = pedidoProductoDAO::seleccionarPrecioUnidad($_SESSION['lista'][$key]['id']);
                pedidoProductoDAO::insertarPedidoProducto($pedido_id, $_SESSION['lista'][$key]['id'], $_SESSION['lista'][$key]['cantidada'], $precio);
            }
        }
    }
?>      