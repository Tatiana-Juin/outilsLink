<?php 
    $titre = "Modification de la categorie";
    require_once("inc/function.inc.php");
    require_once("inc/header.inc.php");

    // POUR VOIR TOUS LES OUTILS DE LA SUPPRESSION  
    if(isset($_GET) && isset($_GET['action']) && isset($_GET['idCategorie'])){

        if(!empty($_GET['action']) && $_GET['action'] =="delete" && !empty($_GET['idCategorie'])){
            // POUR AFFICHER LE NOM DES CATEGORIE 
            $idCategorie = htmlentities($_GET['idCategorie']);
            $nomCategorie = categorieById($idCategorie);

            if((int) $idCategorie != $nomCategorie['id_categorie']){
                header("location:".RACINE_SITE."categorie.php");
            }
            // Pour afficher le nom des categories 
            $allCategories = allCategorie();

            // Pour afficher les outils de la categorie 
            $outilsCategories = allOutilCategory($idCategorie);

           

        }
    }

    // POUR LA MODIFICATION D'UNE CATEGORIE 
    if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['outil'])){
        foreach($_POST['outil'] as $id_outil =>$outil_data){
            $id_categorie = $outil_data['categorie'];
            updateCategoryOutil($id_outil,$id_categorie);
           
        }
        // Pour que la page s'affiche avec la modification apporté 
        $outilsCategories = allOutilCategory($idCategorie);
    }
?>

<main class="suppression_categorie">

    <h1 class="title_page"><?=$nomCategorie['nom_categorie']?> </h1>

    <form action="" method="post">
        <!-- Tableau pour afficher les outils -->
        <table>
            <?php foreach($outilsCategories as $outil){?>
                <tr>
                    <td><?= $outil['nom_outil'] ?></td>
                    <td>
                        <!-- champs cacher pour récuperer l'id de l'outil -->
                        <input type="hidden" name="outil[<?= $outil['id_outil'] ?>][id]" value="<?= $outil['id_outil'] ?>">
                        <select name="outil[<?= $outil['id_outil'] ?>][categorie]" class="group_categorie">
                            <!-- boucle pour afficher les categories et on seelctionne celle ou on est grace a la condition ternaire -->
                            <?php foreach($allCategories as $category){ ?>
                                <option value="<?= $category['id_categorie'] ?>" 
                                    <?= ($category['id_categorie'] == $idCategorie) ? 'selected' : '' ?>>
                                    <?= $category['nom_categorie'] ?>
                                </option>
                            <?php }  ?>
                        </select>
                    </td>
                    <td><input type="submit" value="Modifier" class="btn_categorie" name="supprimer_categorie"></td>
                </tr>
            <?php }  ?>
        </table>

        <p class="echec">Attention si tu ne change pas la categorie de ces outils il seront supprimer avec ta categorie </p>

        <input type="submit" value="Supprimer"  class="btn_categorie"> 

    </form>
</main>
<?php 
    require_once("inc/footer.inc.php");
?>