<?php

    include("config/parameters.php");
    include("controlador/cantidadesControlador.php");
    include("controlador");
    include("vista/header.php");

    if(!isset($_GET['Controlador'])) {
        header("Location:" . URL . "?Controlador=home");
    } else {
        $nombre_Controlador = $_GET['Controlador'] . "Controlador";

        if(class_exists($nombre_controller)) {
            $controller = new $nombre_controller;

            if(isset($_GET['action'])) {
                $action = $_GET['action'];
            } else {
                $action = action_default;
            }

            $controller->$action();

        } else {
            header("Location:".URL."?Controlador=home");
        }
    }

?>