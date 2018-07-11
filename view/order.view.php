<?php
//si le fichier est appele directement dans le navigateur, on redirige vers index.php 
if (stristr($_SERVER['REQUEST_URI'], ".view.php"))
    header("location:../index.php");
?>
<p>choix article Quantité</p>
<form method="POST" action="../index.php?action=lcd&amp;pseudo=<?= $_SESSION['pseudo'] ?>">
    <label for="refArticle">référence de l'article</label>
    <input name='refArticle' type="number" placeholder="article numéro"><br>
    <label for="refArticle">quantité à commander</label>
    <input name='qteArtCde' type="number" placeholder="de 1 à 50" min='1' max="50"><br>
</form>

