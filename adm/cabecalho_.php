<?php
//DEIXO SOMENTE APARECENDO OS ERROS CRÍTICOS
//error_reporting(E_ERROR|E_PARSE);     
// REPORTA TODOS OS ERROS E AVISOS
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once './classes/funcoes.class.php';
include_once './classes/logger.class.php';
include_once './classes/conexao.class.php';
include_once './classes/categorias.class.php';
$objCategorias = Categorias::getInstance(Conexao::getInstance());
include_once './classes/artigos.class.php';
$objArtigos = Artigos::getInstance(Conexao::getInstance());
define("LOGIN", "site");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Base de Conhecimento - Versão: 1.00</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/font-awesome.css" type="text/css">
        <link rel="stylesheet" href="./css/estilo.css" type="text/css">
        <link rel="stylesheet" href="./css/select2.min.css" />  
    </head>

    <body>
        <nav class="navbar navbar-expand-md bg-secondary navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="./index.php">GenBASE</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="form-inline m-0" method="post" role="form" action="index.php">
                        <input class="form-control mr-2" type="text" placeholder="Procurar" name="procurar">
                        <button class="btn btn-primary gradient-overlay" type="submit"> Buscar </button>
                    </form> 
                </div>
                <ul class="navbar-nav mr-auto">
                    
                    
                    
                
                    <div class="dropdown show">
                    <a class="btn btn-primary dropdown-toggle gradient-overlay" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Manutenção
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="./incluirCategoria.php">Cadastrar Categoria</a>
                        <a class="dropdown-item" href="./incluirArtigo.php">Cadastrar Artigo</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
                    
                    
                </ul>
                
                
                
                
                <!--<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>-->
                

                

            </div>

        </nav>
        <div class="py-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-body">                    
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item"><a href="#" class="active nav-link"><i class="fa fa-home"></i> Categorias</a></li>
                                        <?php
                                        $categorias = $objCategorias->select();
                                        foreach ($categorias as $itemCat) {
                                            $contaArtigo = $objArtigos->contaArtigos(" WHERE categoria_id=" . $itemCat->id);
                                            echo "<li class='nav-item'><a class='nav-link' href='./index.php?categoria_id=" . base64_encode($itemCat->id) . "'>$itemCat->nome &nbsp; <span class='badge badge-secondary'>$contaArtigo->total</span></a></li>";
                                        }
                                        ?>
                                </ul>
                            </div>
                        </div>            
                    </div>