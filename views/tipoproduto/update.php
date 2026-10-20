<?php
    require "../../autoload.php";

    //Instanciar um objeto da classe cliente (bean)
    $tipo_produto = new TipoProduto();

    //Definir os valores dps atributos a partir dos dados do form
    $tipo_produto->setIdtipo_produto($_POST['idtipo_produto']);
    $tipo_produto->setIdCliente($_POST['IdCliente']);

    //Instanciar um objeto da classe ClienteDAO
    $dao = new TipoProdutoDAO();

    //Invocar o método update da classe ClienteDAO
    $dao->update($tipo_produto);

    //Redirecionar para o index
    header('Location: index.php');

?>