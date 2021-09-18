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


        <div class="form-group">
            <label>Título</label>
            <input type="text" class="form-control" value="<?=$obProduct->titulo?>" readonly>
        </div>

        <div class="form-group">
            <img width=300 class="img-fluid" src="<?=$obProduct->imagem?>" alt="" />
        </div>

</main>