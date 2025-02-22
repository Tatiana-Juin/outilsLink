<?php 
    //Attention si on met le $titre apres le header cela creer une erreur 
    $titre = "Accueil";
    require_once "inc/function.inc.php";
    //POUR LE HEADER    
    require_once "inc/header.inc.php";
    // APPELLE DE LA FONCTION allOutil() POUR AFFICHER TOUS LES OUTILS 
    $allOutils = allOutil();
    // INITIALISATION MOT EXISTE QUI PERMET D'AFFICHER LE BOUTON RETOUR
    $motExiste = false;

    $info ="";
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
        // SI LE MOTS EXISTE PAS 
        else{

            $motExiste = false;
            $info ="Le mot saisie est introuvable";
        }

    }
    
?>

<main class="affiche_outil ">
        <!-- BOUCLE POUR AFFICHER TOUS LES OUTILS  -->
    <h1 class="title-page">Afficher tous les outils </h1>

    <div class="card_container">

            <?php if(!empty($allOutils)){ 
                // POUR AFFICHER LE BOUTON RETOUR QUI REVIENS EN ARRIERE SANS LA RECHERCHE 
                if($motExiste ===true){ ?>
                     <a href="<?=RACINE_SITE ?>index.php">retour</a>
                <?php
                }
                // POUR AFFICHER LE MESSAGE ERREUR IL SUFFIT DE FAIRE UN ELSE ET DEMETTRE UN PARAGRAPHE EN APPELLANT $INFO PAR CONTRE IL FAUT REFAIRE LE STYLE CAR CELA S'AFFICHE A COTER ET NON EN DESSOUS JE PENSE QU'IL FAUT AJOUTER UNE DIV 
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