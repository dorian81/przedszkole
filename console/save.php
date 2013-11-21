<?php
    require_once 'sql.php';
    $sql = new sql;
    if(isset($_GET['action'])) $action = $_GET['action'];
    
switch ($action) {
    case 'update':{
        $sql->update($_POST);
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

    default:
        break;
}
    
