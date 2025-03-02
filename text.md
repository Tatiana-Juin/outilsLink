<form action="" method="post">
        <!-- Tableau pour afficher les outils -->
        <table>
            <?php foreach($outilsCategories as $outil): ?>
                <tr>
                    <td><?= $outil['nom_outil'] ?></td>
                    <td>
                        <select name="category_<?=$outil['nom_outil']?>" class="group_categorie">
                            <?php foreach($allCategories as $category): ?>
                                <option value="<?= $category['id_categorie'] ?>" 
                                    <?= ($category['id_categorie'] == $idCategorie) ? 'selected' : '' ?>>
                                    <?= $category['nom_categorie'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td><input type="submit" value="Modifier" class="btn_categorie"></td>
                </tr>
            <?php endforeach; ?>
        </table>