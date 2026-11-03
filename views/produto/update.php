<?php
    require "../../autoload.php";

    //Instanciar um objeto da classe cliente (bean)
    $produto = new Produto();

    //Definir os valores dps atributos a partir dos dados do form
    $produto->setIdProduto($_POST['idproduto']);
    $produto->setNome_produto($_POST['nome_produto']);
    $produto->setPreco_produto($_POST['preco_produto']);

    //Instanciar um objeto da classe ClienteDAO
    $dao = new ProdutoDAO();

    //Invocar o método update da classe ClienteDAO
    $dao->update($produto);

    //Redirecionar para o index
    header('Location: index.php');

?>