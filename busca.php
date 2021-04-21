<?php 
include_once './cabecalho.php';
if (isset($_POST['texto'])){
    $wTexto = $_POST['texto'];
    $texto = explode(" ", $_POST['texto']);
    $wWhere = " WHERE LOWER(descricao) LIKE '%" . $texto[0] . "%' OR LOWER(titulo) LIKE '%" . $texto[0] . "%'";
    for ($i = 1; $i < count($texto); $i++) {
        $wWhere .= " OR LOWER(descricao) LIKE '%" . $texto[$i] . "%' OR LOWER(titulo) LIKE '%" . $texto[$i] . "%'";
    }
    $artigos = $objArtigos->select($wWhere);
    $contaArtigo = $objArtigos->contaArtigos($wWhere);
}
?>
    <!-- MAIN SECTION -->
    <div class="container featured-area-default padding-30">
        <div class="row">
            <div class="col-md-8 padding-20">
                <div class="row">
                    <!-- ARTICLES -->
                    <div class="fb-heading">
                        <i class="fa fa-search"></i> Search Results for:
                        <strong><?php echo $wTexto?></strong>
                        <h4 class="padding-left-35">
                            <small><?php echo intval($contaArtigo->total);?> artigos encontrado com o seu texto.</small>
                        </h4>
                    </div>
                    <hr class="style-three">
                    <?php 
                    if ($contaArtigo->total>0){
                        foreach($artigos as $linhaBD) { 
                            //PEGA CATEGORIA
                            $categoria = $objCategorias->selectUM(" WHERE id=$linhaBD->categoria_id");
                            ?>
                        <div class="panel panel-default">
                            <div class="article-heading-abb">
                                <a href="./artigo.php?artigo_id=<?php echo base64_encode($linhaBD->id);?>">
                                    <i class="fa fa-pencil-square-o"></i> <?php echo $linhaBD->titulo?></a>
                            </div>
                            <div class="article-info">
                                <div class="art-date">
                                    <a href="#"><i class="fa fa-calendar-o"></i> 20 May, 2016 </a>
                                </div>
                                <div class="art-category">
                                    <a href="./categoria.php?categoria_id=<?php echo base64_encode($categoria->id);?>"> <i class="fa fa-folder"></i> <?php echo $categoria->nome?> </a>
                                </div>
                            </div>
                            <div class="article-content">
                                <p class="block-with-text">
                                    <?php echo $linhaBD->descricao;?>.
                                </p>
                            </div>
                            <div class="article-read-more">
                                <a href="./artigo.php?artigo_id=<?php echo base64_encode($linhaBD->id);?>" class="btn btn-default btn-wide">Artigo completo.</a>
                            </div>
                        </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <?php include_once './lateral_direito.php';?>
        </div>
    </div>
   <?php 
   include_once './rodape.php';
   ?>