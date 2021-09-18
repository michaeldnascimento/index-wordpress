<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Products;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    $mensagem = "ID Inválido!";
    $alertColor = "alert-danger";

    $_SESSION['mensagem'] = $mensagem;
    $_SESSION['alertColor'] = $alertColor;

    echo '<meta http-equiv="refresh" content="0;url=/">';
}

//CONSULTA O PRODUTO
$obProduct = Products::getProduct($_GET['id']);

//VALIDAÇÃO DO PRODUTO
if(!$obProduct instanceof Products){
    $mensagem = "Produto não encontrado!";
    $alertColor = "alert-danger";

    $_SESSION['mensagem'] = $mensagem;
    $_SESSION['alertColor'] = $alertColor;

    echo '<meta http-equiv="refresh" content="0;url=/">';
}

//VALIDAÇÃO DO POST
if(isset($_POST['excluir'])){

    $obProduct->delete();

    //ENVIA DADOS PARA O ALERTA MSG
    $mensagem = "Produto foi excluído com sucesso!";
    $alertColor = "alert-success";

    $_SESSION['mensagem'] = $mensagem;
    $_SESSION['alertColor'] = $alertColor;

    echo '<meta http-equiv="refresh" content="0;url=/">';
}

include __DIR__ . '/resources/view/pages/alert/dialog.php';
include __DIR__ . '/resources/view/pages/alert/confirmar-exclusao.php';
