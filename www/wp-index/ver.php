<?php

require __DIR__.'/vendor/autoload.php';

const TITLE = 'Ver mais';

use \App\Entity\Produtos;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

//CONSULTA PRODUTO
$obProdutos = Produtos::getProduto($_GET['id']);


//VALIDAÇÃO DA VAGA
if(!$obProdutos instanceof Produtos){
    header('location: index.php?status=error');
    exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])){

    $obProdutos->titulo    = $_POST['titulo'];
    $obProdutos->descricao = $_POST['descricao'];
    $obProdutos->ativo     = $_POST['ativo'];
    $obProdutos->atualizar();

    header('location: index.php?status=success');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/visualizar.php';
include __DIR__.'/includes/footer.php';