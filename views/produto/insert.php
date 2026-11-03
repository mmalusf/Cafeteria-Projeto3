<?php
    //Incluir o arquivo de autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe cliente (bean)
    $produto = new Produto();

    //Definir os valores dos atributos a partir do form
    $produto->setIdProduto($_POST['idProduto']);
    $produto->setNome_produto($_POST['nome_produto']);
    $produto->setPreco_produto($_POST['preco_produto']);

    //Instanciar um objeto dp tipo produto
    $tipo_produto = new TipoProduto();
    $tipo_produto->setIdtipo_produto($_POST['idtipo_produto']);

    //Definir o tipo produto
    $produto->setIdtipo_produto($tipo_produto);

    //Instanciar um objeto da classe cliente DAO 
    $dao = new ProdutoDAO();

    //Invocar o método create
    $dao->create($produto);

    //Redirecionar para o index (comentar caso de tudo errado)
    header("Location: index.php");
?>