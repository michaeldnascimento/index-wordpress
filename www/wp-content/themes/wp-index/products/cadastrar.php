<?php

require __DIR__ . '/vendor/autoload.php';

const TITLE = 'Cadastrar Produto';

use \App\Entity\Products;
use \App\Utils\Attachment;
use kartik\dialog\DialogAsset;

$obProduto = new Products();


//VALIDAÇÃO DO POST
if(isset($_POST['titulo'],$_FILES['imagem'])){

    //SALVA A IMAGEM DO ANEXO
    $attachment = new Attachment();
    $resultAttachment = $attachment->saveAttachment($_FILES['imagem']);

    $obProduto->titulo    = $_POST['titulo'];
    $obProduto->imagem    = $resultAttachment;
    $obProduto->register();

    //ENVIA DADOS PARA O ALERTA MSG
    $mensagem = "Produto salvo com sucesso!";
    $alertColor = "alert-success";

    $_SESSION['mensagem'] = $mensagem;
    $_SESSION['alertColor'] = $alertColor;

}

include __DIR__ . '/resources/view/pages/alert/dialog.php';
include __DIR__ . '/resources/view/pages/product/formulario.php';
