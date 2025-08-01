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
            <a href="<?=RACINE_SITE."ajoutOutil.php"?>" class="link-item">Ajout d'un outil</a>
            <a href="<?=RACINE_SITE."categorie.php" ?>" class="link-item">Categorie </a>
        </div>

        <!-- BARRE DE RECHERCHE  -->
        <div class="search search-bar">
        <!-- POUR L'INSTANT FAIRE APPARAITRE QUE SUR INDEX  -->
            <?php if(str_contains($_SERVER['PHP_SELF'],"index.php")){ ?>
                    <form action="<?=RACINE_SITE?>index.php" method="POST" role="search"> 
                        <input type="search" class="link-search" name="recherche">
                        <input type="submit" value="Recherche" class="btn-search">
                        
                    </form>
            
            <?php } ?>

        </div>

    </nav>   
</header>