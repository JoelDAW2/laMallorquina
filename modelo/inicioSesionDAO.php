<?php
    include("modelo/crearSesion.php");
    class inicioSesionDAO{
        public static function iniciarSesion($correo, $contraseña){
            $con = dataBase::connect();
            
            /*
            $consultaDatos = $con->query("SELECT * FROM cliente WHERE contraseña = '$contraseña' AND correo_electronico = '$correo'");

            if($consultaDatos->num_rows > 0){
                foreach ($consultaDatos as $row) {
                    $_SESSION['idCliente'] = $row['cliente_id'];

                    if($row['rol'] == 'admin'){
                        $_SESSION['accesoAdmin'] = true;
                        header("Location:".URL."?controller=cuerpo"); 
                    }else{
                        header("Location:".URL."?controller=cuerpo"); 
                    }
                    exit();
                }
            }else{
                header("Location:".URL."?controller=inicioSesion"); 
                exit();
            }
            */
            
            $pswrdEncriptada = $con->query("SELECT contraseña FROM cliente WHERE correo_electronico = '$correo'");

            if ($pswrdEncriptada->num_rows > 0) {
                $row = $pswrdEncriptada->fetch_assoc();
                $contraseñaEncriptadaAlmacenada = $row['contraseña'];

                if (password_verify($contraseña, $contraseñaEncriptadaAlmacenada)) {
                    // La contraseña es válida, continuar con la lógica de inicio de sesión
                    $consultaDatos = $con->query("SELECT * FROM cliente WHERE contraseña = '$contraseñaEncriptadaAlmacenada' AND correo_electronico = '$correo'");

                    if ($consultaDatos->num_rows > 0) {
                        foreach ($consultaDatos as $row) {
                            $_SESSION['idCliente'] = $row['cliente_id'];

                            if ($row['rol'] == 'admin') {
                                $_SESSION['accesoAdmin'] = true;
                                header("Location:".URL."?controller=cuerpo"); 
                            } else {
                                header("Location:".URL."?controller=cuerpo"); 
                            }
                            exit();
                        }
                    } else {
                        header("Location:".URL."?controller=inicioSesion"); 
                        exit();
                    }
                } else {
                    // La contraseña no es válida, manejar el error
                    header("Location:".URL."?controller=inicioSesion"); 
                    exit();
                }
            } else {
                // El correo electrónico no existe en la base de datos, manejar el error
                header("Location:".URL."?controller=inicioSesion"); 
                exit();
            }

        }
    }
?>