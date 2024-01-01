<?php
    class inicioSesionDAO{
        public static function iniciarSesion($correo, $contraseña){
            // Creamos la conexion 
            $con = dataBase::connect();
            // Declaramos la consulta: SELECCIONAR LA CONTRASEÑA DE LA TABLA CLIENTE DONDE EL CORREO_ELECTRONICO SEA IGUAL AL CORREO QUE LE HEMOS PASADO A LA FUNCION 
            $pswrdEncriptada = $con->query("SELECT contraseña FROM cliente WHERE correo_electronico = '$correo'");
            // Si el numero de registros de la consulta es superior a 0
            if ($pswrdEncriptada->num_rows > 0) {
                // Obtenemos la contraseña encriptada
                $row = $pswrdEncriptada->fetch_assoc();
                $contraseñaEncriptadaAlmacenada = $row['contraseña'];
                // Comprobamos si la contraseña obtenida coincide con la almacenada
                if (password_verify($contraseña, $contraseñaEncriptadaAlmacenada)) {
                    // Si es válida, continuamos con la lógica del inicio de sesión
                    //
                    $consultaDatos = $con->query("SELECT * FROM cliente WHERE contraseña = '$contraseñaEncriptadaAlmacenada' AND correo_electronico = '$correo'");
                    // Verificamos si la consulta devuelve algun registro
                    if ($consultaDatos->num_rows > 0) {
                        // Recorremos los campos obtenidos en la consulta
                        foreach ($consultaDatos as $row) {
                            $_SESSION['idCliente'] = $row['cliente_id'];

                            if ($row['rol'] == 'admin' || $row['rol'] == 'Admin') {
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