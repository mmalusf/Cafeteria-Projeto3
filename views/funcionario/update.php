<?php
    require "../../autoload.php";

    //Instanciar um objeto da classe cliente (bean)
    $funcionario = new Funcionario();

    //Definir os valores dps atributos a partir dos dados do form
    $funcionario->setNomeFuncionario($_POST['nome_funcionario']);
    $funcionario->setIdFuncionario($_POST['idFuncionario']);

    //Instanciar um objeto da classe ClienteDAO
    $dao = new FuncionarioDAO();

    //Invocar o método update da classe ClienteDAO
    $dao->update($funcionario);

    //Redirecionar para o index
    header('Location: index.php');

?>