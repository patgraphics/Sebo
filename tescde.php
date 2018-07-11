<?php

require ('mdl/Commande.php');

$client = Requete::selectFromWhere('Client', 'idClient', 'pseudo', $_GET['pseudo']);
print_r($client[0]['idClient']);

$cli=$client[0]['idClient'];
$date = date('Y-m-d');
$etat = '1';

$testcde = new Commande($cli,$date,$etat);


$testcde->commande($cli,$date,$etat);
