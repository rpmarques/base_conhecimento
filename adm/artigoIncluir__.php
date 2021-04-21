<?php
include_once './cabecalho.php';
$msg = '';
if ($_POST) {
    if (isset($_POST['titulo']) && isset($_POST['descricao']) && $_POST['categoria_id']) {
        $retorno = $objArtigos->insert($_POST['titulo'],$_POST['descricao'],$_POST['categoria_id']);
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
                    <div class="form-group col-md-6">                        
                        <label >Categoria</label><br>                        
                        <?php echo $objCategorias->montaSelect2();?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Descrição</label>
                    <textarea class="form-control" rows="10" name="descricao"></textarea>
                </div>
                <button type="submit" class="btn btn-primary"> <i class="fa fa-save "></i> Gravar </button>
            </form>
        </div>
    </div>
<?php include_once './rodape.php'; ?>