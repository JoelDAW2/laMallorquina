<?php
    include("../config/parameters.php");

    session_start();
    session_destroy();
    header("Location:".URL."?controller=cuerpo");
?>