<?php

session_start();
//var_dump($_SESSION); 
require('mdl/Requete.php');

/*print "<br>__________________________<br>";

print_r ($_SESSION['pseudo']);
print "<br>";
print_r($_SESSION['time']);
print "<br>__________________________<br>";
print_r ($_SESSION['idClient']);
print "<br>";
print_r(date('Y-m-d'));

print "<br>__________________________<br>";
; */

print "<br>";  
print_r(date('Y-m-d'));
   $n=Requete::getNumCde($_SESSION['idClient'], date('Y-m-d'));
   print_r($n); 
   
/*print "<br>";    
   $ncd = $n[0]['numCde'];
   print_r ($ncd);
   
print "<br>";    
   $_SESSION['numCde'] = $ncd;
   print_r ($_SESSION['numCde']);   */