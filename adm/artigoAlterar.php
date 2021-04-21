<?php
include_once './cabecalho.php';
if ($_GET){
    $artigo = $objArtigos->selectUM(" WHERE id=". base64_decode($_GET['id']));
}

if ($_POST) {
    if (isset($_POST['titulo']) && isset($_POST['descricao']) && $_POST['categoria_id']) {
        $retorno = $objArtigos->update($_POST['titulo'],$_POST['descricao'],$_POST['categoria_id'],$_POST['id']);
        if ($retorno) {
            escreve("ARTIGO ALTERADO COM SUCESSO !!!");
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
            <h4 class="">Editar  Artigo</h4>
            <form class="" method="post" >
                <div class="form-row">
                    <input type="hidden" name="id" value="<?php echo $artigo->id?>">                           
                    <div class="form-group col-md-6">
                        <label >Título</label>
                        <input type="text" class="form-control" name="titulo" value="<?php echo $artigo->titulo?>">
                    </div>
                    <div class="form-group col-md-6">                        
                        <label >Categoria</label><br>                        
                        <?php echo $objCategorias->montaSelect2('categoria_id',$artigo->categoria_id);?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Descrição</label>
                    <textarea class="form-control" rows="10" name="descricao"><?php echo $artigo->descricao;?></textarea>
                </div>
                <button type="submit" class="btn btn-primary"> <i class="fa fa-save "></i> Gravar </button>
            </form>
        </div>
    </div>
<?php include_once './rodape.php'; ?>