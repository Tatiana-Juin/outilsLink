<?php
    $titre="Ajout d'une categorie";
    require_once("inc/function.inc.php");
    require_once("inc/header.inc.php");
?>

 <main>
    <!-- TITRE DE LA PAGE  -->
    <h1 class="title-page">Ajout d'une categorie </h1>

    <div class="div-Categorie">

        <!-- AJOUT D'UN MESSAGE SI CELA EST UN -->
        <p class="echec"></p>

        <form action="" method="POST" class="add_categorie">
            <!-- NOM D'UNE CATEGORIE -->
            <label for="nom_categorie" class="label_categorie">Nom categorie</label>
            <input type="text" name="input_categorie" id="input_categorie" class="input_categorie" >  
            <input type="submit" value="Ajouter" id="btn_categorie" class="btn_categorie"> 
        </form>

    </div>
   

 </main>

<?php 
    require_once("inc/footer.inc.php");
?>