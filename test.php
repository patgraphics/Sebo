<?php
require ('mdl/Inscription.php');
$test = new Inscription("alfred","albert","alb","toto@gmail.com","10","place du troubadour","06000","Nice","123456789","123456789");


//$test->isPseudoClient();
//$test->verifInscription();
//$test->inscription();


echo "_____________________________________________________________";
echo "<br>";

$cd = Requete::selectFromWhere("Article","titre , auteur","type","CD");
print_r($cd);
echo "<br>";
echo "____________________________________________________________";
echo "<br>";

$art = Requete::selectFrom('Article', 'titre, auteur');
print_r($art);
echo "<br>";
echo "_____________________________________________________________";
echo "<br>";

$sql = "INSERT INTO `Article` (`refArticle`, `type`, `idCategorie`, `qteStock`, `prixUnitaire`, `titre`, `auteur`, `editeur`, `photo`) VALUES (NULL, 'CD', '8', '0', '10', 'Dub Storm', 'Lee Scratch Perry', 'Islands records', '')";
//Requete::addDatas($sql);

//Requete::addArticle('CD', '8', '33', 'Babylon is burning', 'Kingston soul rebels', 'Trojan Records');

//Requete::addClient('Teyrieur', 'Alex', '12', 'rue du coucher dehors', '26000', 'Valence', 'allo@chez.toi', 'exter', 'fromage');

$re = Requete::selectFrom('Articles', 'titre');

print_r($re);

echo "<br>";
echo "_____________________________________________________________";
echo "<br>";

$rest = Requete::selectFrom('categorie', 'categorie');
print_r($rest);

echo "<br>";
echo "_____________________________________________________________";
echo "<br>";

//require ('controller.php');
//inscription('Zeublouse', 'Agathe', 'sad', 'sad@chez.elle', '5', 'impasse des pleurs', '13100', 'Aix en Provence', '123456789', '123456789');

require ('mdl/Connection.php');
$t = new Connection('123456789', 'azert');

$t->conn();
