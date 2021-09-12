<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Products;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=error');
  exit;
}

//CONSULTA O PRODUTO
$obProduct = Products::getProduct($_GET['id']);

//VALIDAÇÃO DO PRODUTO
if(!$obProduct instanceof Products){
  header('location: index.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['excluir'])){

    $obProduct->delete();

  header('location: index.php?status=success');
  exit;
}

include __DIR__ . '/resources/view/header.php';
include __DIR__ . '/resources/view/pages/alert/confirmar-exclusao.php';
include __DIR__ . '/resources/view/footer.php';