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
        $dsn = "mysql:host=".DBHOST.";dbname".DBNAME.";charset=utf8";
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

    //FUNCTION POUR AJOUTER UNE CATEGORIE 
    function addCategorie(string $nom_categorie){
        $pdo = connexionBdd();
        $sql = "INSERT INTO categorie (nom_categorie) VALUES (:nom_categorie)";
        $requete = $pdo->prepare($sql);
        $requete->execute(array(
            ":nom_categorie" => $nom_categorie
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
        $sql =" SELECT nom_categorie FROM categorie";
        $requete =$pdo->query($sql);
        $resultat = $requete->fetchAll();
        return $resultat;
    }

?>