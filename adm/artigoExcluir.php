<?php
include_once './cabecalho.php';
if ($_GET){
    $artigo = $objArtigos->selectUM(" WHERE id=". base64_decode($_GET['id']));
}

if ($_POST){
    if(isset($_POST['id'])){
        $artigo = $objArtigos->selectUM(" WHERE id=".$_POST['id']);
        $arquivo = $artigo->arquivo;
        
        $retorno = $objArtigos->delete($_POST['id']);
        if ($retorno){
            escreve("ARTIGO EXCLUIDO COM SUCESSO !!!");
            if ($artigo<>''){
                unlink('../arquivos/'.$arquivo);
            }
        }else{
            escreve("OPS, ALGO ERRADO NÃO ESTA CERTO !!!");
        }  
        $artigo = $objArtigos->selectUM(" WHERE id=" . $_POST['id']);
    }
}
?>
<div class="col-md-10">
    <div class="card">
        <div class="card-body">
            <?php if (!empty($artigo)){?>
            <h4 class="">Excluir  Artigo</h4>
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
                <button type="submit" class="btn btn-danger"> <i class="fa fa-eraser"></i> Excluir </button>
            </form>
            <?php }?>
        </div>
    </div>
<?php include_once './rodape.php'; ?>