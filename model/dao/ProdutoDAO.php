<?php 
    class ProdutoDAO{
        public function create($produto){
            try{
                $query = BD::getConexao()->prepare("INSERT INTO Produto(nome_produto, preco_produto, idtipo_produto) VALUES (:n, :p, :t)");
                $query->bindValue(':n', $produto->getNome_produto(), PDO::PARAM_STR);
                $query->bindValue(':p', $produto->getPreco_produto(), PDO::PARAM_STR);
                //Bind para chave estrangeira
                $query->bindValue(':t', $produto->getIdtipo_produto()->getIdtipo_produto(), PDO::PARAM_INT);

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
                $query = BD::getConexao()->prepare("SELECT * FROM Produto");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaProdutos = array();
                foreach($query->fetchALL(PDO::FETCH_ASSOC) as $linha) {
                    $produto = new Produto(); //Classe bean
                    $produto->setIdProduto($linha['idproduto']);
                    $produto->setNome_produto($linha['nome_produto']);
                    $produto->setPreco_produto($linha['preco_produto']);
                    //Atributo da associação (com Tipo Produto)
                    $daoTipo_produto = new TipoProdutoDAO();
                    $tipo_produto = $daoTipo_produto->find($linha['idtipo_produto']);
                    $produto->setIdtipo_produto($tipo_produto);

                    array_push($listaProdutos, $produto);
                }

                return $listaProdutos;

            }
            catch(PDOException $e){
                echo "Erro #2: " . $e->getMessage();
            }
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM produto WHERE idproduto = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT); 
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $produto = new Tipoproduto(); //Classe bean
                    $produto->setIdproduto($linha['idproduto']);
                    $produto->setNome_produto($linha['nome_produto']);
                    $produto->setPreco_produto($linha['preco_produto']);
                }

                return $produto;

            }
            catch(PDOException $e){
                echo "Erro #3: " . $e->getMessage();
            }
        }

         public function update($produto){
            try{
                $query = BD::getConexao()->prepare("UPDATE produto SET nome_produto = :n WHERE idproduto = :i");
                $query->bindValue(':n', $produto->getNome_produto(), PDO::PARAM_STR);
                $query->bindValue(':i', $produto->getIdproduto(), PDO::PARAM_INT);

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
                $query = BD::getConexao()->prepare("DELETE FROM produto WHERE idproduto= :i");
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
    