<?php
    class Pedido{
        //Atributos
        private $idPedido;
        private $data;
        private $idCliente;
        private $idFuncionario;
         private $idFormaPagamento;

        //Métodos de encapsulmento (getters e setters)
        public function getIdPedido(){
            return $this->idPedido;
        }
        public function setIdPedido($idPedido){
            $this->idPedido = $idPedido;
        }

        public function getData(){
            return $this->data;
        }
        public function setData($data){
            $this->data = $data;
        }

        public function getIdCliente(){
            return $this->idCliente;
        }
        public function setIdCliente($idCliente){
            $this->idCliente = $idCliente;
        }

        public function getIdFuncionario(){
            return $this->idFuncionario;
        }
        public function setIdFuncionario($idFuncionario){
            $this->idFuncionario = $idFuncionario;
        }

        public function getIdFormaPagamento(){
            return $this->idFormaPagamento;
        }
        public function setIdFormaPagamento($idFormaPagamento){
            $this->idFormaPagamento = $idFormaPagamento;
        }
    }
?>