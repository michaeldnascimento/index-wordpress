<main>

    <div class="form-group">
        <?= $dialog; ?>
    </div>

    <section>
        <div class="form-group">
            <a href="../">
              <button class="btn btn-info">Voltar</button>
            </a>
        </div>
    </section>

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
