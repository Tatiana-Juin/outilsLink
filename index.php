<?php 
    //Attention si on met le $titre apres le header cela creer une erreur 
    $titre = "Accueil";
    require_once "inc/function.inc.php";
    //POUR LE HEADER    
    require_once "inc/header.inc.php";
    $allOutils = allOutil();
    
?>

<main class="affiche_outil ">
        <!-- BOUCLE POUR AFFICHER TOUS LES OUTILS  -->
    <h1 class="title-page">Afficher tous les outils </h1>

    <div class="card_container">

    
            <?php foreach ($allOutils as $key => $allOutil){ ?>
                <div class="card">
                    <p><?= $allOutil['nom_outil'] ?> </p>
                    <a href="<?=$allOutil['url_outil']?>" target="_blank"> Lien de <?= $allOutil['nom_outil'] ?></a>
                    <p><?= $allOutil['nom_categorie'] ?></p>

                </div>

            <?php } ?>
        

    </div>
       
</main>


<?php
    require_once "inc/footer.inc.php";
?>