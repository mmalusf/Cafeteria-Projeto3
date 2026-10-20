<?php
    class TipoProduto{
        //Atributos
        private $tipo_produto;
        private $descricao;

        //Métodos de encapsulamento
        public function getIdtipo_produto(){
            return $this->tipo_produto;
        }
        public function setIdtipo_produto($tipo_produto){
            $this->tipo_produto = $tipo_produto;
        }

        public function getdescricao(){
            return $this->descricao;
        }
        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }
    }
?>