<?php
    require_once 'menu.php';
    
    
    
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
                            require_once 'order.php';
                            echo order();
                            break;
                        }
                        case '':{
                            echo '<center><h1>Witam w konsoli zarządzającej stroną przedszkola nr 384</h1></center>';
                            break;
                        }
                        case 'inf_new':{
                            require_once 'info.php';
                            echo inf_form();
                            echo '<script type="text/javascript"> info(); </script>';
                            break;
                        }
                        case 'inf_list':{
                            require_once 'info.php';
                            echo inf_list();
                            echo '<script type="text/javascript"> info(); </script>';
                            break;
                        }
                        case 'inf_edit':{
                            require_once 'info.php';
                            echo inf_form();
                            echo '<script type="text/javascript"> info(); </script>';
                            break;
                        }
                        case 'upl_list':{
                            require_once 'upload.php';
                            echo upl_list();
                            echo '<script type="text/javascript"> upload(); </script>';
                            break;
                        }
                        case 'upl_new':{
                            require_once 'upload.php';
                            echo upl_form();
                            echo '<script type="text/javascript"> upload(); </script>';
                            break;
                        }
                        case 'gal_new':{
                            require_once 'gals.php';
                            echo gal_form('');
                            echo '<script type="text/javascript"> gals(); </script>';
                            break;
                        }
                        case 'gal':{
                            require_once 'gals.php';
                            echo gal_edit($_GET['gal']);
                            echo '<script type="text/javascript"> gals(); </script>';
                            break;
                        }
                        default:{
                            require_once 'edit.php';
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