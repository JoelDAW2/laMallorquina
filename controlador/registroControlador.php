<?php
    include('modelo/registroDAO.php');

    class registroControlador{
        public static function registrar(){
            if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['contraseña']) && isset($_POST['suscribirse']) && isset($_POST['tratoDatos']) && isset($_POST['btnRegistrar'])){
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $correo_electronico = $_POST['email'];
                $rol = 'cliente';
                $contraseña = $_POST['contraseña'];
                if(isset($_POST['sr'])){
                    $genero = 'hombre';
                }else if(isset($_POST['sra'])){
                    $genero = 'mujer';
                }else{
                    $genero = null;
                }
                registroDAO::insertarCliente($nombre, $apellido, $genero, $correo_electronico, $rol, $contraseña);
            }  
        }
    }
?>