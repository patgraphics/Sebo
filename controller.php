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
    //je met son idClient correspondant au pseudo dans la variable $cli
    $client = Requete::selectFromWhere('Client', 'idClient', 'pseudo', $_SESSION['pseudo'] );
        //test (print_r($client[0]);)
    $cli=$client[0]['idClient'];
    $dat=date('Y-m-d');
    $eta='1';
    //creation de la nouvelle commande
    $c = new Commande($cli,$dat,$eta);
    $c->commande($cli, $dat, $eta);
        //test (echo"new order registred";)
    //creation des variables de session 
    $_POST['numCde'] = $c->getNumCde();
    $_POST['etatCde'] = $c->getEtatCde();
}

function ligneCde(){
   
    require('mdl/LigneCde.php');
    //initialisation du numero de la commande variable $cde
    $client = Requete::selectFromWhere('Client', 'idClient', 'pseudo', $_SESSION['pseudo'] );
    $cli=$client[0]['idClient'];
    $cde = Requete::selectFromWhere('Commande', 'numCde', 'idClient', $cli);
    //get des quantites et des articles de cette commande
    require('view/order.view.php');
    //creation ligne de commande
    $l = new LigneCde($ref, $cde, $qte);
    $l->ligne($ref, $cde, $qte);
  
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

function afficharticle ($refArticle){
    Requete::selectFromWhere('Article', 'type , prixUnitaire , titre , auteur , editeur , photo', 'refArticle', $refArticle);
    require ('view/article.view.php');
}

function afficheligne ($refArticle){
    Requete::selectFromWhere('LigneCde', 'qteArtCde' , 'refArticle', $refArticle);
}

function affichecom ($numCde){
    Requete::selectFromWhere('Commande', 'dateCde , montant' , 'numCde', $numCde);
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