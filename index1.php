<?php 
    //Attention si on met le $titre apres le header cela creer une erreur 
    $titre = "Accueil";
    require_once "inc/function.inc.php";
    //POUR LE HEADER    
    require_once "inc/header.inc.php";
    // APPELLE DE LA FONCTION allOutil() POUR AFFICHER TOUS LES OUTILS 
    $allOutils = allOutil();

    // POUR LA BARRE DE RECHERCHE 
    if(!empty($_POST)){
        $mot=trim($_POST['recherche']);

        // SECURISER
        $mot = htmlentities($mot);

        // variable pour savoir si le mot existe 
        $motExiste = true;

        $recherche = searchOutil($mot);

        if(!empty($recherche)){
            $allOutils = $recherche;
        }

    }
    
?>

<main class="affiche_outil ">
        <!-- BOUCLE POUR AFFICHER TOUS LES OUTILS  -->
    <h1 class="title-page">Afficher tous les outils </h1>

    <div class="card_container">

            <?php
                if(!empty($allOutils)){
                    foreach ($allOutils as $key => $allOutil){ ?>
                        <div class="card">
                            <!-- POUR LE NOM DE L'OUTIL -->

                            <a href="<?=$allOutil['url_outil']?>" target="_blank" class="affiche_btn_outil">  
                                <p class="affiche_nom_outil"><?= $allOutil['nom_outil'] ?> </p>
                            </a>

                            <!-- NOM DE LA CATEGORIE  -->
                            <p class="affiche_categorie"><?= $allOutil['nom_categorie'] ?></p>

                        </div>

                <?php 
                    } 
                }
                ?>
        

    </div>
       
</main>


<?php
    require_once "inc/footer.inc.php";
?>