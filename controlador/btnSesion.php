<?php
    class btnSesion{
        
        public static function btnSesion() {
            if (isset($_SESSION['idCliente'])) {
                //echo "CERRAR SESIÓN";
                echo("
                    <li><a id='linkSesionHeader' href='controlador/cerrarSesion.php'>CERRAR SESIÓN</a></li>
                ");
            } else {
                //echo "INICIAR SESIÓN";
                echo("
                    <li><a id='linkSesionHeader' href='vista/iniciarSesion.php'>INICIAR SESIÓN</a></li>
                ");
            }
        }

        public static function btnAdmin(){
            if(isset($_SESSION['accesoAdmin'])){
                if($_SESSION['accesoAdmin'] == true){
                    echo ("<li><a href='tablaAdmin.php'><img src='../img/logoEditar.svg'></a></li>");
                }
            }
        }
    }
?>