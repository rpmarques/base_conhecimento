<?php
/*
01/07/2018 - 2.0 - NOVO LAYOUT
13/07/2018 - 2.1 - UPDLOAD DE ARQUIVO JUNTO COM CHAMADO
 */
include_once './classes/funcoes.class.php';
include_once './classes/logger.class.php';
include_once './classes/conexao.class.php';
include_once './classes/categorias.class.php';
$objCategorias = Categorias::getInstance(Conexao::getInstance());
include_once './classes/artigos.class.php';
$objArtigos = Artigos::getInstance(Conexao::getInstance());

error_reporting(E_ALL);
ini_set("display_errors", 1);
define("LOGIN", $_SERVER['REMOTE_ADDR']);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Base de Conhecimento V2</title>
    <!-- CSS -->
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/font-awesome.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid featured-area-white-border">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="login-box border-left-1 border-right-1">
                        <a href="./adm/index.php" target="_blank"><i class="fa fa-key"></i> Adm</a>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="navigation">
            <div class="row">
                <ul class="topnav">
                    <li></li>
                    <li><a href="./index.php"><i class="fa fa-home"></i> Início</a></li>
                    <li><a href="./artigos.php"><i class="fa fa-file-text-o"></i> Todos os Artigos</a></li>
                    <li class="icon"><a href="javascript:void(0);" onclick="myFunction()">&#9776;</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="searchfield bg-hed-six">
        <div class="container" style="padding-top: 20px; padding-bottom: 20px;">
            <div class="row text-center margin-bottom-20">
                <h1 class="white"> Base de Conhecimento V2</h1>
                <span class="nested"> Use sempre que precisar, afinal, o saber não ocupa espaço </span>
            </div>
            <br>
            <form method="post" action="./busca.php">
                <div class="row search-row">
                    <input type="text" class="search" placeholder="Precisa de ajuda com o que?" name="texto">
                    <button type="submit" class="buttonsearch btn btn-info btn-lg">Procurar </button>
                </div>
            </form>
        </div>
    </div>