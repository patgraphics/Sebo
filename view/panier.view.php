<?php
//si le fichier est appele directement dans le navigateur, on redirige vers index.php 
if (stristr($_SERVER['REQUEST_URI'], ".view.php"))
    header("location:../index.php");

if(isset($_SESSION['pseudo'])){
    echo'<h4>Bonjour '. $_SESSION['pseudo'].', sélectionnez un produit pour faire votre panier</h4>'  ;
}
else {
    echo '<h4>Sélectionnez un produit pour faire votre panier</h4>'; 
}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="jq/themes/default/easyui.css">
        <script type="text/javascript" src="jq/jquery.min.js"></script>
        <script type="text/javascript" src="jq/jquery.easyui.min.js"></script>
    </head>
    <body>
        <div class="gauche">
           <div class="easyui-panel">
                <div style="margin-bottom:20px; padding: 10px;">
                    <input class="easyui-combobox"
                           data-options="
                           url: 'view/categorie.php',
                           method: 'get',
                           valueField:'categorie',
                           textField:'categorie',
                           groupField:'idCategorie',
                           label: 'Recherche par categorie',
                           labelPosition: 'top'
                           ">
                </div>
            </div>
        </div>
        
        <div id="central"></div>
        
        <div class="droite">
            <div class="easyui-panel">
                <div style="margin-bottom:20px; padding: 10px;">
                    <input class="easyui-combobox"
                           data-options="
                           url: 'view/titre.php',
                           method: 'get',
                           valueField:'titre',
                           textField:'titre',
                           groupField:'idCategorie',
                           label: 'Recherche par titre',
                           labelPosition: 'top'
                           ">
                </div>
            </div>
        </div>
    </body>

</html>