<?php
    $titre="Ajout d'une categorie";
    require_once("inc/function.inc.php");
    require_once("inc/header.inc.php");

    $info = "";

    //SI $_POST N'EST PAS VALIDE 
    if(!empty($_POST)){
        //on verifie que les champs sont rempli
        $verif = true; 
        foreach($_POST as $cle => $valeur){
            if(empty(trim($valeur))){
                $verif = false;
            }
        }

        //SI TOUS N'EST PAS REMPLI 
        if(!$verif){
            $info = "Veuillez remplir tous les champs";
        }
        //SINON TOUS EST REMPLI
        else{
           $nom_categorie = trim($_POST['nom_categorie']);

            // SI IL A UNE ERREUR DANS LES CHAMPS 
           if(!isset($nom_categorie) || strlen($nom_categorie) < 2 ||  preg_match('/[0-9]+/',$nom_categorie)){

                $info = "Les champs ne sont pas valide";
           }
           
           // S'IL N'Y A PAS D'ERREUR 
           if(empty($info)){
                $nom_categorie = htmlentities($nom_categorie);
                $nom_categorie_min = strtolower($nom_categorie);
              
                // POUR EVITER D'INSERER LA MEME CATEGORIE DEUX FOIS 

               $allCategories = allCategorie();
               $categorieExisteDeja = false;
                // Boucle qui permet d'itterer pour comparer le nom de chaque categorie avec celui de la bdd 
               foreach($allCategories as $key => $allCategorie){
                    if($allCategorie['nom_categorie'] === $nom_categorie_min){
                        $info="La categorie existe déjà";
                        $categorieExisteDeja = true;
                        break;
                    }else{
                       $categorieExisteDeja = false;
                    }
               }

                //Si la categorie n'existe pas alors on appelle la fonction et on redirige vers la page categorie 
                if($categorieExisteDeja === false){
                    $resultat = addCategorie($nom_categorie_min);
                    header("location:".RACINE_SITE."categorie.php");
                }
                
           }
        }
    }

?>

 <main class="ajout-categorie">
    <!-- TITRE DE LA PAGE  -->
    <h1 class="title-page">Ajout d'une categorie </h1>

    

    <div class="div-categorie">
        <!-- AJOUT D'UN MESSAGE SI CELA EST UNE ERREUR -->
        <p class="echec"> <?= $info; ?></p> 

        <form action="" method="POST" class="add_categorie">
            <!-- NOM D'UNE CATEGORIE -->
            <label for="nom_categorie" class="label_categorie">Nom categorie</label>
            <input type="text" name="nom_categorie"  class="nom-categorie" >  
            <input type="submit" value="Ajouter"  class="btn-categorie"> 
        </form>

    </div>
   

 </main>

<?php 
    require_once("inc/footer.inc.php");
?>