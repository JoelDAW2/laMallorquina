<?php
    class cliente{
        private $clienteId;

        function __construct(){
            
        }

        public function getClienteId(){
            return $this->clienteId;
        }

        public function setClienteId($clienteId){
            $this->clienteId = $clienteId;
        }
    }
?>