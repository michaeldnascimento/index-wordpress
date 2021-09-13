<main>

    <section>
        <a href="index.php">
            <button class="btn btn-info">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"><?=TITLE?></h2>

        <div class="form-group">
            <label>Título</label>
            <input type="text" class="form-control" value="<?=$obProduct->titulo?>" readonly>
        </div>

        <div class="form-group">
            <img width=300 class="img-fluid" src="<?=$obProduct->imagem?>" alt="" />
        </div>

</main>