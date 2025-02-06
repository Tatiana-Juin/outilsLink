<?php 
    require_once "function.inc.php";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?=RACINE_SITE."assets/css/nav.css" ?>">
    <link rel="stylesheet" href="<?=RACINE_SITE."assets/css/style.css" ?>">
    
    <title><?= $titre ?></title>
</head>
<body>
    
<header >

    <nav>
        

        <!-- LOGO QUI MENE VERS TOUS LES OUTILS   -->
        <div class="logo ">
            <a href="<?= RACINE_SITE."index.php"?>" class="link-logo">OutilsLink</a>
        </div>

        <!-- POUR LE MENU HAMBURGER  -->
        <div class="hamburger" id="hamburger">
            <i class="bi bi-list "></i>
        </div>

        <!-- TOUS LES LIEN SAUF BARRE DE RCHERCHE  -->
        <div class="links nav-link">
            <a href="#" class="link-item">Ajout d'un outil</a>
            <a href="<?=RACINE_SITE."ajoutCategorie.php" ?>" class="link-item">Ajout d'une categorie </a>
        </div>

        <!-- BARRE DE RECHERCHE  -->
        <div class="search search-bar">
            <form action="" method="POST">
                <input type="text" class="link-search">
                <input type="submit" value="Recherche" class="btn-search">
                
            </form>
        </div>

    </nav>   
</header>