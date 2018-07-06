<table>
            <th>Titre</th>
            <th>Auteur</th>

<?php

           include ("../mdl/Singleconnex.php");
        
            // On se connecte a la base en creant une instance unique
            Singleconnex::identifier("root", "root");
            $bdd = Singleconnex::getInstance();
            // On definit la requete dans la variable $sql
            $sql = "SELECT *  FROM Article WHERE type = 'DVD'";
            echo $sql;
            //print_r(self::$instance) ;
            // On execute la requete 
            $reponse = $bdd->query($sql);

            // On affiche chaque entree une a une

            while ($donnees = $reponse->fetch(PDO::FETCH_ASSOC)) {
            print "<tr><td> " .$donnees['titre'] . " </td><td> " . $donnees['auteur'] . "</td>";
            }

            /*          
            foreach ($reponse as $key => $value) {
                echo $value["titre"] . " " . $value["auteur"] . "<br>";
            }
            */

            $reponse->closeCursor(); // Termine le traitement de la requete
?>
</table>
