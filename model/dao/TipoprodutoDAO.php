<?php 
    class TipoprodutoDAO{
        public function create($tipo_produto){
            try{
                $query = BD::getConexao()->prepare("INSERT INTO tipo_produto(descricao) VALUES (:d)");
                $query->bindValue(':d', $tipo_produto->getDescricao(), PDO::PARAM_STR);

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
                $query = BD::getConexao()->prepare("SELECT * FROM tipo_produto");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaTipoprodutos = array();
                foreach($query->fetchALL(PDO::FETCH_ASSOC) as $linha) {
                    $tipo_produto = new TipoProduto(); //Classe bean
                    $tipo_produto->setIdtipo_produto($linha['idtipo_produto']);
                    $tipo_produto->setDescricao($linha['descricao']);

                    array_push($listaTipoprodutos, $tipo_produto);
                }

                return $listaTipoprodutos;

            }
            catch(PDOException $e){
                echo "Erro #2: " . $e->getMessage();
            }
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM tipo_produto WHERE idtipo_produto = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT); 
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $tipo_produto = new Tipoproduto(); //Classe bean
                    $tipo_produto->setIdtipo_produto($linha['idtipo_produto']);
                    $tipo_produto->setDescricao($linha['descricao']);
                }

                return $tipo_produto;

            }
            catch(PDOException $e){
                echo "Erro #3: " . $e->getMessage();
            }
        }

         public function update($tipo_produto){
            try{
                $query = BD::getConexao()->prepare("UPDATE tipo_produto SET descricao = :d WHERE idtipo_produto = :i");
                $query->bindValue(':d', $tipo_produto->getDescricao(), PDO::PARAM_STR);
                $query->bindValue(':i', $tipo_produto->getIdtipo_produto(), PDO::PARAM_INT);

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
                $query = BD::getConexao()->prepare("DELETE FROM tipo_produto WHERE idtipo_produto= :i");
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
    