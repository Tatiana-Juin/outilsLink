<?php 
$titre = "Modification de la categorie";
require_once("inc/function.inc.php");
require_once("inc/header.inc.php");

if(isset($_GET['action']) && isset($_GET['idCategorie'])) {

    if(!empty($_GET['action']) && $_GET['action'] == "delete" && !empty($_GET['idCategorie'])) {
        // Pour afficher le nom de la catégorie
        $idCategorie = htmlentities($_GET['idCategorie']);
        $nomCategorie = categorieById($idCategorie);

        if((int) $idCategorie != $nomCategorie['id_categorie']) {
            header("location:" . RACINE_SITE . "categorie.php");
            exit();
        }

        // Pour afficher les autres catégories et les outils de la catégorie
        $allCategories = allCategorie();
        $outilsCategories = allOutilCategory($idCategorie);

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Modification de la catégorie d'un outil
            if(isset($_POST['outil'])) {
                foreach($_POST['outil'] as $id_outil => $outil_data) {
                    $id_categorie = $outil_data['categorie'];
                    updateCategoryOutil($id_outil, $id_categorie);
                }
                $outilsCategories = allOutilCategory($idCategorie);
            }

            // Suppression de la catégorie
            if(isset($_POST['supprimer_categorie'])) {
                // Compte le nombre d'outils associés à la catégorie
                $countOutilCat = countIdOutilCat($idCategorie);
                
                // Si la catégorie n'a pas d'outils, on peut la supprimer
                if($countOutilCat == 0) {
                    deleteCategorie($idCategorie);
                    header("location:" . RACINE_SITE . "categorie.php");
                    exit();
                } else {
                    // Si la catégorie a des outils, on supprime d'abord les outils, puis la catégorie
                    deleteOutilCat($idCategorie);
                    deleteCategorie($idCategorie);
                    header("location:" . RACINE_SITE . "categorie.php");
                    exit();
                }
            }
        }
    }
}
?>

<main class="suppression-categorie">
    <h1 class="title-page"><?=$nomCategorie['nom_categorie']?></h1>

    <form action="" method="post">
        <!-- Tableau pour afficher les outils -->
        <table>
            <?php foreach($outilsCategories as $outil): ?>
                <tr>
                    <td><?= $outil['nom_outil'] ?></td>
                    <td>
                        <!-- champ caché pour récupérer l'id de l'outil -->
                        <input type="hidden" name="outil[<?= $outil['id_outil'] ?>][id]" value="<?= $outil['id_outil'] ?>">
                        <select name="outil[<?= $outil['id_outil'] ?>][categorie]" class="group-categorie">
                            <!-- boucle pour afficher les catégories et sélectionner celle où on est -->
                            <?php foreach($allCategories as $category): ?>
                                <option value="<?= $category['id_categorie'] ?>" 
                                    <?= ($category['id_categorie'] == $idCategorie) ? 'selected' : '' ?>>
                                    <?= $category['nom_categorie'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td><input type="submit" value="Modifier" class="btn-categorie"></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <p class="echec">Attention, si tu ne changes pas la catégorie de ces outils, ils seront supprimés avec ta catégorie.</p>

        <!-- Bouton pour supprimer la catégorie -->
        <input type="submit" value="Supprimer" name="supprimer_categorie" class="btn-categorie">
    </form>
</main>

<?php 
require_once("inc/footer.inc.php");
?>
