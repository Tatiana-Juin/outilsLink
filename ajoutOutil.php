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

                $ajout_outil = addOutil($categorie_id,$nom_outil_min,$url_outil);

                header("location:".RACINE_SITE."index.php");
            }



        }
    }

?>

    <main class="ajout_outil">

        <h1 class="title_page">Ajout d'un outil </h1>
        
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

                    <form action="" method="POST" class="add_outil">
                        <p class="echec"> <?= $erreur ?> </p>
                    <!-- NOM D'UN OUTIL -->
                    <label for="nom_outil" class="label_outil">Nom </label>
                    <input type="text" name="nom_outil" id="nom_outil" class="nom_outil ">

                    <!-- url -->
                    <label for="url_outil" class="label_url">url </label>
                    <input type="text" name="url_outil" id="url_outil" class="url_outil">

                    <!-- TOUTE LES CATEGORIE -->
                    <?php 
                        $categories = allCategorie();
                        
                    ?>
                    <label for="categories_select" class="label_categorie">  Categories</label>
                    <select name="categories_select" id="categorie_select">

                        <option value="">-- Choisi une categorie --</option>
                        <?php foreach($categories as $key =>$categorie){ ?>
                            <option value="<?=$categorie['nom_categorie'] ?>"> <?= $categorie['nom_categorie'] ?> </option>
                        <?php } ?>

                    </select>

                    <!-- BTN AJOUT OUTILS -->
                    <input type="submit" value="ajouter" id="btn_outil" class="btn_outil">
                    
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