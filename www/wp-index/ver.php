<?php

require __DIR__.'/vendor/autoload.php';

const TITLE = 'Ver mais';

use \App\Entity\Products;
use \App\Entity\Comments;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

//CONSULTA PRODUTO
$obProduct = Products::getProduct($_GET['id']);


//VALIDAÇÃO DA VAGA
if(!$obProduct instanceof Products){
    header('location: index.php?status=error');
    exit;
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

    header('location: ver.php?status=success');
    exit;
}

include __DIR__ . '/resources/view/header.php';
include __DIR__ . '/resources/view/pages/product/visualizar.php';
include __DIR__ . '/resources/view/pages/comment/comments.php';
include __DIR__ . '/resources/view/footer.php';