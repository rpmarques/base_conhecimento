<?php include_once './cabecalho.php'; ?>
<div class="col-md-10">
    <div class="card">
        <div class="card-body">
            <table id="tabela" class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Ação</th>
                    </tr>
                </thead>                
                <tbody>
                    <?php
                        $artigos = $objArtigos->select();
                        foreach ($artigos as $item) {
                            //PEGA A CATEGORIA
                            $categoria = $objCategorias->selectUM(" WHERE id=$item->categoria_id");
                            echo '<tr>';
                            echo '<td>'.$item->titulo.'</td>'
                            . '<td>'.$categoria->nome.'</td>'
                                . '<td>
                                    <a class="btn btn-primary btn-sm" href="artigoAlterar.php?id='.base64_encode($item->id).'"> Editar</a>
                                    <a class="btn btn-danger btn-sm" href="artigoExcluir.php?id='.base64_encode($item->id).'"> Excluir</a>';                    
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include_once './rodape.php'; ?>