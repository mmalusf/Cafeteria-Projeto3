<?php
    require "../../autoload.php";

    //Instanciar um objeto da classe tipoProduto (bean)
    $tipo_produto = new TipoProduto();

    //Definir os valores dos atributos a partir dos dados do form
    $tipo_produto->setIdtipo_produto($_POST['idtipo_produto']);
    $tipo_produto->setDescricao($_POST['descricao']);

    //Instanciar um objeto da classe TipoProdutoDAO
    $dao = new TipoProdutoDAO();

    //Invocar o método update da classe TipoProdutoDAO
    $dao->update($tipo_produto);

    //Redirecionar para o index
    header('Location: index.php');

?>