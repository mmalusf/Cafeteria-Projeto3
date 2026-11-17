<?php 
    class FormaPagamento{
        //Atributos
        private $idFormaPagamento;
        private $nome_pagamento;

        //Métodos de encapsulamento
        public function getIdFormaPagamento(){
            return $this->idFormaPagamento;
        }
        public function setIdFormaPagamento($idFormaPagamento){
            $this->idFormaPagamento = $idFormaPagamento;
        }

        public function getNomePagamento(){
            return $this->nome_pagamento;
        }
        public function setNomePagamento($nome_pagamento){
            $this->nome_pagamento = $nome_pagamento;
        }
    }