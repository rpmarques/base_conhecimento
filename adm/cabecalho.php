<?php
//DEIXO SOMENTE APARECENDO OS ERROS CRÍTICOS
//error_reporting(E_ERROR|E_PARSE);     
// REPORTA TODOS OS ERROS E AVISOS
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once '../classes/funcoes.class.php';
include_once '../classes/logger.class.php';
include_once '../classes/conexao.class.php';
include_once '../classes/categorias.class.php';
$objCategorias = Categorias::getInstance(Conexao::getInstance());
include_once '../classes/artigos.class.php';
$objArtigos = Artigos::getInstance(Conexao::getInstance());
define("LOGIN", $_SERVER['REMOTE_ADDR']);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Base de Conhecimento - Versão: 1.00</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link rel="stylesheet" href="./css/font-awesome.css" type="text/css">-->
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <link rel="stylesheet" href="./css/estilo.css" type="text/css">
        <link rel="stylesheet" href="./css/select2.min.css" />  
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
        <!-- TiniMCE -->
        <script src="./tinymce/tinymce.min.js"></script>
        <script>tinymce.init({
               selector: 'textarea',
               language: "pt_BR",
               plugins: ['advlist autolink lists link image charmap print preview anchor',
                   'searchreplace visualblocks code fullscreen',
                   'insertdatetime media table contextmenu paste code'],
               toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
           });
        </script>
    </head>

    <body>
        <nav class="navbar navbar-expand-md bg-secondary navbar-dark">
            <a class="navbar-brand" href="./index.php">GenBASE - Base de Conhecimento - V2</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </nav>

        <div class="py-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-body">                    
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item"><a href="#" class="active nav-link"><i class="fa fa-home"></i> Opçoes</a></li>
                                    <li class='nav-item'><a class='nav-link' href='./artigoIncluir.php'> Incluir Artigo</a></li>
                                    <li class='nav-item'><a class='nav-link' href='./artigoListar.php'> Listar Artigo</a></li>
                                    <hr>
                                    <li class='nav-item'><a class='nav-link' href='./categoriaIncluir.php'> Incluir Categoria</a></li>
                                    <li class='nav-item'><a class='nav-link' href='./categoriaListar.php'> Listar Categoria</a></li>                                        
                                </ul>
                            </div>
                        </div>            
                    </div>