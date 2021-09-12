<?php

require __DIR__.'/vendor/autoload.php';

const TITLE = 'Editar produto';

use \App\Entity\Products;
use \App\Utils\Attachment;

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

//VALIDAÇÃO DO POST
if(isset($_POST['titulo'],$_FILES['imagem'])){

    //SALVA A IMAGEM DO ANEXO
    $attachment = new Attachment();
    $resultAttachment = $attachment->saveAttachment($_FILES['imagem']);

    $obProduct->titulo    = $_POST['titulo'];
    $obProduct->imagem    = $resultAttachment;
    $obProduct->update();

  header('location: index.php?status=success');
  exit;
}

include __DIR__ . '/resources/view/header.php';
include __DIR__ . '/resources/view/pages/product/formulario.php';
include __DIR__ . '/resources/view/footer.php';