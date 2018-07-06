<?php

require '../mdl/Requete.php';


    $rest = Requete::dvd();

    /*foreach ($rest as $key => $value) {
        echo $value["titre"] . " " . $value["auteur"] . "<br>";
    }
           
    echo "<br>";

    print_r($rest) ;

    echo "<br>";*/
    
    echo json_encode($rest);