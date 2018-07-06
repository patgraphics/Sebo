<!DOCTYPE html>
<html>
    <head>
        <title>afficher les articles</title>
        <meta charset = "utf-8">
        <style type="text/css">
            <!--
            body {
                color: darkblue;
            }
            table{
                padding: 20px;
                width: 50%;
                background-color: lightyellow;
                margin: 10px;
                border: 2px;
                border-color: red;
                border-radius: 1em;
                text-align: left;
            }
            td{
                width: 400px;
            }
            body {
                margin-left: 50px;
                margin-top: 20px;
                background-color:lightgreen;

            }
            -->
        </style>
    </head>
    <body>
        <table>
            <th>Catégorie</th>
            <th>Titre</th>
            <th>Auteur</th>


            <?php
            include ("SingleConnex.php");
           /* try {
                // On se connecte à MySQL
              
            } catch (Exception $e) {
                // En cas d'erreur, on affiche un message et on arrête tout
                die('Erreur : ' . $e->getMessage());
            }
            */   
            // $bdd = new PDO('mysql:host=localhost;port=8888;dbname=Sebo;charset=utf8', 'root', 'root');
            $bdd = Singleconnex::getInstance();
            Singleconnex::identifier("root", "root");
            // On execute la requete sql de selection des trois champs
            $reponse = $bdd->query('SELECT Article.auteur, Article.titre, categorie.categorie FROM Article  INNER JOIN categorie ON categorie.idCategorie = Article.idCategorie ORDER BY titre');

            // On affiche chaque entrée une à une
            while ($donnees = $reponse->fetch(PDO::FETCH_ASSOC)) {
                print " <tr><td> " . $donnees['categorie'] . "</td><td> " . $donnees['titre'] . "</td><td> " . $donnees['auteur'] . "</td></tr>";
            }

            /* POUR INFO j'aurais pu l'écrire comme ceci ce qui donne la même chose
              foreach ($reponse as $key => $value) {
              echo $value["prenomPilote"]. " ". $value["nomPilote"]."<br>";
              } */

            $reponse->closeCursor(); // Termine le traitement de la requête
            ?>
        </table>
    </body>
</html>
