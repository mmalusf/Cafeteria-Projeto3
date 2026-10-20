<?php
    //Incluir o arquivo de autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe formaPagamento (bean)
    $formaPagamento = new FormaPagamento();

    //Definir os valores dos atributos a partir do form
    $formaPagamento->setNomePagamento($_POST['nomepagamento']);;

    //Instanciar um objeto da classe formaPagamento DAO 
    $dao = new FormaPagamentoDAO();

    //Invocar o método create
    $dao->create($formaPagamento);

    //Redirecionar para o index (comentar caso de tudo errado)
    header("Location: index.php");
?>