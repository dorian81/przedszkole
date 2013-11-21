<?php
    include_once '/controller/show.php';
    $site = (isset($_GET['site']))?$_GET['site']:'';
    $bundle = new bundle();
    $head = $bundle->head();
    $content = $bundle->content($site);
    $menu = $bundle->menu($site);
?>
<HTML>
    <HEAD>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <SCRIPT type="text/javascript" src="js/script.js"></script>
        <link rel="stylesheet" href="js/fbox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
        <script type="text/javascript" src="js/fbox/jquery.fancybox.pack.js?v=2.1.5"></script>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&language=pl"></script>
        <style>
			#map-canvas {
			height: 400px;
			width: 400px;
			margin: 20px;
			padding: 0px
			}
		</style>
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