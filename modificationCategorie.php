<?php
    $titre = "Modification de la categorie";
    require_once("inc/function.inc.php");
    require_once("inc/header.inc.php");

    $info ="";
?>

<main class="modification_categorie">
    <!-- TITRE DE LA PAGE  -->
    <h1 class="title_page">Modification du nom de la catégorie </h1>

    

    <div class="div_categorie">
        <!-- AJOUT D'UN MESSAGE SI CELA EST UNE ERREUR -->
        <p class="echec"> <?= $info; ?></p> 

        <form action="" method="POST" class="add_categorie">
            <!-- NOM D'UNE CATEGORIE -->
            <label for="nom_categorie" class="label_categorie">Nom categorie</label>
            <input type="text" name="nom_categorie" id="nom_categorie" class="nom_categorie" >  
            <input type="submit" value="Ajouter" id="btn_categorie" class="btn_categorie"> 
        </form>

    </div>
   

 </main>

<?php
    require_once("inc/footer.inc.php");
?>