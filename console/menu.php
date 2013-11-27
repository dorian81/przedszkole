<?php
require_once 'sql.php';

function menu($site){
    $sql = new sql;
    $result = $sql->select_sites();
    while ($row = mysql_fetch_assoc($result)) {
        $items[] = $row;
    }
    $menu = '<a rel="javascript.void(0)" onclick = "sites()"><h3>Strony:</h3></a><div id="sites" style="display:none;">';
    foreach ($items as $item){
        if ($item['parrent'] == '/'){
            $menu .= '<a href = "/przedszkole/console/index.php?action='.$item['link'].'" class = "menu';
            $menu .= ($item['active'] == 1)?' active':' inactive';
            $menu .= ($site != '' && $item['link'] == $site)?' selected':'';
            $menu .= '">'.$item['name'].'</a><br>';
            $children = $sql->select_child($item['link']);
            foreach ($children as $child){
                $menu .= '<a href = "/przedszkole/console/index.php?action='.$child['link'].'" class = "submenu';
                $menu .= ($child['active'] == 1)?' active':' inactive';
                $menu .= ($site != '' && $child['link'] == $site)?' selected':'';
                $menu .= '">'.$child['name'].'</a><br>';
            }
        }
    }
    $menu .= '<br><a href="index.php?action=new">Dodaj</a><br>
              <a href="index.php?action=order">Kolejność</a></div>
              <a rel="javascript.void(0)" onclick = "info()"><h3>Informacje:</h3></a>
              <div id="info" style="display:none;"><a href="index.php?action=inf_list">Lista</a><br><a href="index.php?action=inf_new">Dodaj</a><br></div>
              <a rel="javascript.void(0)" onclick = "gals()"><h3>Galerie:</h3></a><div id="gals" style="display:none;">';
    $gals = array();
    $result = $sql->select_gal_names();
    while ($row = mysql_fetch_assoc($result)){
        $gals[] = $row['gal'];
    }
    
    foreach ($gals as $gal){
        $menu .= '<a href="index.php?action=gal&gal='.$gal.'">'.$gal.'</a><br>';
    }
    $menu .= '<a href="index.php?action=gal_new">Dodaj</a>';
    $menu .= '</div>
              <a rel="javascript.void(0)" onclick = "polls()"><h3>Ankiety:</h3></a><div id="polls" style="display:none;"></div>
              <a rel="javascript.void(0)" onclick = "upload()"> <h3>Upload:</h3></a><div id="upload" style="display:none;"><a href="index.php?action=upl_list">Lista</a><br><a href="index.php?action=upl_new">Dodaj</a><br></div>';
    return $menu;
}