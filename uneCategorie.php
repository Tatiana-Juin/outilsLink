<?php 
    $titre = "Une categorie"; 
    require_once("inc/function.inc.php");

    // POUR LES ERREUR
    $info ="";

    if(isset($_GET['action']) && isset($_GET['idCategorie'])){

        //on verifie que action n'est pas vide et que action et voir et que idCategorie n'est pas vide 
      if(!empty($_GET['action']) && $_GET['action'] =="voir" && !empty($_GET['idCategorie'])){

        // recupere de manière sécuriser id 
        $idCategorie = htmlentities($_GET['idCategorie']);
        $nomCategorie = categorieById($idCategorie);
      }

    }else{
        header("location:categorie.php");
    }

    // FIN PHP POUR EVITER LES BUG
    require_once("inc/header.inc.php");

?>

<main>

    

</main>

<?php 
     require_once("inc/footer.inc.php");
?>