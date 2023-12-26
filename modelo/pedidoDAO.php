<?php
    include_once 'pedido.php';
    class pedidoDAO{

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

        public static function getPedidoById($id) {
            $con = dataBase::connect();
            $stmt = $con->prepare("SELECT * FROM pedido WHERE pedido_id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $con->close();
    
            if ($result->num_rows > 0) {
                return $result->fetch_object('pedido');
            }
    
            return null;
        }

        public static function ultimoPedido($id){
            $con = dataBase::connect();
            $stmt = $con->prepare("SELECT producto_id, cantidad FROM pedido_producto WHERE pedido_id = ?");
            
            if ($stmt === false) {
                die("Error en la preparación de la consulta: " . $con->error);
            }
        
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
        
            if (mysqli_num_rows($result) > 0) {
                $key = 0;
                while ($fila = mysqli_fetch_assoc($result)) {
                    $producto_id = $fila["producto_id"];
                    $cantidad = $fila["cantidad"];
                    $_SESSION['lista'][] = array('id' => $producto_id, 'cantidada' => $cantidad);
                }
            }
        
            $stmt->close();
            $con->close();
        }
        
    }
?>      