<?php include_once './cabecalho.php'; ?>
<div class="col-md-10">
    <div class="card">
        <div class="card-body">
            <table id="tabela" class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ação</th>
                    </tr>
                </thead>                
                <tbody>
                    <?php
                        $categorias = $objCategorias->select();
                        foreach ($categorias as $item) {
                            echo '<tr>';
                            echo '<td>'.$item->nome.'</td>'
                                . '<td>
                                    <a class="btn btn-primary btn-sm" href="categoriaAlterar.php?id='.base64_encode($item->id).'"> Editar</a>
                                    <a class="btn btn-danger btn-sm" href="categoriaExcluir.php?id='.base64_encode($item->id).'"> Excluir</a>';                    
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include_once './rodape.php'; ?>