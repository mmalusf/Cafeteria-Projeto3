<?php
    //Incluir o arquivo de autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe pedido (bean)
    $pedido = new Pedido();

    //Definir os valores dos atributos a partir do form
    $pedido->setData($_POST['data']);
    $pedido->setIdCliente($_POST['idCliente']);
    $pedido->setIdFuncionario($_POST['idFuncionario']);
    $pedido->setIdFormaPagamento($_POST['idFormaPagamento']);

    //Instanciar um objeto da classe cliente DAO 
    $dao = new PedidoDAO();

    //Invocar o método create
    $dao->create($pedido);

    //Redirecionar para o index (comentar caso de tudo errado)
    header("Location: index.php");
?>