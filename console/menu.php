<?php
require_once 'sql.php';

function menu($site){
    $sql = new sql;
    $result = $sql->select_sites();
    while ($row = mysql_fetch_assoc($result)) {
        $items[] = $row;
    }
    $menu = '';
    foreach ($items as $item){
        $menu .= '<a href = "/przedszkole/console/index.php?action='.$item['link'].'" class = "menu';
        $menu .= ($item['active'] == 1)?' active':' inactive';
        $menu .= ($site != '' && $item['link'] == $site)?' selected':'';
        $menu .= '">'.$item['name'].'</a><br>';
    }
    $menu .= '<a href="index.php?action=new">Dodaj</a>';
    return $menu;
}