<?php 
include_once './cabecalho.php';
$categoria   = $objCategorias->selectUM("WHERE id=". base64_decode($_GET['categoria_id']));
$artigos     = $objArtigos->select(" WHERE categoria_id=$categoria->id");
$contaArtigo = $objArtigos->contaArtigos(" WHERE categoria_id=$categoria->id");
?>
    <div class="container featured-area-default padding-30">
        <div class="row">
            <div class="col-md-8 padding-20">
                <div class="row">
                    <?php include_once './navegacao.php';?>
                    <div class="fb-heading">
                        <i class="fa fa-folder"></i> Categoria: <?php echo $categoria->nome;?>
                        <span class="cat-count">(<?php echo $contaArtigo->total?>)</span>
                    </div>
                    <hr class="style-three">
                    <?php
                    foreach ($artigos as $artigoItem){ ?>
                        <div class="panel panel-default">
                        <div class="article-heading-abb">
                            <a href="./artigo.php?artigo_id=<?php echo base64_encode($artigoItem->id);?>">
                                <i class="fa fa-pencil-square-o"></i> <?php echo $artigoItem->titulo;?></a>
                        </div>
                        <div class="article-info">
                            <div class="art-date"><a href="#"><i class="fa fa-calendar-o"></i> 20 May, 2016 </a></div>                            
                            <div class="art-category"><a href="./categoria.php?categoria_id=<?php echo base64_encode($categoria->id);?>"><i class="fa fa-folder"></i> <?php echo $categoria->nome;?> </a></div>                            
                        </div>
                        <div class="article-content">
                            <p class="block-with-text">
                                <?php echo ($artigoItem->descricao); ?>
                            </p>
                        </div>
                        <div class="article-read-more">
                            <a href="./artigo.php?artigo_id=<?php echo base64_encode($artigoItem->id);?>" class="btn btn-default btn-wide">Artigo completo.</a>
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
    <?php include_once './rodape.php'?>