<?php
    class Funcionario{
        //Atributos
        private $idProduto;
        private $nome_produto;
        private $preco_produto;
        private $tipo_produto; //Associação com a classe Tipo Produto

        //Métodos de encapsulamento
        public function getIdProduto(){
            return $this->idProduto;
        }
        public function setIdProduto($idProduto){
            $this->idProduto = $idProduto;
        }

        public function getNome_produto(){
            return $this->nome_produto;
        }
        public function setNome_produto($nome_produto){
            $this->nome_produto = $nome_produto;
        }

        public function getPreco_produto(){
            return $this->preco_produto;
        }
        public function setPreco_produto($preco_produto){
            $this->preco_produto = $preco_produto;
        }

        //Get/Set do atributo de assosiação
        public function getIdtipo_produto(){
            return $this->tipo_produto;
        }
        public function setIdtipo_produto($tipo_produto){
            $this->tipo_produto = $tipo_produto;
        }
    }
?>