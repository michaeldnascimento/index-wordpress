<?php


$result = '';
foreach($products as $product){
    $result .= '<tr>
                      <td>
                        <img width=100 src="'.$product->imagem.'" alt="" />
                      </td>
                      <td>'.$product->titulo.'</td>
                      <td>
                        <a href="ver.php?id='.$product->id.'">
                          <button type="button" class="btn btn-primary">Ver mais</button>
                        </a>
                        <a href="editar.php?id='.$product->id.'">
                          <button type="button" class="btn btn-success">Editar</button>
                        </a>
                        <a href="excluir.php?id='.$product->id.'">
                          <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                      </td>
                    </tr>';
}

$result = strlen($result) ? $result : '<tr>
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
            <?=$result?>
        </tbody>
    </table>

  </section>


</main>