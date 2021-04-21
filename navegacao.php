<div class="breadcrumb-container">
    <ol class="breadcrumb">
        <li><a href="./index.php"><i class="fa fa-home"></i></a></li>
        <li><a href="./categoria.php?categoria_id=<?php echo base64_encode($categoria->id);?>"><?php echo $categoria->nome?></a></li>
        <?php 
        if (isset($artigo)){ ?>
        <li class="active"><?php echo $artigo->titulo?></li> <?php }?>
    </ol>
</div>