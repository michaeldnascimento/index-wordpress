<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Produtos;

$produtos = Produtos::getProdutos();

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';