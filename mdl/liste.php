<?php

require 'Requete.php';


            $reponse = ('SELECT Article.type, Article.titre, Article.auteur, Article.prixUnitaire, categorie.categorie FROM Article  INNER JOIN categorie ON categorie.idCategorie = Article.idCategorie ORDER BY categorie');
            
            $repo = Requete::getDatas($reponse);

   
            echo json_encode($repo);  //affichage dans un json
            
            //print_r($repo);
            
 