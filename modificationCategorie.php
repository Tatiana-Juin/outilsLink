<?php
    $titre = "Modification de la categorie";
    require_once("inc/function.inc.php");
    require_once("inc/header.inc.php");

    // VERIFICATION POUR RECUPERER LES INFORMATION DE LA CATEGORIE 
    if(isset($_GET) && isset($_GET['action']) && isset($_GET['idCategorie'])){
        
        if(!empty($_GET['action']) && $_GET['action'] =="update" && !empty($_GET['idCategorie'])){
            $idCategorie = htmlentities($_GET['idCategorie']);
            $nomCategorie = categorieById($idCategorie);

            // si l'utilisateur essaie de saisir un id qui n'existe pas 
            if((int) $idCategorie != $nomCategorie['id_categorie']){
                header("location:".RACINE_SITE."categorie.php");
            }
        }
    }
    else{
        header("location:".RACINE_SITE."categorie.php");
    }

    // ********* POUR LA MODIFICATION *******
    $erreur ="";

    // VERIFIE QUE TOUS LES CHAMPS SONT REMPLI
    if(!empty($_POST)){
        $verif = true;
        foreach($_POST as $key => $value){
            if(empty(trim($value))){
                $verif = false;
            }
        }
        // TOUS LES CHAMPS NE SONT PAS REMPLI
        if(!$verif){
            $erreur .= "Veuillez inserer le nom d'un categorie";
        }
        else{
            // RECUPERE LE  $_POST
             $nom_categorie = trim($_POST['nom_categorie']);

            //  verification pour le nom de la categorie 
             if(!isset($nom_categorie) || strlen($nom_categorie) < 2 && strlen($nom_categorie) >255){
                $erreur .= "Le nom de la categorie n'est pas valide";
             }

           

            

            if(empty($erreur)){
                // securiser les donnes envoyer
                $nom_categorie = htmlentities($nom_categorie);
                $nom_categorie_min = strtolower($nom_categorie);

                // VERIFICATION QUE LA CATEGORIE N'EXISTE PAS QUAND ON SOUHAITE LA MODIFIER 
                $allCategories = allCategorie();
                $categorieExisteDeja = false;
                // Boucle qui permet d'itterer pour comparer le nom de chaque categorie avec celui de la bdd 
                foreach($allCategories as $key => $allCategorie){
                    if($allCategorie['nom_categorie'] === $nom_categorie_min){
                        $erreur.= "La categorie existe déjà";
                        $categorieExisteDeja = true;
                        break;
                    }else{
                        $categorieExisteDeja = false;
                    }
                }
                // VERIFICATION AVANT LA MODIFICATION
                if(isset($_GET['action']) && $_GET['action']=="update" && isset($_GET['idCategorie']) && !empty($_GET['idCategorie'])){
                    $idCategorie = htmlentities($_GET['idCategorie']);
                    // $nomCategorie = categorieById($idCategorie);
                    updateCategorie($idCategorie,$nom_categorie_min);

                    // header("location".RACINE_SITE."categorie.php");
                    header("location:".RACINE_SITE."categorie.php");
                }
            }
        }
    }
?>

<main class="modification_categorie">
    <!-- TITRE DE LA PAGE  -->
    <h1 class="title_page">Modification du nom de la catégorie </h1>

    

    <div class="div_categorie">
        <!-- AJOUT D'UN MESSAGE SI CELA EST UNE ERREUR -->
        <p class="echec"> <?= $erreur; ?></p> 

        <form action="" method="POST" class="add_categorie">
            <!-- NOM D'UNE CATEGORIE -->
            <label for="nom_categorie" class="label_categorie">Nom categorie</label>
            <input type="text" name="nom_categorie" id="nom_categorie" class="nom_categorie" value="<?=$nomCategorie['nom_categorie']?>" >  
            <input type="submit" value="Ajouter" id="btn_categorie" class="btn_categorie"> 
        </form>

    </div>
   

 </main>

<?php
    require_once("inc/footer.inc.php");
?>