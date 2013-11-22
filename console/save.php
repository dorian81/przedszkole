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
    default:
        break;
}
    
