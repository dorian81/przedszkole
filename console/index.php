<?php
    require_once 'menu.php';
    require_once 'edit.php';
    $site = (isset($_GET['action']))?$_GET['action']:'';
?>
<HTML>
    <HEAD>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="assets/style.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    </HEAD>
    <BODY>
        <div id="head"></div>
        <div id="container">
            <div id="left">
                <?php
                    
                    echo menu($site);
                ?>
            </div>
            <div id="content">
                <?php
                    if ($site != '') echo form($site);
                ?>
            </div>
        </div>
    </BODY>
</HTML>