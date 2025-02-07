<?php 
     $titre="Ajout d'un outil";
     require_once("inc/function.inc.php");
     require_once("inc/header.inc.php");


?>

    <main>

        <h1 class="title-page">Ajout d'un outil </h1>
        
        <div class="div-outil">
            
            <!-- AJOUT D'UN MESSAGE ERREUR  -->
            <p class="echec"></p>

             <!-- FORMULAIRE AJOUT OUTILS  -->
            <form action="" method="POST" class="add_outil">

                <!-- NOM D'UN OUTIL -->
                 <label for="nom_outil" class="label_outil">Nom </label>
                 <input type="text" name="nom_outil" id="nom_outil" class="nom_outil">

                 <!-- url -->
                  <label for="url_outil" class="label_url">url </label>
                  <input type="text" name="url_outil" id="url_outil" class="url_outil">

                  <!-- BTN AJOUT OUTILS -->
                   <input type="submit" value="ajouter" id="btn_outil" class="btn_outil">

            </form>

        </div>


    </main>

<?php 
    require_once("inc/footer.inc.php");
?>