<?php
    include_once '/controller/show.php';
    $bundle = new bundle();
    $head = $bundle->head();
    $content = $bundle->content($_GET['site']);
    $menu = $bundle->menu($_GET['site']);
?>
<HTML>
    <HEAD>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <!--<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>-->
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <SCRIPT type="text/javascript" src="js/script.js"></script>
        <?php echo $head; ?>
    </HEAD>
    <BODY>
        <center>
            <div id="container">
                <div id="header"></div>
                <div id="left">
                    <div id="menu_h"></div>
                    <?php echo $menu; ?>
                    <a href="http://przedszkole384.bip.um.warszawa.pl" target = "top"><img src="img/bip_logo.jpg" style="padding-top:20px"></a>
                </div>
                <div id="content">
                    <?php echo $content; ?>
                </div>
                <div id="footer"></div>
                <script type="text/javascript">
                   tabs();
                   min_width();
                </script>
            </div>
        </center>
    </BODY>
</HTML>