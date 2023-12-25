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
            if(isset($_POST['nombre']) || isset($_POST['apellido']) || isset($_POST['email']) || isset($_POST['contraseña']) && isset($_SESSION['idCliente'])){
               $nombre = $_POST['nombre'];
               $apellido = $_POST['apellido'];
               $correo = $_POST['email'];
               $contraseña = $_POST['contraseña'];
               $nuevaContraEncriptada = password_hash($contraseña, PASSWORD_DEFAULT);
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