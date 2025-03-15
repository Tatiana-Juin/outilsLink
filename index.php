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

<main class="affiche-outil ">
        <!-- BOUCLE POUR AFFICHER TOUS LES OUTILS  -->
    <h1 class="title-page">Afficher tous les outils </h1>

    <div class="card-container">

            <?php if(!empty($allOutils)){ 
                // POUR AFFICHER LE BOUTON RETOUR QUI REVIENS EN ARRIERE SANS LA RECHERCHE 
                if($motExiste ===true){ ?>
                     <a href="<?=RACINE_SITE ?>index.php">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                <?php
                }
        
                 foreach ($allOutils as $key => $allOutil){ ?>
                    <div class="card">
                        <!-- POUR LE NOM DE L'OUTIL -->

                        <a href="<?=$allOutil['url_outil']?>" target="_blank" class="affiche-btn-outil">  
                            <p class="affiche-nom-outil"><?= $allOutil['nom_outil'] ?> </p>
                        </a>

                        <div class="categorie-element">
                            <p class="affiche-categorie"><?= $allOutil['nom_categorie'] ?></p>

                            <!-- ICON POUR FAIRE APPARAITRE UN MENU data-index permet de mettre des info supplementaire qui permet de ne pas changer le style de l'icon -->
                            <i class="bi bi-three-dots-vertical" data-index="<?= $key ?>"></i>

                            <!-- menu qui apparait lors du clique  -->
                            <div class="menu-hiden-card " id="menu-<?=$key?>">
                                <a href="<?=RACINE_SITE?>modificationOutil.php?action=update&idOutil=<?= $allOutil['id_outil']; ?>" class="item-card">Modifier</a>
                                

                                <a href="" class="item-card" id="btn-link-delete">Supprimer</a>

                            </div>
                             
                        </div>
                        <!-- POP UP SUPPRESSION -->
                        <div class="confirmation-box">
                                
                                <div class="confirmation-delete">
                                    <p> Es-tu sur de vouloir supprimer cette outil ? </p>
                                    <form action="suppressionOutil.php" class="form-delete" method="POST">
                                        <input type="hidden"  name="id_outil" class="id_outil" value="<?=$allOutil['id_outil'] ?>">
                                        <button class="btn-oui-delete">Oui</button>
                                        <button class="btn-non-delete">Non</button>
                                    </form>
                                    
                                </div>
                            </div>

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