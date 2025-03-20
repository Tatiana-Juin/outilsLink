<?php
    $titre = "Suppression d'un outil";
    require_once("inc/function.inc.php");
    require_once("inc/header.inc.php");

    if (isset($_GET['action']) && isset($_GET['idOutil'])) {
     
       if(!empty($_GET['action']) && $_GET['action'] == "delete" && !empty($_GET['idOutil'])){
        // RECUPERE ID DE L'OUTIL
        $idOutil = htmlentities($_GET['idOutil']);

        // RECUPERE LES INFORMATIONS DE L'OUTIL
        $informationOutil = outilById($idOutil);

        
       }
        
        

    
       
    } 
    
?>


<main>
    <!-- titre de la page  -->
    <h1 class="title-page">Suppression de l'outils </h1>

    <!-- mettre le btn suppression dans un form et en plus creer un input de type hidden pour recuperer id  -->
</main>

<?php 
      require_once("inc/footer.inc.php");
      
?>