<?php

session_start();

/*
Points d'entrées pour rediriger l'utilisateur vers la page demandée
Ce fichier sert de routeur et renvoie vers les fonctions du controlleur
 */
//inclusion de l'entête html
require("view/top.php");

//appel de mon controlleur
require ("controller.php");

//inclusion du bloc central
if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        
        case "ins":
            if(isset($_POST['nom'])&& isset($_POST['prenom'])&& isset($_POST['pseudo'])&& isset($_POST['email'])&& isset($_POST['numero']) && isset($_POST['adresse']) && isset($_POST['codePostal']) && isset($_POST['ville']) && isset($_POST['motPass1'])&& isset($_POST['motPass2'])){
                inscription($_POST['nom'], $_POST['prenom'], $_POST['pseudo'], $_POST['email'], $_POST['numero'], $_POST['adresse'], $_POST['codePostal'], $_POST['ville'], $_POST['motPass1'], $_POST['motPass2'])  ;
            }
            else{
                ins();
            }
            break;
        case "cnx":
            if(isset($_POST['motdepasse'])&& isset($_POST['pseudo']) ){
                connection($_POST['motdepasse'], $_POST['pseudo']);
            }
            else{
                cnx();
            }
            break;
        case "dcx":
            deconnection();
            break;
        case "new":
            echo " add a new article";
            if(isset($_POST['type']) && isset($_POST['idCategorie']) && isset($_POST['prixUnitaire']) && isset($_POST['titre']) && isset( $_POST['auteur']) && isset($_POST['editeur'])){
                if(($_POST['type'])!="" && ($_POST['idCategorie'])!="" && ($_POST['prixUnitaire'])!="" && ($_POST['titre'])!="" && ( $_POST['auteur'])!="" && ($_POST['editeur'])!=""){
                    addArticle($_POST['type'], $_POST['idCategorie'], $_POST['prixUnitaire'], $_POST['titre'], $_POST['auteur'], $_POST['editeur']); 
                }
            } else {
                add();
            }
            break;
        case "del":
            delArticle();
            break;
        case "mod":
            modArticle();
            break;
        case "adm":
            administrateur();
            break;
        case "cnt":
            contact();
            break;
        case "acc":
            accueil();
            break;
        case "pan":
            panier();
            break;
        case "prd":
            produits();
            break;
        case "cde":
            commande();
            break;
 
        default:
            accueil();
            break;
    }
}
else {
    accueil ();
}

//inclusion du footer html
require("view/bot.html");


