<?php 
include_once './cabecalho.php';
if ($_GET){
    $artigo = $objArtigos->selectUM(" WHERE id=".base64_decode($_GET['artigo_id']));
   //SOMA CLICK NO ARTIGO
   $retSomaClick = $objArtigos->somaClick(base64_decode($_GET['artigo_id']));
   if (!$retSomaClick){
       escreve("ERRO NO SOMACLICK");
   }
   $categoria = $objCategorias->selectUM(" WHERE id=".$artigo->categoria_id);   
}
?>
    <div class="container featured-area-default padding-30">
        <div class="row">
            <div class="col-md-8 padding-20">
                <div class="row">
                    <?php include_once './navegacao.php';?>
                    <div class="panel panel-default">
                        <div class="article-heading margin-bottom-5">                            
                                <i class="fa fa-pencil-square-o"></i> <?php echo $artigo->titulo?>
                        </div>
                        <div class="article-info">
                            <div class="art-date">
                                <i class="fa fa-calendar-o"></i> 20 May, 2016 
                            </div>
                            <div class="art-category">
                                <a href="./categoria.php?categoria_id=<?php echo base64_encode($categoria->id);?>"> <i class="fa fa-folder"></i> <?php echo $categoria->nome?> </a>
                            </div>
                        </div>
                        <div class="article-content">
                            <p class="block-with-text"> 
                                <?php echo $artigo->descricao;?> 
                            </p>
                        </div>
                        <?php 
                        if ($artigo->nome_original<>''){?>
                            <div class="article-read-more">
                            <a href="./download.php?artigo_id=<?php echo base64_encode($artigo->id);?>" class="btn btn-default btn-wide" target="_blank">Download do Anexo.</a>
                        </div>
                        <?php 
                        }
                        ?>
                        
                    </div>
                </div>
            </div>
            <?php include_once './lateral_direito.php'; ?>
        </div>
    </div>
    <?php include_once './rodape.php'; ?>