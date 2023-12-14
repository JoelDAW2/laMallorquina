<?php
    include('config/dataBase.php');

    class registroDAO{
        public static function insertarCliente($nombre, $apellido, $sexo, $correo_electronico, $rol, $contraseña){
            $con = dataBase::connect();
            $con->query("INSERT INTO `cliente`(`nombre`, `apellido`, `sexo`, `correo_electronico`, `rol`, `contraseña`) VALUES ('$nombre', '$apellido', '$sexo', '$correo_electronico', '$rol', '$contraseña')");
        }
    }
?>