<?php
    class clienteDAO{
        public function recogerClienteId($email){
            $con = dataBase::connect();
            $consultaId = ("SELECT * FROM cliente WHERE `correo_electronico` = '$email'");
        }
    }
?>