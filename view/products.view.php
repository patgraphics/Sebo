<?php
//si le fichier est appele directement dans le navigateur, on redirige vers index.php 
if (stristr($_SERVER['REQUEST_URI'], ".inc.php")) header("location:../index.php");
echo" <h4>liste des produits par catégorie</h4>";
?>
<table>
            <th>Catégorie</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Ajouter</th>


            <?php
            
        
            // On se connecte a la base en creant une instance unique
            Singleconnex::identifier("root", "root");
            $bdd = Singleconnex::getInstance();
            
            // On execute la requete sql de selection des trois champs
            $reponse = $bdd->query('SELECT Article.auteur, Article.titre, categorie.categorie FROM Article  INNER JOIN categorie ON categorie.idCategorie = Article.idCategorie ORDER BY categorie');

            // On affiche chaque entree une a une
            while ($donnees = $reponse->fetch(PDO::FETCH_ASSOC)) {
                print " <tr><td> " . $donnees['categorie'] . "</td><td> " . $donnees['titre'] . "</td><td> " . $donnees['auteur'] . "</td><td><input type=\"checkbox\" name=\"checked\"</td></tr>";
            }
            print "<tr><td></td><td></td><td></td><td><button type=\"submit\">Valider</button></td></tr>";

     
            $reponse->closeCursor(); // Termine le traitement de la requete
            Singleconnex::close(); //deconnexion de la base de donnees
            ?>
        </table>