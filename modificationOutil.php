<?php
    $titre = "Modification des informations de l'outil";
    require_once("inc/function.inc.php");
    require_once("inc/header.inc.php");

    // VERIFICATION POUR RECUPERER LES INFORMATION DE L'OUTIL
    if(isset($_GET) && isset($_GET['action']) && isset($_GET['idOutil'])){
        
        // si l'outil n'est pas vide et que action est egale a update
        if(!empty($_GET['action']) && $_GET['action'] =="update" && !empty($_GET['idOutil'])){

            $idOutil = htmlentities($_GET['idOutil']);
            $informationOutil = outilById($idOutil);

            // si l'utilisateur essaie de saisir un id qui n'existe pas 
            if( (int) $idOutil != $informationOutil['id_outil']){
                header("location:".RACINE_SITE."index.php");
            }
              // Pour afficher toutes les catégories 
            $allCategories = allCategorie();


        }
        else{
            header("location:".RACINE_SITE."index.php");
        }

    }
    else{
        header("location:".RACINE_SITE."index.php");
    }

    // MODIFICATION DES INFORMATION
    $erreur="";

    // VERIFIE  QUE TOUS LES CHAMPS SONT REMPLI
    if(!empty($_POST)){
        $verif = true;
        foreach($_POST as $key => $value){
            if(empty($value)){
                $verif = false;
            }
        }

        // TOUS LES CHAMPS NE SONT PAS REMPLI
        if(!$verif){
            $erreur .="Veuillez remplir tous les champs"; 
        }
        else{
            // TOUS LES CHAMPS SONT REMPLI
            $nom_outil = trim($_POST['nom_outil']);
            $url_outil = trim($_POST['url_outil']);
            $categorie_id = trim($_POST['categories_select']);

            //nom outil 
            if(!isset($nom_outil) || strlen($nom_outil) < 2 && strlen($nom_outil) > 255 ){
                $erreur += "Le nom n'est pas valide ";
            }

            // URL 
            if(!isset($url_outil) || strlen($url_outil) < 2 && strlen($url_outil) > 255 ){
                $erreur += "L'url  n'est pas valide ";
            }

            // S'IL N'Y A PAS DE MESSAGE D'ERREUR
            if(empty($erreur)){
                $nom_outil = htmlentities($nom_outil);
                $nom_outil_min = strtolower($nom_outil);
                $url_outil = htmlentities($url_outil);
                $categorie_id = htmlentities($categorie_id);

                $allOutils = allOutil(); 
 
                if( isset($_GET['action']) && $_GET['action'] =="update" && isset($_GET['idOutil']) && !empty($_GET['idOutil']) ){

                    $idOutil = htmlentities($_GET['idOutil']);
                    updateOutil($idOutil,$categorie_id,$nom_outil,$url_outil);

                    header("location:".RACINE_SITE."index.php");
                   
                }

            }


        }
    }
?>

    <main class="modification-outil">
        <!-- titre de la page -->
        <h1 class="title-page">Modification de <?= $informationOutil['nom_outil']?></h1>
        
        <!-- div contenant le formulaire -->
        <div class="div-outil">

            <form action="" method="post" class="add-outil">
                <p class="echec"><?= $erreur ?></p>
                
                <!-- NOM D'UN OUTIL -->
                <label for="nom_outil" class="label-outil">Nom </label>
                <input type="text" name="nom_outil"  class="nom-outil " value="<?=$informationOutil['nom_outil']?>">

                <!-- url -->
                <label for="url_outil" class="label-url">url </label>
                <input type="text" name="url_outil"  class="url-outil" value="<?=$informationOutil['url_outil']?>">

                <!-- boucle pour afficher les categories -->
                <select name="categories_select" class="categorie-select">
                    <?php foreach($allCategories as $category): ?>
                        <option value="<?= $category['id_categorie'] ?>" 
                                    <?= ($category['id_categorie'] == $informationOutil['id_categorie']) ? 'selected' : '' ?>>
                                    <?= $category['nom_categorie'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
               


                <input type="submit" value="Modifier"  class="btn-outil">
            </form>
        </div>


    </main>

<?php
    require_once("inc/footer.inc.php");
?>