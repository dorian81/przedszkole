<?php
    require_once 'menu.php';
    require_once 'edit.php';
    require_once 'order.php';
    require_once 'info.php';
    $site = (isset($_GET['action']))?$_GET['action']:'';
?>
<HTML>
    <HEAD>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="assets/style.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="assets/ckeditor/ckeditor.js"></script>
        <script src="assets/ckeditor/ckeditor.js"></script>
        <script src="assets/ckeditor/adapters/jquery.js"></script>
        <script type="text/javascript" src="assets/script.js"></script>
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
                    switch ($site){
                        case 'order':{
                            echo order();
                            break;
                        }
                        case '':{
                            echo '<center><h1>Witam w konsoli zarządzającej stroną przedszkola nr 384</h1></center>';
                            break;
                        }
                        case 'inf_new':{
                            echo inf_form();
                            echo '<script type="text/javascript"> info(); </script>';
                            break;
                        }
                        case 'inf_list':{
                            echo inf_list();
                            echo '<script type="text/javascript"> info(); </script>';
                            break;
                        }
                        case 'inf_edit':{
                            echo inf_form();
                            echo '<script type="text/javascript"> info(); </script>';
                            break;
                        }
                        default:{
                            echo form($site);
                            echo '<script type="text/javascript"> sites(); </script>';
                            break;
                        }
                    }
                ?>
            </div>
        </div>
    </BODY>
</HTML>