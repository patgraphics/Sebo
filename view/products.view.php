<?php
//si le fichier est appele directement dans le navigateur, on redirige vers index.php 
if (stristr($_SERVER['REQUEST_URI'], ".inc.php")) header("location:../index.php");
echo" <h4>liste des produits par catégorie</h4>";
?>
<head>
        <link rel="stylesheet" type="text/css" href="jq/themes/default/easyui.css">
        <script type="text/javascript" src="jq/jquery.min.js"></script>
        <script type="text/javascript" src="jq/jquery.easyui.min.js"></script>
</head>
<div class="latchav">
    <table class="easyui-datagrid">
        <thead>
            <th>Catégorie</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Ajouter</th>
        </thead>    

        <tbody>
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
        </tbody>
    </table>
</div>

        <div class="gauche">
            <div class="easyui-panel">
                <div style="margin-bottom:20px; padding: 10px;">
                    <input class="easyui-combobox"
                           data-options="
                           url: 'view/categorie.php',
                           method: 'get',
                           valueField:'categorie',
                           textField:'categorie',
                           groupField:'idCategorie',
                           label: 'Recherche par categorie',
                           labelPosition: 'top'
                           ">
                </div>
            </div>
        </div>

        <div class="droite">
            <div class="easyui-panel">
                <div style="margin-bottom:20px; padding: 10px;">
                    <input class="easyui-combobox"
                           data-options="
                           url: 'view/titre.php',
                           method: 'get',
                           valueField:'titre',
                           textField:'titre',
                           groupField:'idCategorie',
                           label: 'Recherche par titre',
                           labelPosition: 'top'
                           ">
                </div>
            </div>
        </div>