<?php

include_once '../mdl/Requete.php';

$test = Requete::listeTitresAuteurs($_GET["saisie"]) ;


echo json_encode($test);