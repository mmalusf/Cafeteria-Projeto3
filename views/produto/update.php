<?php
    require "../../autoload.php";

    //Instanciar um objeto da classe produto (bean)
    $produto = new Produto();

    //Definir os valores dps atributos a partir dos dados do form
    $produto->setIdProduto($_POST['idProduto']);
    $produto->setNome_produto($_POST['nome_produto']);
    $produto->setPreco_produto($_POST['preco_produto']);

    //Instanciar um objeto da Categoria
    $descricao = new TipoProduto();
    $descricao->setIdtipo_produto($_POST['idtipo_produto']);

    //Definir a categoria no tipoProduto
    $produto->setIdtipo_produto($descricao);


    //Instanciar um objeto da classe ProdutoDAO
    $dao = new ProdutoDAO();

    //Invocar o método update da classe ProdutoDAO
    $dao->update($produto);

    //Redirecionar para o index
    header('Location: index.php');

?>