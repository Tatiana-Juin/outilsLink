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

        // Si l'utilisateur change la valeur de l'id et qu'il n'existe pas 
        if((int) $idCategorie != $nomCategorie['id_categorie']){
            header("location:".RACINE_SITE."categorie.php");
        }

        // Appelle de la fonction pour afficher tous les outils par rapport a id de la categorie 
        $outilsCategorie = allOutilCategory($idCategorie);
      }

    }else{
        header("location:categorie.php");
    }

    // FIN PHP POUR EVITER LES BUG
    require_once("inc/header.inc.php");

?>

<main class="une-categorie">
    <!-- NOM DE LA PAGE   -->
    <h1 class="title-page"> <?= $nomCategorie['nom_categorie'] ?> </h1>

    <!-- POUR LA MODIFICATION ET SUPRESSION DE CATEGORIE  -->
    <div class="container-modif-categorie">

        <!-- <div class="modif_supression_cat"> -->
             <!-- modification -->
           
               
                <a href="<?=RACINE_SITE?>modificationCategorie.php?action=update&idCategorie=<?=$nomCategorie['id_categorie']?>" class="modif-item-categorie"> 
                    <i class="bi bi-pencil-fill"></i>
                </a>

            

            <!-- supression -->
            <a href="<?=RACINE_SITE?>supprimerCategorie.php?action=delete&idCategorie=<?=$nomCategorie['id_categorie']?>" class="modif-item-categorie">
                <i class="bi bi-trash-fill"></i>
            </a>
            
        <!-- </div> -->
        
        
    </div>
    <hr>

    <!-- POUR AFFICHER TOUT LES OUTILS D'UNE CATEGORIE  -->
   <div class="all-outils-categorie">

        <?php if(!empty($outilsCategorie)){

            foreach($outilsCategorie as $key => $outil){ ?>

            <div class="card">

                <a href="<?=$outil['url_outil']?>" target="_blank" class="affiche-btn-outil">
                    <p class="affiche-nom-outil"><?=$outil['nom_outil']?></p>
                </a>

            </div>

        <?php 
            
            }
        }else{ ?>
        <!-- s'il n'y a aucun outil dans la categorie  -->
            <p class="echec">Il n'y a aucun outil dans cette categorie </p>
       <?php }?>

   </div>

</main>

<?php 
     require_once("inc/footer.inc.php");
?>