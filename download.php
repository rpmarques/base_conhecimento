<?php
include_once './classes/funcoes.class.php';
include_once './classes/logger.class.php';
include_once './classes/conexao.class.php';
include_once './classes/categorias.class.php';
$objCategorias = Categorias::getInstance(Conexao::getInstance());
include_once './classes/artigos.class.php';
$objArtigos = Artigos::getInstance(Conexao::getInstance());
if ($_GET){
    $artigo = $objArtigos->selectUM(" WHERE id=".base64_decode($_GET['artigo_id']));
    echo 'LOCALIZANDO ARQUIVO ORIGINAL.<br>';
    $wArquivo = $artigo->arquivo;
    echo 'OK, ARQUIVO LOCALIZADO.<br><br>';
    echo 'RECUPERANDO O NOME DO ARQUIVO..<br>';
    $wNomeArquivo = $artigo->nome_original;
    echo 'OK, NOME DO ARQUIVO RECUPELADO..<br>';
    $wDiretorio ='./arquivos/';
    set_time_limit(0); //PARA NÃO DAR PROBLEMA COM CONEXÃO LENTA
    //FAZ COPIA DO NOME QUE SALVOU PARA O NOME QUE VAI FICAR PARA DOWNLOAD
    copy($wDiretorio.$wArquivo, $wDiretorio.$wNomeArquivo);
    //PREPARA PARA FAZER O DOWNLOAD DO ARQUIVO
    if (file_exists($wDiretorio.$wNomeArquivo)){
        escreve("faz o bacalhau");
        // Configuramos os headers que serão enviados para o browser
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename="'.$wNomeArquivo.'"');
        header('Content-Type: application/octet-stream');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($wNomeArquivo));
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Expires: 0');
        // Envia o arquivo para o cliente
        readfile($wNomeArquivo);
    }else{
        escreve("ops, arquivo não encontrado");
    }
    //APAGA O ARQUIVO COM O NOME ORIGINAL
    unlink($wDiretorio.$wNomeArquivo);
}

?>