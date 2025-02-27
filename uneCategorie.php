<?php 
    $titre = "Une categorie"; 
    require_once("inc/function.inc.php");

    if(isset($_GET['action']) && isset($_GET['idCategorie'])){

        //on verifie que action n'est pas vide et que action et voir et que idCategorie n'est pas vide 
      if(!empty($_GET['action']) && $_GET['action'] =="voir" && !empty($_GET['idCategorie'])){

        // recupere de manière sécuriser id 
        $idCategorie = htmlentities($_GET['idCategorie']);
        // Appelle de la fonction pour récuperer le nom par rapport a id de la categorie 
        $nomCategorie = categorieById($idCategorie);

        // Appelle de la fonction pour afficher tous les outils par rapport a id de la categorie 
        $outilsCategorie = allOutilCategory($idCategorie);
      }

    }else{
        header("location:categorie.php");
    }

    // FIN PHP POUR EVITER LES BUG
    require_once("inc/header.inc.php");

?>

<main class="une_categorie">

    <h1 class="title_page"> <?= $nomCategorie['nom_categorie'] ?> </h1>

   <div class="all_outils_categorie">

        <?php if(!empty($outilsCategorie)){

            foreach($outilsCategorie as $key => $outil){ ?>

            <div class="card">

                <a href="<?=$outil['url_outil']?>" target="_blank" class="affiche_btn_outil">
                    <p class="affiche_nom_outil"><?=$outil['nom_outil']?></p>
                </a>

            </div>

        <?php 
            
            }
        }else{ ?>
            <p>il n'y a acun outil dans cette categorie </p>
       <?php }?>

   </div>

</main>

<?php 
     require_once("inc/footer.inc.php");
?>