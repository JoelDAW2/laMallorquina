<?php
    include("modelo/pedidoDAO.php");
    class pedidoControlador{

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

        public static function insertarPedidoProducto($pedido_id, $array){
            foreach ($array as $key => $value){
                $precio = pedidoDAO::seleccionarPrecioUnidad($_SESSION['lista'][$key]['id']);
                pedidoDAO::insertarPedidoProducto($pedido_id, $_SESSION['lista'][$key]['id'], $_SESSION['lista'][$key]['cantidada'], $precio);
            }
        }

        public static function insertarPedido(){
            if(isset($_SESSION['idCliente']) && isset($_POST['confirmar'])){
                $fecha = date('Y-m-d H:i:s');
                $total = self::calcularTotalInsertarPedido();
                $clienteId = $_SESSION['idCliente'];
    
                // Insert the order and get the inserted order ID
                $pedido_id = pedidoDAO::insertarPedido($fecha, $clienteId, $total);
    
                // Check if the order was successfully inserted
                if ($pedido_id > 0) {
                    // Pass the order ID to the function for inserting order products
                    pedidoControlador::insertarPedidoProducto($pedido_id, $_SESSION['lista']);
                }

                header("Location:".URL."?controller=cuerpo");
            }
        }
    }
?>