<?php
    require "../../autoload.php";

    //Coletar valor do id pela URL
    $id = $_GET['id'];

    //Instanciar um objeto da classe TipoProdutoDAO
    $dao = new Produto_has_PedidoDAO();

    //Invocar o método para excluir
    $dao->destroy($id);

    //Redirecionar para o index
    header('Location: index.php');

?>