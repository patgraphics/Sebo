
<html>
    <head>
        <title>Sebo Media Provider</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> 
        <link rel="icon" type="image/png" href="img/logo.gif" >
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="js/slidesho.js"></script>
    </head>
    <body>
        <div class="flex-container">
            <div class="navbar">
                <a href="index.php?action=acc">Accueil</a>
                <a href="index.php?action=prd">Produits</a>
                <a href="index.php?action=pan">Panier</a>
                <a href="index.php?action=cnt">Contact</a>
            </div> 

            <div class="navcnx">
                <?php if (!isset($_SESSION['pseudo'])) { ?>           
                    <a href="index.php?action=ins">Inscription</a>
                    <a href="index.php?action=cnx">Connexion</a>
                    <a href="index.php?action=adm">Admin</a>
                <?php } else { print "<p>  ".($_SESSION['pseudo']."  </p>"); ?>    
                    <a href="index.php?action=dcx">Déconnexion</a>
                <?php } ?>
            </div> 
       </div> 
       <div><br></div>
    </body>
</html>


