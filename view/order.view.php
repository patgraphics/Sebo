<?php
//si le fichier est appele directement dans le navigateur, on redirige vers index.php 
if (stristr($_SERVER['REQUEST_URI'], ".view.php"))
    header("location:../index.php");
if (isset($_SESSION['numCde'])){

?>

<p>remplissage du panier de la commande n° <?= $_SESSION['numCde'] ?></p>
<form method="POST" action="index.php?action=lcd">
    <label for="refArticle">référence de l'article</label>
    <input name='refArticle' type="text" placeholder="article numéro"><br><br><br>  
    <label for="qteArtCde">quantité à commander</label>
    <input name='qteArtCde' type="number" min="1" max="10" step="1"><br><br><br>
    <button type="submit" name="ok">valider</button><br><br><br>
    <p> 
        <!--<a href="index.php?action=cde&amp;pseudo=<?= $_SESSION['pseudo'] ?>"><button class="bt2">Commander</button></a>-->
        <a href="index.php?action=cde" style="color:whitesmoke">Valider la Commande</a>
    </p>
</form>
<?php    
}
else{
    cde;
}
