<?php
    class crema extends producto{
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
    }
?>