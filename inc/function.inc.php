<?php


    //CONNEXION BDD
    define("RACINE_SITE","/outilsLink/");

    define("DBHOST","localhost");
    //UTILISATEUR  BDD
    define("DBUSER","root");
    //PASSWORD BDD
    define("DBPASS","");
    //NOM BDD
    define("DBNAME","outilslink");

    //FUNCTION POUR CONNEXION BDD
    function connexionBdd(){
        $dsn = "mysql:host=".DBHOST.";dbname=".DBNAME.";charset=utf8";
        try {
            $pdo = new PDO($dsn,DBUSER,DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
           

        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $pdo;
    }
    connexionBdd();
    // *********************************FUNCTION POUR LES CATEGORIE ***********************************************


    //FUNCTION POUR AJOUTER UNE CATEGORIE 
    function addCategorie(string $nom_categorie){
        $pdo = connexionBdd();
        $sql = "INSERT INTO categorie (nom_categorie) VALUES (:nom_categorie)";
        $requete = $pdo->prepare($sql);
        $requete->execute(array(
            ':nom_categorie' => $nom_categorie
        ));
    }

    // FONCTION POUR TROUVER UNE CATEGORIE PAR RAPPORT A SON NOM
    function showCategorieName(string $nom_categorie){
        $pdo = connexionBdd();
        $sql = "SELECT id_categorie FROM categorie WHERE nom_categorie = :nom_categorie";
        $requete = $pdo->prepare($sql);
        $requete->execute(array(
            ":nom_categorie" => $nom_categorie
        ));
        $resultat = $requete->fetch();
        return $resultat;
    } 
   
    // FONCTION POUR VOIR TOUS LES NOM DES CATEGORIES 
    function allCategorie(){
        $pdo = connexionBdd();
        $sql =" SELECT id_categorie,nom_categorie FROM categorie";
        $requete =$pdo->query($sql);
        $resultat = $requete->fetchAll();
        return $resultat;
    }

    //FONCTION QUI COMPTE LE NB DE ID 
    function countIdCategorie(){
        $pdo = connexionBdd();
        $sql = "SELECT COUNT(id_categorie) FROM categorie";
        $requete = $pdo->query($sql);
        $resultat = $requete->fetch();
        return $resultat;
       
    }

    // FONCTION QUI PERMET D'AFFICHER UNE CATEGORIE PAR RAPPORT A ID DE LA CATEGORIE 
    function categorieById(int $id_categorie){
        $pdo = connexionBdd();
        $sql = "SELECT id_categorie,nom_categorie FROM categorie WHERE id_categorie = :id_categorie";
        $requete = $pdo->prepare($sql);    
        $requete->execute(array(
            ":id_categorie" =>$id_categorie
        ));
        $resultat = $requete->fetch();
        return $resultat;
    }

    // FONCTION POUR MODIFIER UNE CATEGORIE 
    function updateCategorie($id_categorie,$nom_categorie){
        $pdo = connexionBdd();
        $sql = "UPDATE categorie SET nom_categorie = :nom_categorie WHERE id_categorie = :id_categorie";
        $requete = $pdo->prepare($sql);
        $requete->execute(array(
            ':nom_categorie' => $nom_categorie,
            ':id_categorie' => $id_categorie
        ));
    }

    // FONCTION POUR SUPPRIMER UNE CATEGORIE
    function deleteCategorie(int $id_categorie){
        $pdo = connexionBdd();
        $sql = "DELETE FROM categorie WHERE id_categorie = :id_categorie";
        $requete = $pdo->prepare($sql);
        $requete->execute(array(
            ':id_categorie' => $id_categorie
        ));
    }

    // *********************** POUR LES OUTILS ****************************************

    //FONCTION POUR AJOUTER UN OUTIL 
    function addOutil(int $id_categorie, string $nom_outil,string $url_outil){
        $pdo = connexionBdd();
        $sql = "INSERT INTO outil (id_categorie,nom_outil,url_outil) VALUES (:id_categorie, :nom_outil,:url_outil)";
        $requete = $pdo->prepare($sql);
        $requete->execute(array(
            ':id_categorie' => $id_categorie,
            ':nom_outil' => $nom_outil,
            ':url_outil' => $url_outil
        ));
    }
    
    //FONCTION POUR VOIR TOUS LES OUTILS 
     function allOutil(){
        $pdo = connexionBdd();
        $sql ="SELECT  id_outil,nom_outil,url_outil,nom_categorie FROM outil,categorie WHERE categorie.id_categorie = outil.id_categorie ORDER BY id_outil DESC";
        $requete = $pdo->query($sql);
        $resultat = $requete->fetchAll();
        return $resultat;

     }

    //  FONCTION POUR AFFICHER LES OUTILS PAR RAPPORT A LA CATEGORIE 
     function allOutilCategory(int $id_categorie){
        $pdo = connexionBdd();
        $sql = "SELECT id_outil,nom_outil, url_outil FROM outil WHERE id_categorie = :id_categorie";
        $requete = $pdo->prepare($sql);
        $requete->execute(array(
            ":id_categorie" =>$id_categorie
        ));
        $resultat = $requete->fetchAll();
        return $resultat;
     }

    //  FONCTION POUR LA BARRE DE RECHERCHE 
    function searchOutil(string $outil){
        $pdo = connexionBdd();
        $sql = "SELECT id_outil,nom_outil,url_outil,nom_categorie FROM outil, categorie WHERE categorie.id_categorie = outil.id_categorie AND nom_outil LIKE :motCle";
        $requete = $pdo->prepare($sql);
        $requete->execute(array(
            ':motCle' => "%$outil%"
        ));
        $resultat = $requete->fetchAll();
        return $resultat;
    }

     // FONCTION POUR MODIFIER LA CATEGORIE D'UN OUTIL
     function updateCategoryOutil(int $id_outil, int $id_categorie){
        $pdo = connexionBdd();
        $sql = "UPDATE outil SET id_categorie = :id_categorie WHERE id_outil = :id_outil";
        $requete = $pdo->prepare($sql);
        $requete->execute(array(
            ':id_categorie' => $id_categorie,
            ':id_outil' => $id_outil
        ));
     }
    
      // FONCTION QUI COMPTE LE NB D'OUTILS PAR RAPPORT A UNE CATEGORIE 
     function countIdOutilCat(int $id_categorie){ 
        $pdo = connexionBdd();
        $sql = "SELECT count(id_outil) FROM outil WHERE id_categorie = :id_categorie";
        $requete = $pdo->prepare($sql);
        $requete->execute(array(
            ':id_categorie' => $id_categorie
        ));
        $resultat = $requete->fetch();
        return $resultat;
     }


    //  FONCTION POUR SUPPRIMER LES OUTIL PAR RAPPORT A LA CATEGORIE 
    function deleteOutilCat(int $id_categorie){
        $pdo = connexionBdd();
        $sql = "DELETE FROM outil WHERE id_categorie = :id_categorie";
        $requete = $pdo->prepare($sql);
        $requete->execute(array(
            ':id_categorie' => $id_categorie
        ));
    }

    // FONCTION QUI PERMET D'AFFICHER UN OUTIL PAR RAPPORT A ID DE LA OUTIL 
    function outilById(int $id_outil){
        $pdo = connexionBdd();
        $sql = "SELECT outil.id_outil, outil.id_categorie, outil.nom_outil, outil.url_outil
        FROM outil INNER JOIN categorie ON categorie.id_categorie = outil.id_categorie WHERE outil.id_outil = :id_outil;";
        $requete = $pdo->prepare($sql);
        $requete->execute(array(
            ':id_outil' => $id_outil
        ));
        $resultat = $requete->fetch();
        return $resultat;
    }

    //  FUNCTION POUR MODIFIER UN OUTIL 
    function updateOutil(int $id_outil,int $id_categorie, string $nom_outil,string $url_outil){
        $pdo = connexionBdd();
        $sql = "UPDATE outil SET id_categorie = :id_categorie, nom_outil = :nom_outil, url_outil = :url_outil WHERE id_outil = :id_outil";
        $requete = $pdo->prepare($sql);
        $requete->execute(array(
            ':id_categorie' => $id_categorie,
            ':nom_outil' => $nom_outil,
            ':url_outil' => $url_outil,
            ':id_outil' => $id_outil
        )) ;
    }

    // SUPRRESSION D'UN OUTIL
    function deleteOutilById( $id_outil){
        $pdo = connexionBdd();
        $sql = "DELETE FROM outil WHERE id_outil = :id_outil";
        $requete = $pdo->prepare($sql);
        $requete->execute(array(
            ':id_outil' => $id_outil 
        ));
    }
?>