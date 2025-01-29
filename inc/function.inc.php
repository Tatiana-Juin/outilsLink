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

?>