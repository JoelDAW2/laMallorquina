<?php
    class reseñasControlador{
        public static function index(){
            if(!isset($_GET['controller'])){
                include_once 'vista/cuerpo.php';
            }else{
                include("modelo/reseña.php");
                include("modelo/reseñasDAO.php");
                include('vista/header.php');
                $reseña = reseñasDAO::getReviewById(1);
                include_once 'vista/reseñas.php';
                include("vista/seccionInfoEnvio.php");
                include('vista/footer.php');
            }
        }
    }
?>