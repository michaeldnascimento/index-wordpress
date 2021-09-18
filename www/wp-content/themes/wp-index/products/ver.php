<?php

require __DIR__ . '/vendor/autoload.php';


use \App\Entity\Products;
use \App\Entity\Comments;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    //ENVIA DADOS PARA O ALERTA MSG
    $mensagem = "ID Inválido!";
    $alertColor = "alert-danger";

    $_SESSION['mensagem'] = $mensagem;
    $_SESSION['alertColor'] = $alertColor;

}

//CONSULTA PRODUTO
$obProduct = Products::getProduct($_GET['id']);


//VALIDAÇÃO DO PRODUTO
if(!$obProduct instanceof Products){

    //ENVIA DADOS PARA O ALERTA MSG
    $mensagem = "Produto não encontrado!";
    $alertColor = "alert-danger";

    $_SESSION['mensagem'] = $mensagem;
    $_SESSION['alertColor'] = $alertColor;

}

//CONSULTA COMENTÁRIOS
$comments = Comments::getComment($_GET['id']);


//VALIDAÇÃO DO POST
if(isset($_POST['nome'],$_POST['mensagem'])){

    $obComment = new Comments();
    $obComment->nome       = $_POST['nome'];
    $obComment->mensagem   = $_POST['mensagem'];
    $obComment->id_produto = $_GET['id'];
    $obComment->register();

    //ENVIA DADOS PARA O ALERTA MSG
    $mensagem = "Comentário salvo com sucesso!";
    $alertColor = "alert-success";

    $_SESSION['mensagem'] = $mensagem;
    $_SESSION['alertColor'] = $alertColor;

    echo '<meta http-equiv="refresh" content="0">';
}

include __DIR__ . '/resources/view/pages/alert/dialog.php';
include __DIR__ . '/resources/view/pages/product/visualizar.php';
include __DIR__ . '/resources/view/pages/comment/comments.php';