<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Products;
use \App\Utils\Attachment;

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


//VALIDAÇÃO DA VAGA
if(!$obProduct instanceof Products){

    $mensagem = "Produto não encontrado!";
    $alertColor = "alert-danger";

    $_SESSION['mensagem'] = $mensagem;
    $_SESSION['alertColor'] = $alertColor;

}

//VALIDAÇÃO DO POST
if(isset($_POST['titulo'])){


    //SALVA A IMAGEM DO ANEXO
    if($_FILES['imagem']['tmp_name'] != '') {
        $attachment = new Attachment();
        $resultAttachment = $attachment->saveAttachment($_FILES['imagem']);
        $obProduct->imagem = $resultAttachment;
    }

    $obProduct->titulo    = $_POST['titulo'];
    $obProduct->update();

    //ENVIA DADOS PARA O ALERTA MSG
    $mensagem = "Produto foi editado com sucesso!";
    $alertColor = "alert-success";

    $_SESSION['mensagem'] = $mensagem;
    $_SESSION['alertColor'] = $alertColor;

}

include __DIR__ . '/resources/view/pages/alert/dialog.php';
include __DIR__ . '/resources/view/pages/product/formulario.php';
