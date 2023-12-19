<?php
    class crema extends producto{
        protected $producto_id;
        protected $nombre_producto;
        protected $descripcion;
        protected $precio_unidad;
        protected $categoria_id;
        protected $img;

        public function __construct($datosDB) {
            parent::__construct(); // Llama al constructor de la clase base (producto)
            
            // Inicializa propiedades específicas de ensalada
            $this->producto_id = $datosDB->producto_id;
            $this->nombre_producto = $datosDB->nombre_producto;
            $this->descripcion = $datosDB->descripcion;
            $this->precio_unidad = $datosDB->precio_unidad;
            $this->categoria_id = $datosDB->categoria_id;
            $this->img = $datosDB->img;
        }

        public function getProductoId(){
            return $this->producto_id;
        }

        public function setProductoId($producto_id){
            $this->producto_id = $producto_id;
        }

        public function getNombre(){
            return $this->nombre_producto;
        }

        public function setNombre($nombre_producto){
            $this->nombre_producto = $nombre_producto;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }

        public function getPrecioUnidad(){
            return $this->precio_unidad;
        }

        public function setPrecioUnidad($precio_unidad){
            $this->precio_unidad = $precio_unidad;
        }

        public function getCategoriaId(){
            return $this->categoria_id;
        }

        public function setCategoriaId($categoria_id){
            $this->categoria_id = $categoria_id;
        }

        public function getImg(){
            return $this->img;
        }

        public function setImg($img){
            $this->img = $img;
        }
    }
?>