<?php 
    //Attention si on met le $titre apres le header cela creer une erreur 
    $titre = "Accueil";
    require_once "inc/function.inc.php";
    //POUR LE HEADER    
    require_once "inc/header.inc.php";
    $allOutils = allOutil();
    
?>

<main>
    
    <?php foreach ($allOutils as $key => $allOutil){ ?>
        <p><?= $allOutil['nom_outil'] ?> </p>
        <a href="<?=$allOutil['url_outil']?>" target="_blank"> Lien de <?= $allOutil['nom_outil'] ?></a>
        <p><?= $allOutil['nom_categorie'] ?></p>

    <?php } ?>

</main>


<?php
    require_once "inc/footer.inc.php";
?>