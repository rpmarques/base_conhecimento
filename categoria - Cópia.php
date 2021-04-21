<?php 
include_once './cabecalho.php';
$categoria = $objCategorias->selectUM("WHERE id=". base64_decode($_GET['categoria_id']));
$artigos = $objArtigos->select(" WHERE categoria_id=$categoria->id");
$contaArtigo = $objArtigos->contaArtigos(" WHERE categoria_id=$categoria->id");
?>
    <!-- MAIN SECTION -->
    <div class="container featured-area-default padding-30">
        <div class="row">
            <!-- ARTICLE OVERVIEW SECTION -->
            <div class="col-md-8 padding-20">
                <div class="row">
                    <!-- NAVEGAÇÃO -->
                    <?php include_once './navegacao.php';?>
                    <!-- FIM NAVEGAÇÃO -->
                    <!-- ARTIGOS -->
                    <div class="fb-heading">
                        <i class="fa fa-folder"></i> Categoria: <?php echo $categoria->nome;?>
                        <span class="cat-count">(<?php echo $contaArtigo->total?>)</span>
                    </div>
                    <hr class="style-three">
                    <div class="panel panel-default">
                        <div class="article-heading-abb">
                            <a href="single-article.html">
                                <i class="fa fa-pencil-square-o"></i> How to change account password?</a>
                        </div>
                        <div class="article-info">
                            <div class="art-date">
                                <a href="#"><i class="fa fa-calendar-o"></i> 20 May, 2016 </a>
                            </div>                            
                            <div class="art-category">
                                <a href="#"><i class="fa fa-folder"></i> Account Settings </a>
                            </div>                            
                        </div>
                        <div class="article-content">
                            <p class="block-with-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet finibus dui. Fusce ac nulla nec ex ornare vehicula
                                non nec mi. Cras eget nisi sem. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus. Donec viverra faucibus magna sed interdum. Phasellus ultrices sagittis
                                molestie. Sed sit amet nisl id risus egestas semper. In porta, arcu eu dignissim vestibulum,
                                sapien justo imperdiet enim, sed facilisis quam justo in neque. Aliquam fermentum arcu eget
                                hendrerit efficitur.
                            </p>
                        </div>
                        <div class="article-read-more">
                            <a href="single-article.html" class="btn btn-default btn-wide">Read more...</a>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="article-heading-abb">
                            <a href="single-article.html">
                                <i class="fa fa-pencil-square-o"></i> How to change currency in gomac?</a>
                        </div>
                        <div class="article-info">
                            <div class="art-date">
                                <a href="#">
                                    <i class="fa fa-calendar-o"></i> 20 May, 2016 </a>
                            </div>
                            <div class="art-category">
                                <a href="#">
                                    <i class="fa fa-folder"></i> Admin Panel </a>
                            </div>
                            <div class="art-comments">
                                <a href="#">
                                    <i class="fa fa-comments-o"></i> 10 Comments </a>
                            </div>
                        </div>
                        <div class="article-content">
                            <p class="block-with-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet finibus dui. Fusce ac nulla nec ex ornare vehicula
                                non nec mi. Cras eget nisi sem. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus. Donec viverra faucibus magna sed interdum. Phasellus ultrices sagittis
                                molestie. Sed sit amet nisl id risus egestas semper. In porta, arcu eu dignissim vestibulum,
                                sapien justo imperdiet enim, sed facilisis quam justo in neque. Aliquam fermentum arcu eget
                                hendrerit efficitur.
                            </p>
                        </div>
                        <div class="article-read-more">
                            <a href="single-article.html" class="btn btn-default btn-wide">Read more...</a>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="article-heading-abb">
                            <a href="single-article.html">
                                <i class="fa fa-pencil-square-o"></i> How to edit order details?</a>
                        </div>
                        <div class="article-info">
                            <div class="art-date">
                                <a href="#">
                                    <i class="fa fa-calendar-o"></i> 20 May, 2016 </a>
                            </div>
                            <div class="art-category">
                                <a href="#">
                                    <i class="fa fa-folder"></i> Orders </a>
                            </div>
                            <div class="art-comments">
                                <a href="#">
                                    <i class="fa fa-comments-o"></i> 0 Comments </a>
                            </div>
                        </div>
                        <div class="article-content">
                            <p class="block-with-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet finibus dui. Fusce ac nulla nec ex ornare vehicula
                                non nec mi. Cras eget nisi sem. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus. Donec viverra faucibus magna sed interdum. Phasellus ultrices sagittis
                                molestie. Sed sit amet nisl id risus egestas semper. In porta, arcu eu dignissim vestibulum,
                                sapien justo imperdiet enim, sed facilisis quam justo in neque. Aliquam fermentum arcu eget
                                hendrerit efficitur.
                            </p>
                        </div>
                        <div class="article-read-more">
                            <a href="single-article.html" class="btn btn-default btn-wide">Read more...</a>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="article-heading-abb">
                            <a href="single-article.html">
                                <i class="fa fa-pencil-square-o"></i> How to print stock barcode?</a>
                        </div>
                        <div class="article-info">
                            <div class="art-date">
                                <a href="#">
                                    <i class="fa fa-calendar-o"></i> 20 May, 2016 </a>
                            </div>
                            <div class="art-category">
                                <a href="#">
                                    <i class="fa fa-folder"></i> Stocks </a>
                            </div>
                            <div class="art-comments">
                                <a href="#">
                                    <i class="fa fa-comments-o"></i> 12 Comments </a>
                            </div>
                        </div>
                        <div class="article-content">
                            <p class="block-with-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet finibus dui. Fusce ac nulla nec ex ornare vehicula
                                non nec mi. Cras eget nisi sem. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus. Donec viverra faucibus magna sed interdum. Phasellus ultrices sagittis
                                molestie. Sed sit amet nisl id risus egestas semper. In porta, arcu eu dignissim vestibulum,
                                sapien justo imperdiet enim, sed facilisis quam justo in neque. Aliquam fermentum arcu eget
                                hendrerit efficitur.
                            </p>
                        </div>
                        <div class="article-read-more">
                            <a href="single-article.html" class="btn btn-default btn-wide">Read more...</a>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="article-heading-abb">
                            <a href="single-article.html">
                                <i class="fa fa-pencil-square-o"></i> How to generate barcode?</a>
                        </div>
                        <div class="article-info">
                            <div class="art-date">
                                <a href="#">
                                    <i class="fa fa-calendar-o"></i> 20 May, 2016 </a>
                            </div>
                            <div class="art-category">
                                <a href="#">
                                    <i class="fa fa-folder"></i> Stocks </a>
                            </div>
                            <div class="art-comments">
                                <a href="#">
                                    <i class="fa fa-comments-o"></i> 7 Comments </a>
                            </div>
                        </div>
                        <div class="article-content">
                            <p class="block-with-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet finibus dui. Fusce ac nulla nec ex ornare vehicula
                                non nec mi. Cras eget nisi sem. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus. Donec viverra faucibus magna sed interdum. Phasellus ultrices sagittis
                                molestie. Sed sit amet nisl id risus egestas semper. In porta, arcu eu dignissim vestibulum,
                                sapien justo imperdiet enim, sed facilisis quam justo in neque. Aliquam fermentum arcu eget
                                hendrerit efficitur.
                            </p>
                        </div>
                        <div class="article-read-more">
                            <a href="single-article.html" class="btn btn-default btn-wide">Read more...</a>
                        </div>
                    </div>
                    <!-- END ARTICLES -->

                    <!-- PAGINATION -->
                    <nav class="text-center">
                        <ul class="pagination">
                            <li class="disabled">
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">
                                        <i class="fa fa-arrow-circle-left"></i> Previous</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="#">1
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="enabled">
                                <a href="#">2
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="enabled">
                                <a href="#">3
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="enabled">
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">Next
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- END PAGINATION -->
                </div>
            </div>
            <!-- END ARTICLES OVERVIEW SECTION-->
            <!-- SIDEBAR STUFF -->
            <?php include_once './lateral_direito.php';?>
            <!-- END SIDEBAR STUFF -->
        </div>
    </div>
    <!-- END MAIN SECTION -->

    <!-- RODAPÉ -->
    <?php include_once './rodape.php'?>