<?php
    class btnSesion{
        
        public static function btnSesion() {
            $url = "http://localhost/laMallorquina/ ";
            if (isset($_SESSION['idCliente'])) {
                // User is logged in
                echo "
                    <li><a id='linkSesionHeader' href='{$url}controlador/cerrarSesion.php'>CERRAR SESIÓN</a></li>
                ";
            } else {
                // User is not logged in
                echo "
                    <li><a id='linkSesionHeader' href='{$url}vista/iniciarSesion.php'>INICIAR SESIÓN</a></li>
                ";
            }
        }
    }
?>