<?php
    class Produto_has_Pedido{
        //Atributos
        private $idProduto;
        private $idPedido;
        private $quantidade;

        //Métodos de encapsulamento
        public function getIdProduto(){
            return $this->idProduto;
        } 
        public function setIdProduto($idProduto){
            $this->idProduto = $idProduto;
        }

        public function getIdPedido(){
            return $this->idPedido;
        }
        public function setIdPedido($idPedido){
            $this->idPedido = $idPedido;
        }

        public function getQuantidade(){
            return $this->quantidade;
        }
        public function setQuantidade($quantidade){
            $this->quantidade = $quantidade;
        }
    }
?>