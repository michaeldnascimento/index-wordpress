<?php get_header(); ?>
<main class="wrap">
  <section class="content-area content-thin">

      <?php
      require __DIR__ . '/products/vendor/autoload.php';
      use \App\Entity\Products;

      $products = Products::getProducts();
      include __DIR__ . '/products/resources/view/pages/product/listagem.php';
      ?>

  </section><?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>


