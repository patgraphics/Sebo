<?php

require '../mdl/Requete.php';


    $rest = Requete::selectFrom('categorie', 'categorie');

   
    
    echo json_encode($rest);