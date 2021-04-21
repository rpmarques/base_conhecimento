<?php 
include_once './cabecalho.php';
?>
    <div class="container featured-area-default padding-30">
        <div class="row">
            <div class="col-md-8 padding-20">
                <div class="row">
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li><a href="./index.php"><i class="fa fa-home"></i></a></li>
                            <li class="active">Todos os Artigos</li>
                        </ol>
                    </div>
                    <div class="fb-heading"> Todos os Artigos </div>
                    <hr class="style-three">
                    <?php 
                    $artigos = $objArtigos->select(" ORDER BY id DESC");
                    foreach ($artigos as $linhaBD){ 
                        //PEGAR A CATEGORIA
                        $categoria = $objCategorias->selectUM(" WHERE id=$linhaBD->categoria_id");
                        ?>
                        <div class="panel panel-default">
                        <div class="article-heading-abb">
                            <a href="artigo.php?artigo_id=<?php echo base64_encode($linhaBD->id)?>">
                                <i class="fa fa-pencil-square-o"></i> <?php echo $linhaBD->titulo?></a>
                        </div>
                        <div class="article-info">
                            <div class="art-date"><a href="#"><i class="fa fa-calendar-o"></i> 20 May, 2016 </a></div>
                            <div class="art-category"><a href="./categoria.php?categoria_id=<?php echo base64_encode($categoria->id)?>"><i class="fa fa-folder"></i> <?php echo $categoria->nome;?> </a></div>
                        </div>
                        <div class="article-content">
                            <p class="block-with-text">
                                <?php echo $linhaBD->descricao;?>
                            </p>
                        </div>
                        <div class="article-read-more">
                            <a href="./artigo.php?artigo_id=<?php echo base64_encode($linhaBD->id);?>" class="btn btn-default btn-wide">Artigo completo.</a>
                        </div>
                    </div>
                    <?php                     
                    }
                    ?>
                </div>
            </div>
            <?php include_once './lateral_direito.php';?>
        </div>
    </div>
<?php    include_once './rodape.php';?>