<?php
$result = '';
foreach($comments as $comment){
    $result .= '<div class="card text-dark mb-3">
                    <h5 class="card-header">'.$comment->nome.' <small>'.$comment->data.'</small></h5>
                    <div class="card-body">'.$comment->mensagem.'</div>
                 </div>';
}

$result = strlen($result) ? $result : 'Nenhum comentário neste produto';

?>

<h1>Comentários</h1>
<hr>

<section>

    <?=$result?>

</section>

<hr>

<section id="form">

    <h3>Envie o seu comentário sobre o produto</h3>

    <form method="post">

        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" name="nome" required>
        </div>

        <div class="form-group">
            <label>Mensagem</label>
            <textarea class="form-control" rows="5" name="mensagem" required></textarea>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>

    </form>

</section>