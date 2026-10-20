<?php
    //Incluir o arquivo de autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe cliente (bean)
    $tipo_produto = new TipoProduto();

    //Definir os valores dos atributos a partir do form
    $tipo_produto->setIdtipo_produto($_POST['idtipo_produto']);
    $tipo_produto->setDescricao($_POST['descricao']);

    //Instanciar um objeto da classe cliente DAO 
    $dao = new TipoProdutoDAO();

    //Invocar o método create
    $dao->create($tipo_produto);

    //Redirecionar para o index (comentar caso de tudo errado)
    header("Location: index.php");
?>