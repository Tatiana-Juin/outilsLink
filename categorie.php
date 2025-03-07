<?php
    $titre = "Voir toutes les categories";
    require_once("inc/function.inc.php");
    require_once("inc/header.inc.php");

    // APPELLE DE LA FONCTION allCategorie() pour afficher toutes les categories 
    $allCategories = allCategorie();

?>

<main class="container-categorie">
    <!-- titre de la page  -->
    <h1 class="title-page">Categories</h1>

    <div class="div-icon-categorie">
    <!-- bouton pour aller a ajouter une categorie  -->
        <a href="<?=RACINE_SITE."ajoutCategorie.php"?>" class="link-icon-categorie">
            <i class="bi bi-plus-circle-fill"></i>
        </a>
      
    </div>

    <!-- POUR AFFICHER TOUTES LES CATEGORIES  -->
    <div class="div-all-categories">

        <?php foreach($allCategories as $key => $allCategorie){ ?>

            <a href="<?=RACINE_SITE?>uneCategorie.php?action=voir&idCategorie=<?=$allCategorie['id_categorie']?>" class="link-categorie"><?=$allCategorie["nom_categorie"]?></a>

        <?php } ?>

    </div>



</main>


<?php
    require_once("inc/footer.inc.php");
?>