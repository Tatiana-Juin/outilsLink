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

<main class="une_categorie">

    <h1 class="title_page"> <?= $nomCategorie['nom_categorie'] ?> </h1>

</main>

<?php 
     require_once("inc/footer.inc.php");
?>