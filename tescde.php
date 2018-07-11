<?php
/*
require ('mdl/Commande.php');

$client = Requete::selectFromWhere('Client', 'idClient', 'pseudo', $_GET['pseudo']);
print_r($client[0]['idClient']);

$cli=$client[0]['idClient'];
$date = date('Y-m-d');
$etat = '1';

$testcde = new Commande($cli,$date,$etat);


$testcde->commande($cli,$date,$etat);
 */

require('mdl/LigneCde.php');

$li = Requete::addLigne('45', '33', '1');
echo "added ";

$re='47';
$se=$_GET['numCde'];
$q='1';

$testli = new LigneCde($re,$se, $q);
echo " lined ";

$testli->ligne($re,  $se , $q);
echo " tested";