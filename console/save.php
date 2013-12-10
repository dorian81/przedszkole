<?php
    require_once 'sql.php';
    $sql = new sql;
    if(isset($_GET['action'])) $action = $_GET['action'];
    
switch ($action) {
    case 'update':{
        $sql->update($_POST);
        if ($_POST['parrent'] == '/'){
            $sql->update_children($_POST['link'],$_POST['style']);
        }
        header('location:index.php');
        break;
    }
    case 'insert':{
        $sql->insert($_POST);
        header('location:index.php?action='.$_POST['link']);
        break;
    }
    case 'act':{
        $sql->status(1,$_GET['link']);
        header('location:index.php?action='.$_GET['link']);
        break;
    }
    case 'deact':{
        $sql->status(0,$_GET['link']);
        header('location:index.php?action='.$_GET['link']);
        break;
    }
    case 'delete':{
        $sql->delete($_GET['id']);
        header('location:index.php');
        break;
    }
    case 'up':{
        $pos = $sql->select_pos($_GET['id']);
        $sql->up($pos['pos'],$_GET['id']);
        header('location:index.php?action=order');
        break;
    }
    case 'down':{
        $pos = $sql->select_pos($_GET['id']);
        $sql->down($pos['pos'],$_GET['id']);
        header('location:index.php?action=order');
        break;
    }
    
    case 'in_new':{
        $sql->insert_info($_POST);
        header('location:index.php?action=inf_list');
        break;
    }
    case 'in_sav':{
        $sql->update_info($_POST);
        header('location:index.php?action=inf_list');
        break;
    }
    case 'in_del':{
        $sql->info_delete($_GET['id']);
        header('location:index.php?action=inf_list');
        break;
    }
    case 'upl':{
        if ($_FILES["file"]["error"] > 0){
            echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
        }else{
            move_uploaded_file($_FILES['file']['tmp_name'], '../upload/'.$_FILES['file']['name']);
            header('location:index.php?action=upl_list');
        }
        break;
    }
    case 'upl_del':{
        unlink('../upload/'.$_GET['file']);
        header('location:index.php?action=upl_list');
        break;
    }
    case 'gal_new':{
        require_once 'assets/img_upload.php';
        if ($name = upload_img($_FILES['file'])){
            $sql->insert_gal($_POST['name'],$name);
            header('location:index.php?action=gal&gal='.$_POST['name']);
        }else{
            echo $_FILES['file']['error'];
        }
        break;
    }
    case 'gal_save':{
        require_once 'assets/img_upload.php';
        if ($name = upload_img($_FILES['file'])){
            $data['img'] = $name;
            $data['gal'] = $_POST['gal'];
            $data['pos'] = $_POST['pos'];
            $sql->insert_photo($data);
            header('location:index.php?action=gal&gal='.$_POST['gal']);
        }else{
            echo $_FILES['file']['error'];
        }
        break;
    }
    case 'gal_right':{
        $pos = $sql->select_img_pos($_GET['id']);
        $sql->gal_right($pos,$_GET['id']);
        header('location:index.php?action=gal&gal='.$_GET['gal']);
        break;
    }
    case 'gal_left':{
        $pos = $sql->select_img_pos($_GET['id']);
        $sql->gal_left($pos,$_GET['id']);
        header('location:index.php?action=gal&gal='.$_GET['gal']);
        break;
    }
    case 'gal_del':{
        $img = $sql->select_img($_GET['id']);
        $path = $_SERVER['DOCUMENT_ROOT'].'/przedszkole/gals/';
        if (unlink($path.$img) && unlink ($path.'m/'.$img)){
            $sql->del_img($_GET['id']);
        }
        header('location:index.php?action=gal&gal='.$_GET['gal']);
    }
    default:
        break;
}
    
