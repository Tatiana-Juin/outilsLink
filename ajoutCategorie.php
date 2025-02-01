<?php
    $titre="Ajout d'une categorie";
    require_once("inc/function.inc.php");
    require_once("inc/header.inc.php");
?>

 <main>
    <h1>Ajout d'une categorie </h1>

    <div class="div_categorie">

        <form action="" method="POST">
            <label for="nom_categorie">Nom categorie</label>
            <input type="text" name="nom_categorie" id="nom_categorie" class="nom_categorie">  
            <input type="submit" value="btn_categorie" id="btn_categorie" class="btn_categorie"> 
        </form>

    </div>
   

 </main>

<?php 
    require_once("inc/footer.inc.php");
?>