<?php
    require "../../autoload.php";

    //Instanciar um objeto da classe cliente (bean)
    $cliente = new Cliente();

    //Definir os valores dps atributos a partir dos dados do form
    $cliente->setNome_Cliente($_POST['nome_cliente']);
    $cliente->setCpf_Cliente($_POST['cpf_cliente']);
    $cliente->setEndereco($_POST['endereco']);
    $cliente->setIdCliente($_POST['idCliente']);

    //Instanciar um objeto da classe ClienteDAO
    $dao = new ClienteDAO();

    //Invocar o método update da classe ClienteDAO
    $dao->update($cliente);

    //Redirecionar para o index
    header('Location: index.php');

?>