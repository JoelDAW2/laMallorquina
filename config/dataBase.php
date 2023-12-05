<?php
    class dataBase {
        public static function connect($host='localhost', $user='root', $pwd='', $db='restaurante') {
            $con = new mysqli($host, $user, $pwd, $db);
            if($con->connect_error) {
                die('Base de datos no encontrada!');
            } else  {
                return $con;
            }
        }
    }
?>