<?php
    class PedidoDAO {

        public function create($pedido){
            try{
                $query = BD::getConexao()->prepare("INSERT INTO Pedido(data, idCliente, idFuncionario, idFormaPagamento) VALUES (:d, :i, :f, :p)");
                $query->bindValue(':d', $pedido->getData(), PDO::PARAM_STR);
                $query->bindValue(':i', $pedido->getIdCliente(), PDO::PARAM_INT);
                $query->bindValue(':f', $pedido->getIdFuncionario(), PDO::PARAM_INT);
                $query->bindValue(':p', $pedido->getIdFormaPagamento(), PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e){
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read(){
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM Pedido");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaPedidos = array();
                foreach($query->fetchALL(PDO::FETCH_ASSOC) as $linha) {
                    $pedido = new Pedido(); //Classe bean
                    $pedido->setIdPedido($linha['idPedido']);
                    $pedido->setData($linha['data']);
                    $pedido->setIdCliente($linha['idCliente']);
                    $pedido->setIdFuncionario($linha['idFuncionario']);
                    $pedido->setIdFormaPagamento($linha['idFormaPagamento']);

                    array_push($listaPedidos, $pedido);
                }

                return $listaPedidos;

            }
            catch(PDOException $e){
                echo "Erro #2: " . $e->getMessage();
            }
        }

        public function find($id){
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM Pedido WHERE idPedido = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT); 
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)){
                    $pedido = new Pedido(); //Classe bean
                    $pedido->setIdPedido($linha['idPedido']);
                    $pedido->setData($linha['data']);
                    $pedido->setIdCliente($linha['idCliente']);
                    $pedido->setIdFuncionario($linha['idFuncionario']);
                    $pedido->setIdFormaPagamento($linha['idFormaPagamento']);
                }

                return $pedido;
            }
            catch(PDOException $e){
                echo "Erro #3: " . $e->getMessage();
            }
            return $pedido;
        }

        public function update($pedido){
            try{
                $query = BD::getConexao()->prepare("UPDATE Pedido SET data = :d, idCliente = :c, idFuncionario = :f, idFormaPagamento = :p WHERE idPedido = :i");
                $query->bindValue(':d', $pedido->getData(), PDO::PARAM_STR);
                $query->bindValue(':c', $pedido->getIdCliente(), PDO::PARAM_INT);
                $query->bindValue(':f', $pedido->getIdFuncionario(), PDO::PARAM_INT);
                $query->bindValue(':p', $pedido->getIdFormaPagamento(), PDO::PARAM_INT);
                $query->bindValue(':i', $pedido->getIdPedido(), PDO::PARAM_INT);

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
                $query = BD::getConexao()->prepare("DELETE FROM Pedido WHERE idPedido = :i");
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