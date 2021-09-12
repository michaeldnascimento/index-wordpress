<?php

require __DIR__.'/vendor/autoload.php';

const TITLE = 'Cadastrar Produto';

use \App\Entity\Produtos;
use \App\Utils\Anexo;
$obProduto = new Produtos();

//VALIDAÇÃO DO POST
if(isset($_POST['titulo'],$_FILES['imagem'],$_POST['descricao'],$_POST['ativo'])){

    //SALVA A IMAGEM DO ANEXO
    $anexo = new Anexo();
    $resultAnexo = $anexo->saveAnexo($_FILES['imagem']);

    $obProduto->titulo    = $_POST['titulo'];
    $obProduto->descricao = $_POST['descricao'];
    $obProduto->imagem    = $resultAnexo;
    $obProduto->ativo     = $_POST['ativo'];
    $obProduto->cadastrar();

    header('location: index.php?status=success');
    exit;
}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';