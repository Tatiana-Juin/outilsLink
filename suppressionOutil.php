<?php
    $titre = "Suppression d'un outil";
    require_once("inc/function.inc.php");
    require_once("inc/header.inc.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_outil'])) {
        $idOutil = $_POST['id_outil'];
        var_dump($idOutil);
        // deleteOutilById($idOutil);
        // var_dump(deleteOutilById($idOutil));

    
       
    } 
    
?>


<main>
    <h1 class="title-page">Suppression de l'outils </h1>
</main>

<?php 
      require_once("inc/footer.inc.php");
      
?>