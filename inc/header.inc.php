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
    
    <title><?= $titre ?></title>
</head>
<body>
    
<header >
    
    <!-- POUR LE MENU HAMBURGER  -->
    <div class="hamburger">
        <i class="bi bi-list hiden"></i>
    </div>
    

    <nav>

        <!-- LOGO QUI MENE VERS TOUS LES OUTILS   -->
        <div class="logo">
            <a href="" class="link-logo">outilsLink</a>
        </div>

        <!-- TOUS LES LIEN SAUF BARRE DE RCHERCHE  -->
        <div class="links">
            <a href="#" class="link-item">Ajout d'un outil</a>
            <a href="#" class="link-item">Ajout d'une categorie </a>
        </div>

        <!-- BARRE DE RECHERCHE  -->
        <div class="search">
            <form action="" method="POST">
                <input type="text" class="link-search">
                <input type="submit" value="Recherche" class="btn-search">
            </form>
        </div>

    </nav>   
</header>