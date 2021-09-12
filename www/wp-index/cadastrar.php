<?php

require __DIR__.'/vendor/autoload.php';

const TITLE = 'Cadastrar Produto';

use \App\Entity\Products;
use \App\Utils\Attachment;
$obProduto = new Products();

//VALIDAÇÃO DO POST
if(isset($_POST['titulo'],$_FILES['imagem'])){

    //SALVA A IMAGEM DO ANEXO
    $attachment = new Attachment();
    $resultAttachment = $attachment->saveAttachment($_FILES['imagem']);

    $obProduto->titulo    = $_POST['titulo'];
    $obProduto->imagem    = $resultAttachment;
    $obProduto->register();

    header('location: index.php?status=success');
    exit;
}


include __DIR__ . '/resources/view/header.php';
include __DIR__ . '/resources/view/pages/product/formulario.php';
include __DIR__ . '/resources/view/footer.php';