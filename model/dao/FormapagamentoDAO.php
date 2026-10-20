<?php 
    class FormaPagamentoDAO{
        public function create($formaPagamento){
            try{
                $query = BD::getConexao()->prepare("INSERT INTO FormaPagamento(nome_pagamento) VALUES (:n)");
                $query->bindValue(':n', $formaPagamento->getNome_pagamento(), PDO::PARAM_STR);
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e){
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM FormaPagamento");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaFormaPagamentos = array();
                foreach($query->fetchALL(PDO::FETCH_ASSOC) as $linha) {
                    $formaPagamento = new FormaPagamento(); //Classe bean
                    $formaPagamento->setIdFormaPagamento($linha['idFormaPagamento']);
                    $formaPagamento->setNomePagamento($linha['nome_pagamento']);

                    array_push($listaFormaPagamentos, $formaPagamento);
                }

                return $listaFormaPagamentos;

            }
            catch(PDOException $e){
                echo "Erro #2: " . $e->getMessage();
            }
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM FormaPagamento WHERE idFormaPagamneto = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT); 
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $formaPagamento = new FormaPagamento(); //Classe bean
                    $formaPagamento->setIdFormaPagamento($linha['idformapagamento']);
                    $formaPagamento->setNomePagamento($linha['nome_pagamento']);
                }

                return $formaPagamento;

            }
            catch(PDOException $e){
                echo "Erro #3: " . $e->getMessage();
            }
        }

        public function update($formaPagamento){
            try{
                $query = BD::getConexao()->prepare("UPDATE FormaPagamento SET nome_pagamento = :n WHERE idFormaPagamento = :i");
                $query->bindValue(':n', $formaPagamento->getNomePagamento(), PDO::PARAM_STR);
                $query->bindValue(':i', $formaPagamento->getIdFormaPagamento(), PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e){
                echo "Erro #4: " . $e->getMessage();
            }
        }

         public function destroy($id){
            try{
                $query = BD::getConexao()->prepare("DELETE FROM FormaPagamento WHERE idFormaPagamento = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e){
                echo "Erro #5: " . $e->getMessage();
            }
        }
    }
?>
    