<?php
    include_once 'usuario.php';
    class actualizarUsuarioDAO{
        public static function actualizarUsuario($nombre, $apellido, $email, $genero, $contraseña, $id){
            $con = dataBase::connect();
            $con->query("UPDATE `cliente` SET `nombre` = '$nombre', `apellido` = '$apellido', `correo_electronico` = '$email', `sexo` = '$genero', `contraseña` = '$contraseña' WHERE `cliente_id` = $id");
        }

        public static function obtenerInfoUsuario($id){
            $con = dataBase::connect();
            $stmt = $con->prepare("SELECT * FROM cliente WHERE cliente_id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $con->close();
    
            if ($result->num_rows > 0) {
                return $result->fetch_object('usuario');
            }
    
            return null;
        }
    }
?>