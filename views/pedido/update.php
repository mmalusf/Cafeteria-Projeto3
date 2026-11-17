<?php
    require "../../autoload.php";

    //Instanciar um objeto da classe cliente (bean)
    $pedido = new Pedido();

    //Definir os valores dps atributos a partir dos dados do form
    $pedido->setData($_POST['data']);
    $pedido->setIdCliente($_POST['idCliente']);
    $pedido->setIdFuncionario($_POST['idFuncionario']);
    $pedido->setIdFormaPagamento($_POST['idFormaPagamento']);
    $pedido->setIdPedido($_POST['idPedido']);

    //Instanciar um objeto da classe PedidoDAO
    $dao = new PedidoDAO();

    //Invocar o método update da classe PedidoDAO
    $dao->update($pedido);

    //Redirecionar para o index
    header('Location: index.php');

?>