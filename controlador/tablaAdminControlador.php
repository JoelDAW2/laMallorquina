<?php
    include("modelo/tablaAdminDAO.php");
    class tablaAdminControlador{

        public static function index(){
            if(!isset($_GET['controller'])){
                include_once 'vista/cuerpo.php';
            }else{
                include_once 'vista/tablaAdmin.php';
            }
        }

        public static function indexPedidoUsuario(){
            if(!isset($_GET['controller'])){
                include_once 'vista/cuerpo.php';
            }else{
                if(isset($_SESSION['idCliente'])){
                    $misPedidos = tablaAdminDAO::getAllMisPedidos($_SESSION['idCliente']);
                }
                include_once 'vista/pedidosUsuario.php';
            }
        }

        public static function indexModificar(){
          
            if(!isset($_GET['controller'])){
                include_once 'vista/cuerpo.php';
            }else{
                
                include_once 'vista/modificarProducto.php';
            }
        }

        public static function indexAñadir(){
            if(!isset($_GET['controller'])){
                include_once 'vista/cuerpo.php';
            }else{
                include_once 'vista/añadirProducto.php';
            }
        }

        public static function indexAñadirUsuario(){
            if(!isset($_GET['controller'])){
                include_once 'vista/cuerpo.php';
            }else{
                include_once 'vista/añadirUsuario.php';
            }
        }

        public static function indexPanelPedidosAdmin(){
            if(!isset($_GET['controller'])){
                include_once 'vista/cuerpo.php';
            }else{
                $pedidos = tablaAdminDAO::getAllPedidos();
                include_once 'vista/panelPedidosAdmin.php';
            }
        }

        public static function indexPanelProductosAdmin(){
            if(!isset($_GET['controller'])){
                include_once 'vista/cuerpo.php';
            }else{
                $products = tablaAdminDAO::getAllProducts();
                include_once 'vista/panelProductosAdmin.php';
            }
        }

        public static function indexPanelUsuariosAdmin(){
            if(!isset($_GET['controller'])){
                include_once 'vista/cuerpo.php';
            }else{
                if(isset($_SESSION['idCliente'])){
                    $usuarios = tablaAdminDAO::obtenerInfoUsuariosAdmin();
                }
                include_once 'vista/panelUsuariosAdmin.php';
            }
        }
        
        public static function procesarFormularioInsertar(){
            tablaAdminControlador::insertarProducto(
                $_POST['nombre'],
                $_POST['descripcion'],
                $_POST['precioUnitario'],
                $_POST['categoria'],
                $_POST['img']
            );
        }

        public static function procesarFormularioModificar(){
                tablaAdminDAO::modificar(
                    $_POST['nombre'],
                    $_POST['descripcion'],
                    $_POST['precioUnitario'],
                    $_POST['categoria'],
                    $_POST['img'],
                    $_POST['escondidoModificar']
                );
                header("Location:".URL."?controller=tablaAdmin");          
        }
    
        public static function insertarProducto($nombre, $descripcion, $precio, $categoria, $img){
            if(isset($_POST['btnInsertar'])  && isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['precioUnitario']) && isset($_POST['categoria']) && isset($_POST['img'])){
                tablaAdminDAO::insertar($nombre, $descripcion, $precio, $categoria, $img);
                header("Location:".URL."?controller=tablaAdmin&action=indexPanelProductosAdmin");
            }
        }
    
        public static function eliminarProducto(){
                $id = $_POST['escondido'];
                tablaAdminDAO::eliminar($id);
                header("Location:".URL."?controller=tablaAdmin&action=indexPanelProductosAdmin");
        }
    
        public static function modificarProducto($nombre, $descripcion, $precio, $categoria, $img, $id){
            if(isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['precioUnitario']) && isset($_POST['categoria']) && isset($_POST['img'])){
                tablaAdminDAO::modificar($nombre, $descripcion, $precio, $categoria, $img, $id);
                header("Location: tablaAdmin.php");
            }
        }

        public static function eliminarPedido(){
            $id = $_POST['escondidoPedido'];
            tablaAdminDAO::deletePedido($id);
            header("Location:".URL."?controller=tablaAdmin&action=indexPanelPedidosAdmin");
        }

        public static function eliminarUsuario(){
            $id = $_POST['escondidoUsuario'];
            tablaAdminDAO::deleteUsuario($id);
            header("Location:".URL."?controller=tablaAdmin&action=indexPanelUsuariosAdmin");
        }

        public static function crearUsuario(){
            if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['rol']) && isset($_POST['contraseña']) && isset($_POST['btnCrearUsuario'])){
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $correo_electronico = $_POST['email'];
                $rol = $_POST['rol'];
                $contraseña = $_POST['contraseña'];
                $contraseñaCifradaUsuario = password_hash($contraseña, PASSWORD_DEFAULT);
                if(isset($_POST['sr'])){
                    $genero = 'Hombre';
                }else if(isset($_POST['sra'])){
                    $genero = 'Mujer';
                }else{
                    $genero = null;
                }
                $registroUser = registroDAO::insertarCliente($nombre, $apellido, $genero, $correo_electronico, $rol, $contraseñaCifradaUsuario);
                if($registroUser){
                    header("Location:".URL."?controller=tablaAdmin&action=indexAñadirUsuario");
                }else{
                    header("Location:".URL."?controller=tablaAdmin&action=indexPanelUsuariosAdmin");
                }
            }  
        }

        public static function indexModificarUsuario() {
            if (!isset($_GET['controller'])) {
                include_once 'vista/cuerpo.php';
            } else {
                if (isset($_POST['escondidoModificarUsuario'])) {
                    $idUsuarioModificar = $_POST['escondidoModificarUsuario'];
                    $usuarioAmodificar = tablaAdminDAO::obtenerInfoUsuarioAdminById($idUsuarioModificar);
        
                    // Verifica si el usuario fue encontrado
                    if ($usuarioAmodificar) {
                        include_once 'vista/modificarUsuario.php';
                    } else {
                        echo "Usuario no encontrado"; // Puedes manejar la situación en la que no se encuentra el usuario
                    }
                }
            }
        }
        
        public static function procesarFormularioModificarUsuarioAdmin(){
            if(isset($_POST['nombre']) || isset($_POST['apellido']) || isset($_POST['email']) || isset($_POST['rol']) || (isset($_POST['contraseña']) && isset($_POST['nuevaCotraseña'])) && isset($_SESSION['idCliente'])){
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $correo = $_POST['email'];
                $rol = $_POST['rol'];
                if($_POST['contraseña'] == $_POST['nuevaContraseña']){
                    $contraseña = $_POST['nuevaContraseña'];
                }else{
                    header("Location:".URL."?controller=tablaAdmin&action=indexModificarUsuario");
                    exit;
                }
                
                if (!empty($contraseña)) {
                    $nuevaContraEncriptada = password_hash($contraseña, PASSWORD_DEFAULT);
                }else{
                    $usuarioActualizar = actualizarUsuarioDAO::obtenerInfoUsuario($_SESSION['idCliente']);
                    // Si no se proporciona una nueva contraseña, mantener la existente
                    $nuevaContraEncriptada = $usuarioActualizar->getContraseña();
                }

               if(isset($_POST['sr'])){
                    $genero = "Hombre";
               }else if(isset($_POST['sra'])){
                    $genero = "Mujer";
               }else{
                    $genero = null;
               }
               $idCliente = $_POST['idHidden'];
               tablaAdminDAO::actualizarUsuarioAdmin($nombre, $apellido, $correo, $rol, $genero, $nuevaContraEncriptada, $idCliente);
            }
            header("Location:".URL."?controller=tablaAdmin&action=indexPanelUsuariosAdmin");          
        }
    }
?>