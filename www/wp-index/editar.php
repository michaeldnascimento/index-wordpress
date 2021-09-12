<?php

require __DIR__.'/vendor/autoload.php';

const TITLE = 'Editar produto';

use \App\Entity\Produtos;
use \App\Utils\Anexo;

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
if(isset($_POST['titulo'],$_FILES['imagem'],$_POST['descricao'],$_POST['ativo'])){

    //SALVA A IMAGEM DO ANEXO
    $anexo = new Anexo();
    $resultAnexo = $anexo->saveAnexo($_FILES['imagem']);

    $obProdutos->titulo    = $_POST['titulo'];
    $obProdutos->descricao = $_POST['descricao'];
    $obProdutos->imagem    = $resultAnexo;
    $obProdutos->ativo     = $_POST['ativo'];
    $obProdutos->atualizar();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';