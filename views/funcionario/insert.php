<?php
    //Incluir o arquivo de autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe cliente (bean)
    $funcionario = new Funcionario();

    //Definir os valores dos atributos a partir do form
    $funcionario->setNomeFuncionario($_POST['nomefuncionario']);

    //Instanciar um objeto da classe cliente DAO 
    $dao = new FuncionarioDAO();

    //Invocar o método create
    $dao->create($funcionario);

    //Redirecionar para o index (comentar caso de tudo errado)
    header("Location: index.php");
?>