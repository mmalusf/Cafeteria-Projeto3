<?php
    //Incluir o arquivo de autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe cliente (bean)
    $cliente = new Cliente();

    //Definir os valores dos atributos a partir do form
    $cliente->setNome_cliente($_POST['nome_cliente']);
    $cliente->setCpf_cliente($_POST['cpf_cliente']);
    $cliente->setEndereco($_POST['endereco']);

    //Instanciar um objeto da classe cliente DAO 
    $dao = new ClienteDAO();

    //Invocar o método create
    $dao->create($cliente);

    //Redirecionar para o index (comentar caso de tudo errado)
    header("Location: index.php");
?>