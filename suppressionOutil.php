<?php
    $titre = "Suppression d'un outil";
    require_once("inc/function.inc.php");
    require_once("inc/header.inc.php");

    if (isset($_GET['action']) && isset($_GET['idOutil']) && is_numeric($_GET['idOutil'])) {
     
       if(!empty($_GET['action']) && $_GET['action'] == "delete" && !empty($_GET['idOutil'])){

            // RECUPERE ID DE L'OUTIL
            $idOutil = (int) htmlentities($_GET['idOutil']);

            // RECUPERE LES INFORMATIONS DE L'OUTIL
            $informationOutil = outilById($idOutil);

            // REDIRECTION SI ID N'EXISTE PAS 
            if( (int) $idOutil != $informationOutil['id_outil'] ){
                header("location:" . RACINE_SITE . "index.php");
                exit();
            }

            // on verifie que c'est un tableau 
            if(is_array($informationOutil)){
                // recupère id 
                $idCategorie = $informationOutil['id_categorie'];
                $informationCategorie = categorieById($idCategorie);

                // POUR LE BOUTON DE SUPPRESSION
                if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['supprimer_outil'])){

                    deleteOutilById($idOutil);
                    header("Location: index.php");
                    exit();
                
                }
            }
            else{
                echo "Outil introuvable";
            }
      
       }
    } 

  
    
?>


<main class="suppression-outil">
    <!-- titre de la page  -->
    <h1 class="title-page">Suppression de l'outils </h1>

   <?php if(isset($informationOutil) && is_array($informationOutil)){ ?>

    <!-- info relative a l'outil  -->
        <p class="info-outil"> Nom : <?=$informationOutil['nom_outil']?></p>
        <p class="info-outil"> Categorie  : <?=$informationCategorie['nom_categorie']?></p>
    
        <!-- POUR LA SUPPRESION - BOUTON ETC  -->
        <form action="" method="POST">
            <input type="hidden" name="<?=$informationOutil['id_outil'] ?>" value="<?= $informationOutil['id_outil']?>">
            <input type="submit" value="Supprimer" name="supprimer_outil" class="btn-outil">
        </form>

    <?php } ?>
    
</main>

<?php 
      require_once("inc/footer.inc.php");
      
?>