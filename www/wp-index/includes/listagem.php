<?php


$resultados = '';
foreach($produtos as $produto){
    $resultados .= '<tr>
                      <td>
                        <img width=150 src="'.$produto->imagem.'" alt="" />
                      </td>
                      <td>'.$produto->titulo.'</td>
                      <td>
                        <a href="visualizar.php?id='.$produto->id.'">
                          <button type="button" class="btn btn-primary">Ver mais</button>
                        </a>
                      </td>
                    </tr>';
}

$resultados = strlen($resultados) ? $resultados : '<tr>
                                                       <td colspan="6" class="text-center">
                                                              Nenhum produto encontrado
                                                       </td>
                                                    </tr>';

?>

<main>

  <section>
    <a href="cadastrar.php">
      <button class="btn btn-success">Novo produto</button>
    </a>
  </section>

  <section>

    <table class="table bg-light mt-3">
        <thead>
          <tr>
            <th>Imagem</th>
            <th>Titulo</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
            <?=$resultados?>
        </tbody>
    </table>

  </section>


</main>