<main>

  <section>
    <a href="index.php">
      <button class="btn btn-info">Voltar</button>
    </a>
  </section>

  <h2 class="mt-3"><?=TITLE?></h2>

  <form method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label>Título</label>
            <input type="text" class="form-control" name="titulo" value="<?=$obProduct->titulo?>">
        </div>

        <div class="form-group">
            <label>Inserir Imagem</label>
            <input class="form-control" type="file" value="" name="imagem" id="imagem" accept="image/*">
        </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>

  </form>

</main>