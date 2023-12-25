<?php
    include('modelo/registroDAO.php');

    class registroControlador{

        public static function index(){
            if(!isset($_GET['controller'])){
                include_once 'vista/cuerpo.php';
            }else{
                include_once 'vista/registro.php';
            }
        }

        public static function registrar(){
            if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['contraseña']) && isset($_POST['suscribirse']) && isset($_POST['tratoDatos']) && isset($_POST['btnRegistrar'])){
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $correo_electronico = $_POST['email'];
                $rol = 'Cliente';
                $contraseña = $_POST['contraseña'];
                $contraseñaCifrada = password_hash($contraseña, PASSWORD_DEFAULT);
                if(isset($_POST['sr'])){
                    $genero = 'Hombre';
                }else if(isset($_POST['sra'])){
                    $genero = 'Mujer';
                }else{
                    $genero = null;
                }
                $registroUser = registroDAO::insertarCliente($nombre, $apellido, $genero, $correo_electronico, $rol, $contraseñaCifrada);
                if($registroUser){
                    header("Location:".URL."?controller=registro");
                }else{
                    header("Location:".URL."?controller=inicioSesion");
                }
            }  
        }
    }
?>