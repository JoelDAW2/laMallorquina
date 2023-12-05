<?php
    include('../modelo/registroDAO.php');

    class registroControlador{
        /*
        public static function registrar($nombre, $apellido, $sexo, $correo_electronico, $rol, $contraseña){
            registroDAO::insertarCliente($nombre, $apellido, $sexo, $correo_electronico, $rol, $contraseña);
        }    
        */
        /*
        public static function registrar($nombre, $apellido, $sexo, $correo_electronico, $rol, $contraseña){
            if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['contraseña']) && isset($_POST['suscribirse']) && isset($_POST['tratoDatos']) && isset($_POST['btnRegistrar'])){
                registroDAO::insertarCliente($nombre, $apellido, $sexo, $correo_electronico, $rol, $contraseña);
            }  
        } 
        */

        public static function registrar(){
            if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['contraseña']) && isset($_POST['suscribirse']) && isset($_POST['tratoDatos']) && isset($_POST['btnRegistrar'])){
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $correo_electronico = $_POST['email'];
                $rol = 'cliente';
                $contraseña = $_POST['contraseña'];
                registroDAO::insertarCliente($nombre, $apellido, 'hombre', $correo_electronico, $rol, $contraseña);
            }  
        }
    }
?>