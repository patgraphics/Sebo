<?php

require ("SingleConnex.php");

class Requete {
    
    private static $erreur;
    
    function __construct() {
        
    }
    /**
     * fonction principale pour recuperer les donnees dans la base
     * @param  $query est le contenu de la requete SQL
     * @return $res sous form de tableau ou null si pas de reponse
     */
    public static function getDatas($query){
        $res = NULL; //initialisation de la variable a null au cas ou 
        if (isset($query) && $query != "") { //je teste validite de ma requete
            //je me connecte en creant une instance de ma classe SingleConnex
            $bdb = Singleconnex::getInstance(); // demande de connection
            $reponse = $bdb->query($query); //execution de la requete
            if ($reponse) { // je teste l existence de la reponse
                $reponse->setFetchMode(PDO::FETCH_ASSOC); //envoi dans tableau
                $res = $reponse->fetchall(); //balance dans la variable $res
                $reponse = NULL; //je remets a zero pour la prochaine execution
            } else {
                self::$erreur = $bdb->errorInfo();
            }
            return $res;
           
        }
        //je referme ma connexion en fin de requete
        Singleconnex::close(); 
        return $res;
    }
    /**
     * fonction principale pour ajouter les donnees dans la base
     * @param  $query est le contenu de la requete SQL
     * @return $bool vrai si tout fonctionne bien
     */
    public static function addDatas($query) {
        $bool = FALSE;
        $bdd = Singleconnex::getInstance();
        $bdd->beginTransaction();
        if ($bdd->exec($query)) {
            $bdd->commit();
            $bool = TRUE;
        } else {
            self::$erreur = $bdd->errorInfo();
        }
        Singleconnex::close();
        return $bool;
    }
    /**
     * getter qui renvoie la valeur de la variable $erreur
     * @return type erreur si existe sinon NULL
     */
    public static function getErreur() {
        $erreur = NULL;
        if (isset(self::$erreur)) {
            $erreur = self::$erreur;
        }
        self::$erreur = NULL;
        return $erreur;
    }
    
    //-------------------fonctions secondaires pour effectuer les requetes------
    
    public static function selectFrom($from, $select){
        $sql = "SELECT " .$select. " FROM " .$from;
        return self::getDatas($sql);
    }
    
    public static function selectFromWhere($from, $select, $col, $param){
        $sql = "SELECT " .$select. " FROM " .$from. " WHERE " .$col. " = '".$param."'";
        return self::getDatas($sql);
    }

    public static function selecType($saisie){
        $sql = "SELECT *  FROM `Article` WHERE `type` = ".$saisie."";
        return self::getDatas($sql);
    }
    
    public static function dvd(){
        $sql = "SELECT *  FROM `Article` WHERE `type` = 'DVD'";
        return self::getDatas($sql);
    }
    
    public static function listeTitresAuteurs($saisie) {
        $sql = "CONCAT(Article.type,' ',Article.titre,' ',Article.auteur,' ',categorie.categorie) AS ConcatenatedString FROM 	Article \n"

    . "                INNER JOIN categorie ON categorie.idCategorie = Article.idCategorie\n"

    . "                WHERE\n"

    . "                Article.titre LIKE '".$saisie."%' OR Article.auteur LIKE '".$saisie."%' OR categorie.categorie LIKE '".$saisie."%'";
        
        return self::getDatas($sql);
    }
    
    public static function addArticle($type,$idCategorie,$prixUnitaire,$titre,$auteur,$editeur){
        $sql = "INSERT INTO `Article` (`refArticle`, `type`, `idCategorie`, `qteStock`, `prixUnitaire`, `titre`, `auteur`, `editeur`, `photo`) VALUES (NULL,'".$type."','".$idCategorie."', '0', '".$prixUnitaire."', '".$titre."', '".$auteur."', '".$editeur."','')";
        self::addDatas($sql); 
         
    }
    
    public static function addClient($nom,$prenom,$numero,$adresse,$codePostal,$ville,$email,$pseudo,$password){
        $sql = "INSERT INTO `Client` (`idClient`, `nom`, `prenom`, `numero`, `adresse`, `codePostal`, `ville`, `email`, `pseudo`, `password`) VALUES (NULL,'".$nom."','".$prenom."', '".$numero."', '".$adresse."', '".$codePostal."', '".$ville."', '".$email."','".$pseudo."','".$password."')";
        self::addDatas($sql); 
    }
    
    public static function addLigne($refArticle, $qteArtCde){
        $sql = "INSERT INTO `ligneCde` (`refArticle`,`qteArtCde`) VALUES ('".$refArticle."','".$qteArtCde."')";
        self::addDatas($sql);
    }
    
    public static function addCommande($idClient, $dateCde, $etatCde){
        $sql = "INSERT INTO `Commande` (`idClient`,`dateCde`,`etatCde`) VALUES ('".$idClient."','".$dateCde."','".$etatCde."')";
        self::addDatas($sql);
    }
}
