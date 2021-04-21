<div class="col-md-4 padding-20">               
    <div class="row margin-top-20">
        <div class="col-md-12">
            <div class="fb-heading-small">
                Mais Acessados
            </div>
            <hr class="style-three">
            <div class="fat-content-small padding-left-10">
                <ul>
                    <?php
                       $artigos = $objArtigos->select(" ORDER BY clicks DESC LIMIT 5"); //5 MAIS ACESSADOS
                       foreach ($artigos as $artigoItem) {
                           echo "<li><a href='./artigo.php?artigo_id=". base64_encode($artigoItem->id)."'><i class='fa fa-file-text-o'></i>".substr($artigoItem->titulo,0,40)." ..."."</a></li>";
                       }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="row margin-top-20">
        <div class="col-md-12">
            <div class="fb-heading-small">
                Ultimos Cadastrados
            </div>
            <hr class="style-three">
            <div class="fat-content-small padding-left-10">
                <ul>
                    <?php
                       $artigos = $objArtigos->select(" ORDER BY id DESC LIMIT 5"); //5 MAIS ACESSADOS
                       foreach ($artigos as $artigoItem) {
                           echo "<li><a href='./artigo.php?artigo_id=". base64_encode($artigoItem->id)."'><i class='fa fa-file-text-o'></i>".substr($artigoItem->titulo,0,40)." ..."."</a></li>";
                       }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>