<?php
    $titre = "Modification des informations de l'outil";
    require_once("inc/function.inc.php");
    require_once("inc/header.inc.php");
?>

    <main class="modification-outil">
        <!-- titre de la page -->
        <h1 class="title-page">Modification de l'outil</h1>
        
        <!-- div contenant le formulaire -->
        <div class="div-outil">

            <form action="" method="post" class="add-outil">
                <p class="echec"></p>
                
                <!-- NOM D'UN OUTIL -->
                <label for="nom_outil" class="label-outil">Nom </label>
                <input type="text" name="nom_outil"  class="nom-outil ">

                <!-- url -->
                <label for="url_outil" class="label-url">url </label>
                <input type="text" name="url_outil"  class="url-outil">

                <!-- Categorie  -->
                <label for="categories_select" class="label-categorie">  Categories</label>
                <select name="categories_select" class="categorie-select">
                    <option value="">-- Modifier une categorie --</option>
                    <option value=""> t </option>
                </select>

                <input type="submit" value="Modifier"  class="btn-outil">
            </form>
        </div>


    </main>

<?php
    require_once("inc/footer.inc.php");
?>