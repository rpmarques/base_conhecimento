<?php include_once './cabecalho.php'; 

if ($_GET){
    $categoria = $objCategorias->selectUM(" WHERE id=".base64_decode($_GET['id']));
}
if ($_POST){
    if(isset($_POST['nome'])){
        $retorno = $objCategorias->update($_POST['nome'],$_POST['id']);
        if ($retorno){
            escreve("CATEGORIA ALTERADA COM SUCESSO !!!");
            AtualizaPagina();
        }else{
            escreve("OPS, ALGO ERRADO NÃO ESTA CERTO");
        }
    }
}
?>
<div class="col-md-10">
    <div class="card">
        <div class="card-body">
            <h4 class="">Alterar Categoria</h4>
            <form class="" method="post" >
                <input type="hidden" name="id" value="<?php echo $categoria->id;?>">
                <div class="form-group"> 
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control" value="<?php echo $categoria->nome;?>"> 
                </div>
                <button type="submit" class="btn btn-primary"> <i class="fa fa-save "></i> Gravar </button>
            </form>
        </div>
    </div>
<?php include_once './rodape.php'; ?>
