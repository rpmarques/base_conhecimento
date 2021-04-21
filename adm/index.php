<?php include_once './cabecalho.php'; ?>
<div class="col-md-10">
    <?php
    // PEGA O NOME DO ARQUIVO, 
    $pagina = explode("/", $_SERVER['REQUEST_URI']);
    $pagina = end($pagina);
    if ($pagina==='index.php' && (empty($_POST['procurar']))){
    //TRAZ OS 10 ARTIGOS MAIS CLICADOS
        echo '<h4 class="">10 artigos mais acessados </h4>';
        $artigos = $objArtigos->select(" ORDER BY clicks DESC LIMIT 10 ");
        if (!empty($artigos)) {
            foreach ($artigos as $itemArtigo) {
                echo '<div class="card">'
                . '<div class="card-body">'
                . '<a href="./index.php?artigo_id=' . base64_encode($itemArtigo->id) . '"><h4 class="">' . $itemArtigo->titulo . '</h4></a>'

                . '<p class=" p-y-1">' . $itemArtigo->descricao. '</p>'
                . '</div>'
                . '</div><br>';
            }
        }
    }
    ?>
</div>
<?php include_once './rodape.php'; ?>