<?php
    //include("config/dataBase.php");
    include("modelo/crearSesion.php");
    class inicioSesionDAO{
        public static function iniciarSesion($correo, $contraseña){
            $con = dataBase::connect();

            $consultaDatos = $con->query("SELECT * FROM cliente WHERE contraseña = '$contraseña' AND correo_electronico = '$correo'");

            if($consultaDatos->num_rows > 0){
                foreach ($consultaDatos as $row) {
                    $_SESSION['idCliente'] = $row['cliente_id'];

                    if($row['rol'] == 'admin'){
                        $_SESSION['accesoAdmin'] = true;
                        header("Location:".URL."?controller=cuerpo"); 
                    }else{
                        header("Location:".URL."?controller=cuerpo"); 
                        //exit();
                    }

                    //echo $_SESSION['idCliente'];
                    exit();
                }
            }else{
                header("Location:".URL."?controller=inicioSesion"); 
                exit();
            }
        }
    }
?>