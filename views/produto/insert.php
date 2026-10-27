<?php
    //Incluir o arquivo de autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe cliente (bean)
    $produto = new Produto();

    //Definir os valores dos atributos a partir do form
    $produto->setIdProduto($_POST['idproduto']);
    $produto->setDescricao($_POST['descricao']);

    //Instanciar um objeto da classe cliente DAO 
    $dao = new ProdutoDAO();

    //Invocar o método create
    $dao->create($produto);

    //Redirecionar para o index (comentar caso de tudo errado)
    header("Location: index.php");
?>