<?php
//si le fichier est appele directement dans le navigateur, on redirige vers index.php 
if (stristr($_SERVER['REQUEST_URI'], ".view.php")) header("location:../index.php");

?>
<HTML>
    <H2>INTERFACE ADMINISTRATEUR</H2>
    <div id="central">
        <p>        <a href="index.php?action=new" style="margin-bottom:20px">Ajouter un article</a></p>
        <p>        <a href="index.php?action=del" style="margin-bottom:20px">Supprimer un article</a></p>
        <p>        <a href="index.php?action=mod" style="margin-bottom:20px">Modifier un article</a></p>

     </div>
    
</HTML>
