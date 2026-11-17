<?php
    //Incluir o arquivo de autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe funcionario (bean)
    $funcionario = new Funcionario();

    //Definir os valores dos atributos a partir do form
    $funcionario->setNomeFuncionario($_POST['nome_funcionario']);

    //Instanciar um objeto da classe funcionario DAO 
    $dao = new FuncionarioDAO();

    //Invocar o método create
    $dao->create($funcionario);

    //Redirecionar para o index (comentar caso de tudo errado)
    header("Location: index.php");
?>