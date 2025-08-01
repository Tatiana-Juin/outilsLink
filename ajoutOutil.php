<?php 
     $titre="Ajout d'un outil";
     require_once("inc/function.inc.php");
     require_once("inc/header.inc.php");
    
    
    $erreur = "";
    if(!empty($_POST)){
        $verif = true; 

        foreach($_POST as $cle => $valeur){
            if(empty(trim($valeur))){
                $verif = false;
            }
        }

        if(!$verif){
            $erreur = "Veuillez remplir tous les champs";
            
            //tous est rempli
        }else{

            $nom_outil = trim($_POST['nom_outil']);
            $url_outil = trim($_POST['url_outil']);
            $categorie = trim($_POST['categories_select']);

            //nom outil 
            if(!isset($nom_outil) || strlen($nom_outil) < 2 && strlen($nom_outil) > 255 ){
                $erreur += "Le nom n'est pas valide ";
            }

            if(!isset($url_outil) || strlen($url_outil) < 2 && strlen($url_outil) > 255 ){
                $erreur += "L'url  n'est pas valide ";
            }

            if(empty($erreur)){
                $nom_outil = htmlentities($nom_outil);
                $nom_outil_min = strtolower($nom_outil);
                $url_outil = htmlentities($url_outil);
                $categorie = htmlentities($categorie);

                $idCategorie = showCategorieName($categorie);
                $categorie_id = $idCategorie['id_categorie'];

                // VERIFICATION QUE URL ET LE NOM DE L'OUTIL N'EXISTE PAS DEJA 
                $allOutils = allOutil(); 
                $outilExisteDeja = false; 
                foreach($allOutils as $key => $allOutil){
                //  si le nom existe  
                    if($allOutil['nom_outil'] == $nom_outil_min){
                        
                        $outilExisteDeja = true;
                        // si l'url et le nom existe 
                        if($allOutil['url_outil'] ==$url_outil){
                            $erreur.="L'url et le nom  existe déjà";
                            $outilExisteDeja = true;
                        }else{
                            // message si il a que le nom qui existe 
                            $erreur .= "Le nom de l'outil existe déjà .";
                        }
                        break;
                    }else{
                        // si url existe deja 
                        if($allOutil['url_outil'] ==$url_outil){
                            $erreur.="L'url  de l'outil existe déjà ";
                            $outilExisteDeja = true;
                            break;
                        }
                            
                        
                    }
                }
                if($outilExisteDeja ===false){
                    $ajout_outil = addOutil($categorie_id,$nom_outil_min,$url_outil);

                    header("location:".RACINE_SITE."index.php");
                }
              
            }



        }
    }

?>

    <main class="ajout-outil">

        <h1 class="title-page">Ajout d'un outil </h1>
        
        <div class="div-outil">

            <!-- ON VERIFIE SI IL EXISTE DES CATEGORIE . SI LE NB EST 0 ALORS ON OBLIGE L'UTILISATEUR  A SAISIR UNE CATEGORIE  -->
            <?php 
                    $countIdsCategories = countIdCategorie(); 
                    foreach($countIdsCategories as $key => $countIdCategorie){
                        if($countIdCategorie == 0){
                            $info = "Pour ajouter un outil il faut d'abord avoir au moins  une categorie";
            ?>
            
                    <!-- AJOUT D'UN MESSAGE ERREUR  -->
                    <p class="echec"> <?= $info ?></p>
                    <a href="<?=RACINE_SITE."ajoutCategorie.php" ?>">Ajouter une categorie</a>

                

            <!-- SINON IL EXISTE DEJA UNE OU PLUSIEURS CATEGORIE  -->
            <?php  }else{ ?>

                    <form action="" method="POST" class="add-outil">
                        <p class="echec"> <?= $erreur ?> </p>
                    <!-- NOM D'UN OUTIL -->
                    <label for="nom_outil" class="label-outil">Nom </label>
                    <input type="text" name="nom_outil"  class="nom-outil ">

                    <!-- url -->
                    <label for="url_outil" class="label-url">url </label>
                    <input type="text" name="url_outil"  class="url-outil">

                    <!-- TOUTE LES CATEGORIE -->
                    <?php 
                        $categories = allCategorie();
                        
                    ?>
                    <label for="categories_select" class="label-categorie">  Categories</label>
                    <select name="categories_select" class="categorie-select">

                        <option value="">-- Choisi une categorie --</option>
                        <?php foreach($categories as $key =>$categorie){ ?>
                            <option value="<?=$categorie['nom_categorie'] ?>"> <?= $categorie['nom_categorie'] ?> </option>
                        <?php } ?>

                    </select>

                    <!-- BTN AJOUT OUTILS -->
                    <input type="submit" value="ajouter"  class="btn-outil">
                    
                </form>
                            
            <?php       }
            }
        ?>

             <!-- FORMULAIRE AJOUT OUTILS  -->
            

        </div>


    </main>

<?php 
    require_once("inc/footer.inc.php");
?>