<?php
//si le fichier est appele directement dans le navigateur, on redirige vers index.php 
if (stristr($_SERVER['REQUEST_URI'], ".view.php"))
    header("location:../index.php");

if (isset($_SESSION['pseudo'])) {
    echo'<h4>Bonjour ' . $_SESSION['pseudo'] . ', sélectionnez des produits pour faire votre panier</h4>';
} else {
    echo '<h4>Sélectionnez des produits pour faire votre panier</h4>';
}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="jq/themes/default/easyui.css">
        <script type="text/javascript" src="jq/jquery.min.js"></script>
        <script type="text/javascript" src="jq/jquery.easyui.min.js"></script>
    </head>
    <body>
      
            <table class="easyui-datagrid" url="mdl/liste.php" title="<?php if($_SESSION){ echo $_SESSION['pseudo'].", ";}else{}?> ici votre sélection " style="height:600px"  >
                <thead>
                    <tr>
                        <th data-options="field:'type',width:100">Type</th>
                        <th data-options="field:'titre',width:250">Titre</th>
                        <th data-options="field:'auteur',width:200">Auteur</th>
                        <th data-options="field:'prixUnitaire',width:50,align:'right'">Prix HT</th>
                        <th data-options="field:'categorie',width:150">Categorie</th>

                    </tr>
                </thead>
            </table>
        </div>


    <div class="droite">
     <div class="easyui-datalist" title="Checkbox des articles" style="width:400px;height:250px" data-options="
            url: 'view/titre.php',
            method: 'get',
            checkbox: true,
            selectOnCheck: false,
            onBeforeSelect: function(){return false;}
            ">ici
    </div>
    </div>
    </body>
</html>