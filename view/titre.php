<?php

require '../mdl/Requete.php';


    $rest = Requete::selectFrom('Articles', 'titre');

   
    
    echo json_encode($rest);