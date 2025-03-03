# Suppression 

1. Verifie qu'il n'y a pas d'outil 
2. S'il existe des outils il faut afficher et proposer de modifier la categorie 
3. Affiche en bas que s'il existe des outils il seront supprimer au même temps que la categorie 

## reflexion modification suppression
- recupérer id de l'outil 
- creation de la fonction updateCategoryOutil($id_outil,$id_categorie)

## NOTES

````
     <input type="hidden" name="outil[<?= $outil['id_outil'] ?>][id]" value="<?= $outil['id_outil'] ?>">
    <select name="outil[<?= $outil['id_outil'] ?>][categorie]" class="group_categorie">

    name="outil[<?= $outil['id_outil'] ?>][id]"
     name="outil[<?= $outil['id_outil'] ?>][categorie]"

````
Les deux name permet de créer un tableau a 2 dimmension 
````
$_POST['outil'] = [
    1 => [
        'id' => ,
        'categorie' =>  // Nouvelle catégorie sélectionnée pour l'outil 1
    ],
    2 => [
        'id' => ,
        'categorie' =>  // Nouvelle catégorie sélectionnée pour l'outil 2
    ],
    3 => [
        'id' => ,
        'categorie' =>  // Nouvelle catégorie sélectionnée pour l'outil 3
    ]
];
````