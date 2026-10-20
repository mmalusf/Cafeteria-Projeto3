<?php
    require "../../autoload.php";

    //Instanciar um objeto da classe formaPagamento (bean)
    $formaPagamento = new FormaPagamento();

    //Definir os valores dps atributos a partir dos dados do form
    $formaPagamento->setNomePagamento($_POST['nomepagamento']);
    $formaPagamento->setIdFormaPagamento($_POST['IdFormaPagamento']);

    //Instanciar um objeto da classe formaPagamentoDAO
    $dao = new FormaPagamentoDAO();

    //Invocar o método update da classe formaPagamentoDAO
    $dao->update($formaPagamento);

    //Redirecionar para o index
    header('Location: index.php');

?>