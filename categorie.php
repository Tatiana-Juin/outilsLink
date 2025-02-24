<?php
    $titre = "Voir toutes les categories";
    require_once("inc/function.inc.php");
    require_once("inc/header.inc.php");

?>

<main class="container_categorie">
    
    <h1 class="title_page">Categories</h1>

    <div class="div_icon_categorie">
        
        <a href="<?=RACINE_SITE."ajoutCategorie.php"?>" class="link_icon_categorie">
            <i class="bi bi-plus-circle-fill"></i>
        </a>
      
    </div>



</main>


<?php
    require_once("inc/footer.inc.php");
?>