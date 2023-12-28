<?php
    include("modelo/actualizarUsuarioDAO.php");
    class actualizarUsuarioControlador{
        public static function index(){
            if(!isset($_GET['controller'])){
                include_once 'vista/cuerpo.php';
            }else{
                if(isset($_SESSION['idCliente'])){
                    $usuario = actualizarUsuarioDAO::obtenerInfoUsuario($_SESSION['idCliente']);
                }
                include_once 'vista/actualizarUsuario.php';
            }
        }

        public static function procesarFormularioModificarUsuario(){
            if(isset($_POST['nombre']) || isset($_POST['apellido']) || isset($_POST['email']) || (isset($_POST['contraseña']) && isset($_POST['nuevaCotraseña'])) && isset($_SESSION['idCliente'])){
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $correo = $_POST['email'];
                if($_POST['contraseña'] == $_POST['nuevaContraseña']){
                    $contraseña = $_POST['nuevaContraseña'];
                }else{
                    header("Location:".URL."?controller=actualizarUsuario");
                    exit;
                }
                
                if (!empty($contraseña)) {
                    $nuevaContraEncriptada = password_hash($contraseña, PASSWORD_DEFAULT);
                }else{
                    $usuarioActualizar = actualizarUsuarioDAO::obtenerInfoUsuario($_SESSION['idCliente']);
                    // Si no se proporciona una nueva contraseña, mantener la existente
                    $nuevaContraEncriptada = $usuarioActualizar->getContraseña();
                }

               if(isset($_POST['sr'])){
                    $genero = "Hombre";
               }else if(isset($_POST['sra'])){
                    $genero = "Mujer";
               }else{
                    $genero = null;
               }
               $id = $_SESSION['idCliente'];
               actualizarUsuarioDAO::actualizarUsuario($nombre, $apellido, $correo, $genero, $nuevaContraEncriptada, $id);
            }
            header("Location:".URL."?controller=inicioSesion");          
    }
    }
?>