<?php
    $titre = "Voir toutes les categories";
    require_once("inc/function.inc.php");
    require_once("inc/header.inc.php");

    // APPELLE DE LA FONCTION allCategorie() pour afficher toutes les categories 
    $allCategories = allCategorie();

?>

<main class="container_categorie">
    <!-- titre de la page  -->
    <h1 class="title_page">Categories</h1>

    <div class="div_icon_categorie">
    <!-- bouton pour aller a ajouter une categorie  -->
        <a href="<?=RACINE_SITE."ajoutCategorie.php"?>" class="link_icon_categorie">
            <i class="bi bi-plus-circle-fill"></i>
        </a>
      
    </div>

    <!-- POUR AFFICHER TOUTES LES CATEGORIES  -->
    <div class="div_all_categories">

        <?php foreach($allCategories as $key => $allCategorie){ ?>

            <a href="#" class="link_categorie"><?=$allCategorie["nom_categorie"]?></a>

        <?php } ?>

    </div>



</main>


<?php
    require_once("inc/footer.inc.php");
?>