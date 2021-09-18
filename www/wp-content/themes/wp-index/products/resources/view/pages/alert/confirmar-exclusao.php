<main>

    <div class="form-group">
        <?= $dialog; ?>
    </div>

  <form method="post">

    <div class="form-group">
      <p>Você deseja realmente excluir o produto <strong><?=$obProduct->titulo?></strong>?</p>
    </div>

    <div class="form-group">
      <a href="../">
        <button type="button" class="btn btn-success">Cancelar</button>
      </a>

      <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
    </div>

  </form>

</main>