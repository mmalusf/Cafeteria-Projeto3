<?php
    class ClienteDAO {
        public function create($cliente){
            try{
                $query = BD::getConexao()->prepare("INSERT INTO Cliente(nome_cliente, cpf_cliente, endereco) VALUES (:n, :c, :e)");
                $query->bindValue(':n', $cliente->getNome_Cliente(), PDO::PARAM_STR);
                $query->bindValue(':c', $cliente->getCpf_Cliente(), PDO::PARAM_STR);
                $query->bindValue(':e', $cliente->getEndereco(), PDO::PARAM_STR);

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
                $query = BD::getConexao()->prepare("SELECT * FROM Cliente");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaClientes = array();
                foreach($query->fetchALL(PDO::FETCH_ASSOC) as $linha) {
                    $cliente = new Cliente(); //Classe bean
                    $cliente->setIdCliente($linha['idCliente']);
                    $cliente->setNome_Cliente($linha['nome_cliente']);
                    $cliente->setCpf_Cliente($linha['cpf_cliente']);
                    $cliente->setEndereco($linha['endereco']);

                    array_push($listaClientes, $cliente);
                }

                return $listaClientes;

            }
            catch(PDOException $e){
                echo "Erro #2: " . $e->getMessage();
            }
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM Cliente WHERE idCliente = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT); 
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $cliente = new Cliente(); //Classe bean
                    $cliente->setIdCliente($linha['idCliente']);
                    $cliente->setNome_Cliente($linha['nome_cliente']);
                    $cliente->setCpf_Cliente($linha['cpf_cliente']);
                    $cliente->setEndereco($linha['endereco']);

                }

                return $cliente;

            }
            catch(PDOException $e){
                echo "Erro #3: " . $e->getMessage();
            }
        }

        public function update($cliente){
            try{
                $query = BD::getConexao()->prepare("UPDATE Cliente SET nome_cliente = :n cpf_cliente = :c endereco = :e WHERE id_cliente = i");
                $query->bindValue(':n', $cliente->getNome_Cliente(), PDO::PARAM_STR);
                $query->bindValue(':c', $cliente->getCpf_Cliente(), PDO::PARAM_STR);
                $query->bindValue(':e', $cliente->getEndereco(), PDO::PARAM_STR);
                $query->bindValue(':i', $cliente->getID(), PDO::PARAM_INT);

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
                $query = BD::getConexao()->prepare("DELETE FROM Cliente WHERE idCliente = i");
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