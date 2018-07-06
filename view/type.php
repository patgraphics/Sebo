<?php

require '../mdl/Requete.php';


    $rest = Requete::selectFrom('Type', 'type');

   
    
    echo json_encode($rest);