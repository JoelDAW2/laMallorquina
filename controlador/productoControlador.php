<?php
   
    include_once 'modelo/productoDAO.php';
    
    //Crearemos el controlador de pedidos.
    class productoControlador {
        public static function index(){
            if(!isset($_GET['controller'])){
                include_once 'vista/cuerpo.php';
            }else{
                $ensaladas = productoDAO::getAllByType('Ensalada');
                $sopas = productoDAO::getAllByType('Sopas');
                $cremas = productoDAO::getAllByType('Cremas');

                include_once 'vista/carta.php';
            }
        } 
        
        //--------AÑADIR PRODUCTOS EN EL ARRAY DE LA SESSION 
        public static function añadirProductoArray(){
            
            $idAñadir = $_POST['añadirCarrito'];
            
            echo $idAñadir;
            $encontrado = false;
            
            for ($i=0; $i < count($_SESSION['lista']); $i++) { 
                if($_SESSION['lista'][$i]['id'] == $idAñadir){
                    $_SESSION['lista'][$i]['cantidada'] = $_SESSION['lista'][$i]['cantidada']  + 1;
                    $encontrado = true;
                }
            }
    
            if(!$encontrado){
                array_push($_SESSION['lista'], ['id' => $idAñadir , 'cantidada'=> 1]);
            }

            header("Location:".URL."?controller=producto");
            
        }
    }
?>