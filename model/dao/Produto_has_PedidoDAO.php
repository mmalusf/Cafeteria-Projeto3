<?php 
    class Produto_has_PedidoDAO{
        public function create($produtohpedido){
            try{
                $query = BD::getConexao()->prepare("INSERT INTO Produto_has_Pedido (idProduto, idPedido, quantidade) VALUES (:i, :p, :q)");
                $query->bindValue(':i', $produtohpedido->getIdProduto(), PDO::PARAM_STR);
                $query->bindValue(':p', $produtohpedido->getIdPedido(), PDO::PARAM_STR);
                //Bind para chave estrangeira
                $query->bindValue(':q', $produtohpedido->getQuantidade(), PDO::PARAM_INT);

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
                $query = BD::getConexao()->prepare("SELECT * FROM Produto_has_Pedido");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaProdutohpedidos = array();
                foreach($query->fetchALL(PDO::FETCH_ASSOC) as $linha) {
                    $produtohpedido = new Produto_has_Pedido(); //Classe bean
                    $produtohpedido->setIdProduto($linha['idProduto']);
                    $produtohpedido->setIdPedido($linha['idPedido']);
                    $produtohpedido->setQuantidade($linha['quantidade']);
                     
                    array_push($listaProdutohpedidos, $produtohpedido);
                }

                return $listaProdutohpedidos;

            }
            catch(PDOException $e){
                echo "Erro #2: " . $e->getMessage();
            }
        }

        public function destroy($id){
            try{
                $query = BD::getConexao()->prepare("DELETE FROM Pedido WHERE idProduto= :i AND idPedido = :p");
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
    