<?php
session_start();
require ('mdl/Commande.php');
//require ('mdl/Requete.php');
/*
$client = Requete::selectFromWhere('Client', 'idClient', 'pseudo', $_SESSION['pseudo']);

print_r($client[0]['idClient']);

$cli=$client[0]['idClient'];
 * 
 */
$cli=$_SESSION['idClient'];
$date = date('Y-m-d');
$etat = '1';

print $cli."<br>";
print $date."<br>";
print $etat."<br>";

$testcde = new Commande($cli,$date,$etat);


$testcde->commande($cli,$date,$etat);


/* 
require('mdl/LigneCde.php');

$li = Requete::addLigne('45', '33', '1');
echo "added ";

$re='47';
$se='26';
$q='1';

$testli = new LigneCde($re,$se, $q);
echo " lined ";

$testli->ligne($re,  $se , $q);
echo " tested";

require ('mdl/Requete.php');
$n=Requete::selectFromWhere('Commande', 'numCde', 'idClient', '2');
$nc=$n[0]['numCde'];
print_r ($n);
*/
