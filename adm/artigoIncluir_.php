<?php
include_once './cabecalho.php';
$msg = '';
if (isset($_POST)) {
    if (!empty($_POST['nomeCAT'])) {
        $retorno = $objCategorias->insert($_POST['nomeCAT']);
        if ($retorno) {
            escreve("CATEGORIA CADASTRADA COM SUCESSO !!!");
        } else {
            escreve("OPS, ALGO ERRADO NÃO ESTA CERTO");
        }
    }
    if (isset($_POST['titulo']) && isset($_POST['descricao']) && $_POST['categoria_id']) {
        $retorno = $objArtigos->insert($_POST['titulo'], $_POST['descricao'], $_POST['categoria_id']);
        if ($retorno) {
            escreve("ARTIGO CADASTRADO COM SUCESSO !!!");
            AtualizaPagina();
        } else {
            escreve("OPS, ALGO ERRADO NÃO ESTA CERTO");
        }
    }
}
?>
<div class="col-md-10">
    <div class="card">
        <div class="card-body">
            <h4 class="">Cadastrar  Artigo</h4>
            <form class="" method="post" >
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label >Título</label>
                        <input type="text" class="form-control" name="titulo" placeholder="Título">
                    </div>
                    <div class="form-group col-md-4">                        
                        <label >Categoria</label><br>                        
                        <?php echo $objCategorias->montaSelect2(); ?>
                    </div>
                    <div class="form-group col-md-1"> 
                        <label><br></label>
                         <!--Button trigger modal--> 
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Nova Categoria</button>                        
                    </div>
                </div>
                <div class="form-group">
                    <label>Descrição</label>
                    <textarea class="form-control" rows="10" name="descricao"></textarea>
                </div>
                <button type="submit" class="btn btn-primary"> <i class="fa fa-save "></i> Gravar </button>
            </form>
             <!--Modal--> 
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nova Categoria</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="" method="post" name="modal" >
                            <div class="modal-body">
                                <div class="form-group"> 
                                    <label>Nome</label>
                                    <input type="text" name="nomeCAT" class="form-control" placeholder="Nome da categoria"> 
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"> <i class="fa fa-save "></i> Gravar </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once './rodape.php'; ?>