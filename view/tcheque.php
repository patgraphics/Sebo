<?php ?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../jq/themes/default/easyui.css">
        <script type="text/javascript" src="../jq/jquery.min.js"></script>
        <script type="text/javascript" src="../jq/jquery.easyui.min.js"></script>
        <script>
            $('#dl').datalist({
                url: 'titre.php',
                checkbox: true,
                lines: true
            });
        </script>
    </head>
    <body>
 
    <div id="dl">hello
    </div>
    </body>
</html>

