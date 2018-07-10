<?php
//si le fichier est appele directement dans le navigateur, on redirige vers index.php 
if (stristr($_SERVER['REQUEST_URI'], ".view.php"))
    header("location:../index.php");

if (isset($_SESSION['pseudo'])) {
    echo'<h4>Bonjour ' . $_SESSION['pseudo'] . ', sélectionnez un produit pour faire votre panier</h4>';
} else {
    echo '<h4>Sélectionnez un produit pour faire votre panier</h4>';
}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="jq/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/icon.css">
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
                           valueField:'',
                           textField:'categorie',
                           groupField:'idCategorie',
                           label: 'Recherche par categorie',
                           labelPosition: 'top'
                           ">
                </div>
            </div>
        </div>

        <div style="margin-left:250px;width:100%;">
                           
            <table id="dl" class="easyui-datagrid" url="mdl/liste.php" title="Produits " style="width:800px;height:600px"
                   iconCls=icon-save" sortName="titre" sortOrder="asc" rownumbers="true" pagination="true">
                <thead>
                    <tr>
                        <th data-options="field:'type',width:150,sortable:true">Type</th>
                        <th data-options="field:'titre',width:250,sortable:true">Titre</th>
                        <th data-options="field:'auteur',width:200,sortable:true">Auteur</th>
                        <th data-options="field:'prixUnitaire',width:50,align:'right',sortable:true">Prix HT</th>
                        <th data-options="field:'categorie',width:150">Categorie</th>

                    </tr>
                </thead>
            </table>
        </div>

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