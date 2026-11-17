<?php
    require "../../autoload.php";

    //Instanciar um objeto da classe funcionario (bean)
    $funcionario = new Funcionario();

    //Definir os valores dos atributos a partir dos dados do form
    $funcionario->setNomeFuncionario($_POST['nome_funcionario']);
    $funcionario->setIdFuncionario($_POST['idFuncionario']);

    //Instanciar um objeto da classe FuncionarioDAO
    $dao = new FuncionarioDAO();

    //Invocar o método update da classe FuncionarioDAO
    $dao->update($funcionario);

    //Redirecionar para o index
    header('Location: index.php');

?>