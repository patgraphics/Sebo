<?php
//si le fichier est appele directement dans le navigateur, on redirige vers index.php 
if (stristr($_SERVER['REQUEST_URI'], ".view.php")) header("location:../index.php");

print "<h2>Formulaire de contact </h2>";   
if(isset($_SESSION['pseudo'])){
    echo'<h4>Bonjour '. $_SESSION['pseudo'].' nous sommes à votre écoute</h4>'  ;
}
else {
    echo '<h4> Veuillez vous connecter pour nous envoyer un message</h4>'; 
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset = "utf-8">
    </head>
    <body>
      <div id="Bloc">
                <form action="mdl/formulmail.php" method="POST" enctype="text/plain">

                    <label>Votre demande concerne</label>
                    <select>
                        <option value="produits">Produits</option>
                        <option value="produits">Prix</option>
                        <option value="produits">Livraison</option>
                        <option value="produits">Service après vente</option>
                    </select><br><br>
                    <input type="mail" placeholder="mail si différent" name="txt_mail"><br><br>
                    <input type="tel" placeholder="tel souhaitable" name="txt_tel"><br><br>
                    <textarea cols="25%" rows="10" placeholder="Commentaires" name="txt_com"></textarea>	
                        <div width="100%" style="clear: both">
                            <br>
                            <button style="width:90%;align-content: center;" type="submit">Envoyer</button>
                            <br>
                            <p align="center">
                                Nous vous répondrons dans les meilleurs délais
                            </p>
                        </div>
                 </form>
        </div>
      </body>
</html>