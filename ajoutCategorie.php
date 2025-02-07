<?php
    $titre="Ajout d'une categorie";
    require_once("inc/function.inc.php");
    require_once("inc/header.inc.php");
?>

 <main>
    <!-- TITRE DE LA PAGE  -->
    <h1 class="title-page">Ajout d'une categorie </h1>

    <div class="divCategorie">

        <!-- AJOUT D'UN MESSAGE SI CELA EST UN -->
        <p class="ajout-success"></p>

        <form action="" method="POST">
            <label for="nom_categorie">Nom categorie</label>
            <input type="text" name="nom_categorie" id="nom_categorie" class="nom_categorie">  
            <input type="submit" value="Ajouter" id="btn_categorie" class="btn_categorie"> 
        </form>

    </div>
   

 </main>

<?php 
    require_once("inc/footer.inc.php");
?>