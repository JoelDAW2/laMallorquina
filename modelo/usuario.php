<?php
    class Usuario {
        private $nombre;
        private $apellido;
        private $correo_electronico;
        private $genero;
        private $contraseña;

        function __construct() {
            
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function getApellido() {
            return $this->apellido;
        }

        public function setApellido($apellido) {
            $this->apellido = $apellido;
        }

        public function getEmail() {
            return $this->correo_electronico;
        }        

        public function setEmail($correo_electronico) {
            $this->correo_electronico = $correo_electronico;
        }

        public function getGenero() {
            return $this->genero;
        }

        public function setGenero($genero) {
            $this->genero = $genero;
        }

        public function getContraseña() {
            return $this->contraseña;
        }

        public function setContraseña($contraseña) {
            $this->contraseña = $contraseña;
        }
    }
?>
