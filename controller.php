<?php

require_once('mdl/Requete.php');
require_once('mdl/Connection.php');
require_once('mdl/Inscription.php');
require_once('mdl/Commande.php');


function connection($motpass = "", $pseudo = "") {

    if ($pseudo && $motpass) {
        $connection = new Connection($motpass, $pseudo);

        if ($connection->conn()) {

            //creation de variable de session 
            $_SESSION['idClient'] = $connection->getIdClient();
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['time'] = time();          
            require ('welcome.php');
        } else {
            $error = $connection->getError();
            print ("salut");
            cnx();
        }
    } else {
        echo ("ça marche");
        cnx();
        
    }
}
function cnx(){
    require ('view/connexion.view.php');
}

function deconnection() {
    if (isset($_SESSION)) {
        $speudo = $_SESSION['pseudo'];
        session_destroy();
        $_SESSION = NULL;
        require ('view/accueil.view.php');
    } else {
        require ('view/accueil.view.php');
    }
}

function inscription($nom, $prenom, $pseudo, $email, $numero, $adresse, $codePostal, $ville, $motPass1, $motPass2) {

    $syntaxe = '<^[A-Za-z0-9]*$>';
    if ($nom && $prenom && $pseudo && $email && $motPass1 && $motPass2) {

        if (preg_match($syntaxe, $nom) && preg_match($syntaxe, $prenom) && preg_match($syntaxe, $pseudo)) {
            $inscription = new Inscription($nom, $prenom, $pseudo, $email, $numero, $adresse, $codePostal, $ville, $motPass1, $motPass2);
            $resultat = $inscription->inscription();
            if ($resultat) {
                echo "<p>votre inscription a bien été prise en compte, pensez maintenant à vous connecter svp</p>";
                require ('view/accueil.view.php');
            } else {
                $error = $inscription->getError();
                ins();
            }
        } else {
            $error = "<h1>Attention ! ne pas utiliser de caractere speciaux SVP</h1>";
            echo ($error);
            ins();
        }
    } else {
        ins();
    }
}
function ins(){
    require ('view/inscription.view.php');
}

function commande(){
    //creation nouvelle commande
    $c = new Commande();
    //creation de variable de session 
    $_SESSION['numCde'] = $c->getNumCde();
    $_SESSION['etatCde'] = $c->getEtatCde();
}
function addArticle($type, $idCategorie, $prixUnitaire, $titre, $auteur, $editeur){
    Requete::addArticle($type, $idCategorie, $prixUnitaire, $titre, $auteur, $editeur);
    echo "your new article have been well inserted";
    require("view/accueil.view.php");
}
function add(){
    require("admin/new.view.php");
}


function contact(){
    require("view/contact.view.php");
}
function accueil(){
    require("view/accueil.view.php");
}
function panier(){
    require("view/panier.view.php");
}
function produits(){
    require("view/products.view.php");
}

//------------------------------------------------------------------------------
function delArticle(){
    //TODO delete article
}
function modArticle(){
    //TODO modify article
}
function administrateur(){
    //TODO admin page is ready but it has to be connected
    require ('admin/admin.view.php');
}