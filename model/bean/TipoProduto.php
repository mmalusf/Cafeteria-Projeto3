<?php
    class TipoProduto{
        //Atributos
        private $idtipo_produto;
        private $descricao;

        //Métodos de encapsulamento
        public function getIdtipo_produto(){
            return $this->idtipo_produto;
        }
        public function setIdtipo_produto($idtipo_produto){
            $this->idtipo_produto = $idtipo_produto;
        }

        public function getDescricao(){
            return $this->descricao;
        }
        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }
    }
?>