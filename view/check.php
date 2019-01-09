<?php

?>
<html>
<head>
        <link rel="stylesheet" type="text/css" href="../jq/themes/default/easyui.css">
        <script type="text/javascript" src="../jq/jquery.min.js"></script>
        <script type="text/javascript" src="../jq/jquery.easyui.min.js"></script>
</head>
    <div style="margin:20px 0">hello</div>
    <div class="easyui-datalist" title="Checkbox des articles" style="width:400px;height:250px" data-options="
            url: 'titre.php',
            method: 'get',
            checkbox: true,
            selectOnCheck: false,
            onBeforeSelect: function(){return false;}
            ">ici
    </div>
</html>