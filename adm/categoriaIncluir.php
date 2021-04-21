<?php include_once './cabecalho.php'; 
$msg='';
if ($_POST){
    if(isset($_POST['nome'])){
        if (!empty($_POST['nome'])){
            $retorno = $objCategorias->insert($_POST['nome']);
            if ($retorno){
                escreve("CATEGORIA CADASTRADA COM SUCESSO !!!");
                AtualizaPagina();
            }else{
                escreve("OPS, ALGO ERRADO NÃO ESTA CERTO");
            }
        }        
    }
}
?>
<div class="col-md-10">
    <div class="card">
        <div class="card-body">
            <h4 class="">Cadastrar Categoria</h4>
            <form class="" method="post" >
                <div class="form-group"> 
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control" placeholder="Nome da categoria"> 
                </div>
                <button type="submit" class="btn btn-primary"> <i class="fa fa-save "></i> Gravar </button>
            </form>
        </div>
    </div>
<?php include_once './rodape.php'; ?>
