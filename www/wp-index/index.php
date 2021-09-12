<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Products;

$products = Products::getProducts();

include __DIR__ . '/resources/view/header.php';
include __DIR__ . '/resources/view/pages/product/listagem.php';
include __DIR__ . '/resources/view/footer.php';