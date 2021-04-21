<?php include_once './cabecalho.php'; 
if ($_GET){
    $categoria = $objCategorias->selectUM(" WHERE id=".base64_decode($_GET['id']));
}
if ($_POST){
    if(isset($_POST['id'])){
        $contaArtigos = $objArtigos->contaArtigos(" WHERE categoria_id=". $_POST['id']);
        if ($contaArtigos->total>0){
            escreve("TEM ARTIGO COM ESSA CATEGORIA, NÃO POSSO APAGAR !!!");
        }else{
            $retorno = $objCategorias->delete($_POST['id']);
            if ($retorno){
                escreve("CATEGORIA EXCLUIDA COM SUCESSO !!!");
            }else{
                escreve("OPS, ALGO ERRADO NÃO ESTA CERTO !!!");
            }
        }  
        $categoria = $objCategorias->selectUM(" WHERE id=" . $_POST['id']);
        AtualizaPagina();
    }
}
?>
<div class="col-md-10">
    <div class="card">
        <div class="card-body">
            <?php if(!empty($categoria)){?>
            <h4 class="">Excluir Categoria</h4>
            <form class="" method="post" >
                <input type="hidden" name="id" value="<?php echo $categoria->id;?>">
                <div class="form-group"> 
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control" value="<?php echo $categoria->nome;?>"> 
                </div>
                <button type="submit" class="btn btn-danger"> <i class="fa fa-eraser "></i> Excluir</button>
            </form>
            <?php }?>
        </div>
    </div>
<?php include_once './rodape.php'; ?>