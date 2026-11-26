<?php
    //Incluir o arquivo de autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe cliente (bean)
    $produtohpedido = new Produto_has_Pedido();

    //Definir os valores dos atributos a partir do form
    $produtohpedido->setIdProduto($_POST['idProduto']);
    $produtohpedido->setIdPedido($_POST['idPedido']);
    $produtohpedido->setQuantidade($_POST['quantidade']);

     //Instanciar um objeto da classe cliente DAO 
    $dao = new Produto_has_PedidoDAO();
    
    //Invocar o método create
    $dao->create($produtohpedido);

    // Redirecionar para os produtos do pedido
    header("Location: ../pedido/produtos.php?id=" . $_POST['idPedido']);

    //Redirecionar para o index (comentar caso de tudo errado)
    header("Location: index.php");
?>