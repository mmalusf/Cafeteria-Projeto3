<?php
    class Cliente{
        //Atributos
        private $IdCliente;
        private $nome_cliente;
        private $cpf_cliente;
        private $endereco;

        //Métodos de encapsulmento (getters e setters)
        public function getIdCliente(){
            return $this->IdCliente;
        }
        public function setIdCliente($idCliente){
            $this->IdCliente = $idCliente;
        }

        public function getNome_Cliente(){
            return $this->nome_cliente;
        }
        public function setNome_Cliente($nome_cliente){
            $this->nome_cliente = $nome_cliente;
        }

        public function getCpf_Cliente(){
            return $this->cpf_cliente;
        }
        public function setCpf_Cliente($cpf_cliente){
            $this->cpf_cliente = $cpf_cliente;
        }


        public function getEndereco(){
            return $this->endereco;
        }
        public function setEndereco($endereco){
            $this->endereco = $endereco;
        }
    }