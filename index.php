<?php 
include_once './cabecalho.php';
?>
    <div class="container featured-area-default padding-30">
        <div class="row">
            <div class="col-md-8 padding-20">
                <div class="row">
                    <div class="col-md-12">
                        <div class="fb-heading">
                            Artigos por Categoria
                        </div>
                        <hr class="style-three">
                        <div class="row">
                            <?php 
                            $categorias = $objCategorias->select();
                            foreach ($categorias as $categoriaItem) {
                                $contaArtigo = $objArtigos->contaArtigos(" WHERE categoria_id=$categoriaItem->id");
                                if ($contaArtigo->total>0){ //SO TRAZ A CATEGORIA SE TIVER ALGUM ARTIGO
                                ?>
                                <div class="col-md-6 margin-bottom-20">
                                    <div class="fat-heading-abb">
                                        <a href="./categoria.php?categoria_id=<?php echo base64_encode($categoriaItem->id);?>">
                                            <i class="fa fa-folder"></i> <?php echo $categoriaItem->nome;?>
                                            <span class="cat-count"><?php echo "(".intval($contaArtigo->total).")";?></span>
                                        </a>
                                    </div>
                                    <div class="fat-content-small padding-left-30">
                                        <ul>
                                            <?php $artigos =$objArtigos->select(" WHERE categoria_id=$categoriaItem->id ORDER BY id DESC LIMIT 5"); //CARREGA 5 ARTIGOS DE CADA CATEGORIA
                                                foreach ($artigos as $artigoItem) {?>
                                                    <li><a href="./artigo.php?artigo_id=<?php echo base64_encode($artigoItem->id); ?>"><i class="fa fa-file-text-o"></i> <?php echo substr($artigoItem->titulo,0,40).' ...';?></a></li>
                                               <?php 
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php                            
                            }}
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php include_once './lateral_direito.php'; ?>            
        </div>
    </div>
<?php 
include_once './rodape.php';
?>