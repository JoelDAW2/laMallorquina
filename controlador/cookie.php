<?php
    class cookie{
        public static function crearCookie() {
            if (isset($_SESSION['idCliente']) && isset($_POST['confirmar'])) {
                if (!isset($_COOKIE['ultimoPedido'])) {
                    $totalValorCookie = cantidadesControlador::calcularTotalInsertarPedido();
                    setcookie("ultimoPedido", $totalValorCookie, time() + 60);
                }
            }
        }

        public static function imprimirValorCookie() {
            if (isset($_COOKIE['ultimoPedido'])) {
                echo "<p>ÚLTIMO PEDIDO: ".$_COOKIE['ultimoPedido']." €"."</p>";
            }
        }
    }
?>