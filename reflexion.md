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

   <a href="<?=RACINE_SITE?>suppressionOutil.php?action=delete&idOutil=<?=  $allOutil['id_outil']; ?>" class="item-card" id="btn-link-delete">Supprimer</a>
````

## SUPPRESSION

````

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Suppression d'un outil</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <!-- Bouton pour afficher le menu -->
  <button class="bi-three-dots-vertical">...</button>

  <!-- Menu qui apparaît quand on clique sur le bouton -->
  <div class="menu-suppression" style="display:none;">
    <button class="btn-supprimer">Supprimer</button>
  </div>

  <!-- Pop-up de confirmation -->
  <div class="popup" style="display:none;">
    <div class="popup-content">
      <p>Voulez-vous supprimer l'outil ?</p>
      <button id="oui">Oui</button>
      <button id="non">Non</button>
    </div>
  </div>

  <script src="script.js"></script>

</body>
</html>


/* Style du menu */
.menu-suppression {
  position: absolute;
  background-color: white;
  border: 1px solid #ccc;
  padding: 10px;
  display: none;
}

/* Style du pop-up */
.popup {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: none;
  justify-content: center;
  align-items: center;
}

.popup-content {
  background-color: white;
  padding: 20px;
  border-radius: 5px;
}

button {
  padding: 10px;
  margin: 5px;
}

document.querySelector('.bi-three-dots-vertical').addEventListener('click', function() {
  let menu = document.querySelector('.menu-suppression');
  menu.style.display = menu.style.display === 'none' ? 'block' : 'none';
});

document.querySelector('.btn-supprimer').addEventListener('click', function() {
  let popup = document.querySelector('.popup');
  popup.style.display = 'flex';
});

document.querySelector('#non').addEventListener('click', function() {
  let popup = document.querySelector('.popup');
  popup.style.display = 'none';
});

document.querySelector('#oui').addEventListener('click', function() {
  let popup = document.querySelector('.popup');
  popup.style.display = 'none';
  supprimerOutil(); // Appel à la fonction PHP pour supprimer l'outil
});

function supprimerOutil() {
  fetch('supprimer_outil.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: 'action=supprimer' // Paramètre pour la suppression
  })
  .then(response => response.text())
  .then(data => {
    alert(data); // Afficher le message de confirmation après la suppression
  })
  .catch(error => {
    alert('Erreur lors de la suppression');
  });
}


<?php
if (isset($_POST['action']) && $_POST['action'] === 'supprimer') {
    // Connexion à la base de données (modifier les informations de connexion)
    $conn = new mysqli('localhost', 'username', 'password', 'database');

    if ($conn->connect_error) {
        die("Connexion échouée: " . $conn->connect_error);
    }

    // Supposons que l'outil à supprimer a un identifiant unique
    $outilId = 1; // Vous devrez probablement obtenir cette valeur dynamiquement (par exemple via $_GET ou $_POST)
    
    $sql = "DELETE FROM outils WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $outilId);
    
    if ($stmt->execute()) {
        echo "L'outil a été supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'outil.";
    }

    $stmt->close();
    $conn->close();
}
?>

````