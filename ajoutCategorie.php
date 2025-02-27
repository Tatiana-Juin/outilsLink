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
               /*
                    AVANT IL FAUT VERIFIER QUE LE NOM DE LA CATEGORIE EXISTE PAS 
                    POUR CELA IL FAUT APPELLER LA FONCTION allCategorie 
                    -FAIRE UNE BOUCLE OU ON VERIFIE QUE LE NOM N'EST PAS EGALE A UN NOM DE CATEGORIE EXISTANT 
                    -SI  BOOLEAN TRUE ALORS ON AFFICHE UN MESSAGE DISANT QUE CETTE CATEGORIE EXISTE SINON BOOLEAN FALSE ET ON APPELLE LA FONCTION 
                    - IL FAUT FORCER A CE QUE L'INSERTION SOIT EN MINUSCULE 
               */

                //Appelle de la fonction
                $resultat = addCategorie($nom_categorie_min);

                 header("location:".RACINE_SITE."categorie.php");
              
           }
        }
    }

?>

 <main class="ajout_categorie">
    <!-- TITRE DE LA PAGE  -->
    <h1 class="title_page">Ajout d'une categorie </h1>

    

    <div class="div_categorie">
        <!-- AJOUT D'UN MESSAGE SI CELA EST UNE ERREUR -->
        <p class="echec"> <?= $info; ?></p> 

        <form action="" method="POST" class="add_categorie">
            <!-- NOM D'UNE CATEGORIE -->
            <label for="nom_categorie" class="label_categorie">Nom categorie</label>
            <input type="text" name="nom_categorie" id="nom_categorie" class="nom_categorie" >  
            <input type="submit" value="Ajouter" id="btn_categorie" class="btn_categorie"> 
        </form>

    </div>
   

 </main>

<?php 
    require_once("inc/footer.inc.php");
?>