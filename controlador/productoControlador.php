<?php
    //controlador - conecta modelo con vista
    // modelo -todas las consultas bbdd
    // vista - lo que ve el usuario, y normalmente se carga al final de la funcion en el controlador para tener acceso a todas las variables
   
    include_once 'modelo/productoDAO.php';
    
    //Crearemos el controlador de pedidos.
    class productoControlador {
        public static function index(){
            if(!isset($_GET['controller'])){
                include_once 'vista/cuerpo.php';
            }else{
                // $ensaladas = productoDAO::getEnsaladas();
                // $sopas = productoDAO::getSopas();
                // $cremas = productoDAO::getCremas();

                $ensaladas = productoDAO::getAllByType('Ensalada');
                $sopas = productoDAO::getAllByType('Sopas');
                $cremas = productoDAO::getAllByType('Cremas');

                include_once 'vista/carta.php';
            }
        }
        
        //--------BOTONES CARRITO -- SE CAMBIA A CARRITO CONTROLADOR
        /*
        public static function botonBasura(){
            if(isset($_POST['productoBasura_x'])){
                $idBasura = $_POST['basura'];
                foreach ($_SESSION['lista'] as $key => $value){
                    if($_SESSION['lista'][$key]['id'] == $idBasura){
                        unset($_SESSION['lista'][$key]);   
                        break;   
                    }
                }
            }
        }
        */
        /*
        public static function sumarPlaceholder(){
            if(isset($_POST['sumarPlaceholder_x'])){
                $idBasura = $_POST['cogerIdArray'];
                foreach($_SESSION['lista'] as $key => $value){
                    if($_SESSION['lista'][$key]['id'] == $idBasura){
                        $_SESSION['lista'][$key]['cantidada'] = $_SESSION['lista'][$key]['cantidada'] + 1;   
                        break;   
                    }
                }
            }
        }
        */
        /*
        public static function restarPlaceholder(){
            if(isset($_POST['restarPlaceholder_x'])){
                $idBasura = $_POST['cogerIdArray'];
                foreach($_SESSION['lista'] as $key => $value){
                    if($_SESSION['lista'][$key]['id'] == $idBasura){
                        $_SESSION['lista'][$key]['cantidada'] = $_SESSION['lista'][$key]['cantidada'] - 1;   
                        if($_SESSION['lista'][$key]['cantidada'] == 0){
                            unset($_SESSION['lista'][$key]);
                        }
                    }
                }
            }
        } 
        */ 
        

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