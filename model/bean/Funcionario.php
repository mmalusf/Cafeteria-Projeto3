<?php
    class Funcionario{
        //Atributos
        private $idFuncionario;
        private $nome_funcionario;

        //Métodos de encapsulamento
        public function getIdFuncionario(){
            return $this->idFuncionario;
        }
        public function setIdFuncionario($idFuncionario){
            $this->idFuncionario = $idFuncionario;
        }

        public function getNomeFuncionario(){
            return $this->nome_funcionario;
        }
        public function setNomeFuncionario($nome_funcionario){
            $this->nome_funcionario = $nome_funcionario;
        }
    }
?>