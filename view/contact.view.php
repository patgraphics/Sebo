<?php
//si le fichier est appele directement dans le navigateur, on redirige vers index.php 
if (stristr($_SERVER['REQUEST_URI'], ".view.php")) header("location:../index.php");

print "<h2>contact</h2>";

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

                        <div style="width:80%;margin:auto">

                            <div style="width:50%;float:left">
                                <p><input type="text" placeholder="Votre nom" name="txt_nom"><br><br></p>
                                <p><input type="mail" placeholder="Votre mail" name="txt_mail"><br><br></p>
                                <p><input type="tel" placeholder="Votre tel" name="txt_tel"><br><br></p>

                            </div>


                            <div style="width:50%;float:left">

                                <p><textarea cols="30" rows="10" placeholder="Commentaires" name="txt_com"></textarea></p>		

                            </div>

                        </div>	


                        <br>

                        <div width="100%" style="clear: both">


                            <br>
                            <button style="width:90%;align-content: center;" type="submit">Envoyer</button>
                            <br>
                            <p align="center">
                                Nous vous contacterons dans les meilleurs délais
                            </p>

                        </div>
                 </form>
        </div>
      </body>
</html>