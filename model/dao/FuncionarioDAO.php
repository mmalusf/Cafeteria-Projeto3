<?php 
    class FuncionarioDAO{
        public function create($funcionario){
            try{
                $query = BD::getConexao()->prepare("INSERT INTO Funcionario(nome_funcionario) VALUES (:n)");
                $query->bindValue(':n', $funcionario->getNomeFuncionario(), PDO::PARAM_STR);

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
                $query = BD::getConexao()->prepare("SELECT * FROM Funcionario");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaFuncionarios = array();
                foreach($query->fetchALL(PDO::FETCH_ASSOC) as $linha) {
                    $funcionario = new Funcionario(); //Classe bean
                    $funcionario->setIdFuncionario($linha['idFuncionario']);
                    $funcionario->setNomeFuncionario($linha['nome_funcionario']);

                    array_push($listaFuncionarios, $funcionario);
                }

                return $listaFuncionarios;

            }
            catch(PDOException $e){
                echo "Erro #2: " . $e->getMessage();
            }
        }

         public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM Funcionario WHERE idFuncionario = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT); 
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $funcionario = new Funcionario(); //Classe bean
                    $funcionario->setIdFuncionario($linha['idFuncionario']);
                    $funcionario->setNomeFuncionario($linha['nome_funcionario']);
                }

                return $funcionario;

            }
            catch(PDOException $e){
                echo "Erro #3: " . $e->getMessage();
            }
        }

         public function update($funcionario){
            try{
                $query = BD::getConexao()->prepare("UPDATE Funcionario SET nome_funcionario = :n WHERE idFuncionario = :i");
                $query->bindValue(':n', $funcionario->getNomeFuncionario(), PDO::PARAM_STR);
                $query->bindValue(':i', $funcionario->getIdFuncionario(), PDO::PARAM_INT);

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
                $query = BD::getConexao()->prepare("DELETE FROM Funcionario WHERE idFuncionario = :i");
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
    