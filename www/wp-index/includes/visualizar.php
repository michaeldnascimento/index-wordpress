<main>

    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"><?=TITLE?></h2>

    <form method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label>Título</label>
            <input type="text" class="form-control" name="titulo" value="<?=$obProdutos->titulo?>" readonly>
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <textarea class="form-control" name="descricao" rows="3" readonly><?=$obProdutos->descricao?></textarea>
        </div>

        <div class="form-group">
            <img class="img-fluid" src="<?=$obProdutos->imagem?>" alt="" />
        </div>

    </form>

</main>