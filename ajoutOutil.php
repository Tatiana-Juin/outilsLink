<?php 
     $titre="Ajout d'un outil";
     require_once("inc/function.inc.php");
     require_once("inc/header.inc.php");


?>

    <main>

        <h1 class="title-page">Ajout d'un outil </h1>
        
        <div class="div-outil">
            
            <!-- AJOUT D'UN MESSAGE ERREUR  -->
            <p class="echec"></p>

             <!-- FORMULAIRE AJOUT OUTILS  -->
            <form action="" method="POST" class="add_outil">

                <!-- NOM D'UN OUTIL -->
                 <label for="nom_outil" class="label_outil">Nom </label>
                 <input type="text" name="nom_outil" id="nom_outil" class="nom_outil">

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

        </div>


    </main>

<?php 
    require_once("inc/footer.inc.php");
?>