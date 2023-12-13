<?php

    include("config/parameters.php");
    include("controlador/cantidadesControlador.php");
    include("controlador");
    include("vista/header.php");

    if(!isset($_GET['controller'])) {
        header("Location:" . URL . "?controller=home");
    } else {
        $nombre_controller = $_GET['controller'] . "Controller";

        if(class_exists($nombre_controller)) {
            $controller = new $nombre_controller;

            if(isset($_GET['action'])) {
                $action = $_GET['action'];
            } else {
                $action = action_default;
            }

            $controller->$action();

        } else {
            header("Location:".URL."?controller=home");
        }
    }

?>