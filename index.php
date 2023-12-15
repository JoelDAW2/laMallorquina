<?php
    include("config/parameters.php");
    include("controlador/cuerpoControlador.php");
    include("controlador/productoControlador.php");
    include("controlador/inicioSesionControlador.php");
    include("controlador/registroControlador.php");
    include("controlador/carritoControlador.php");
    include("controlador/sesionesControlador.php");
    sesionesControlador::crearSesion();

    if(!isset($_GET['controller'])) {
        header("Location:" . URL . "?controller=cuerpo");
    } else {
        $nombre_controller = $_GET['controller'] . "Controlador";

        if(class_exists($nombre_controller)) {
            $controller = new $nombre_controller;

            if(isset($_GET['action'])) {
                $action = $_GET['action'];
            } else {
                $action = action_default;
            }

            $controller->$action();

        } else {
            header("Location:".URL."?controller=cuerpo");
        }
    }

?>