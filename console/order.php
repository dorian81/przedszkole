<?php

require_once 'sql.php';

function order(){
    $sql = new sql;
    $result = $sql->select_sites();
    $max = $sql->select_max_pos();
    while ($row = mysql_fetch_assoc($result)){
        $sites[]=$row;
    }
    
    $form = '<table border="0" cellspacing="0" cellpadding="2">';
    
    foreach ($sites as $site){
        if ($site['link'] != 'main'){
            $form .= '<tr><td>'.$site['pos'].'</td><td>';
            $form .= ($site['pos'] > 2)?' <a href = "save.php?action=up&id='.$site['id'].'"><img src="assets/up.png"></a>':'';
            $form .= ($site['pos'] < $max)?' <a href = "save.php?action=down&id='.$site['id'].'"><img src="assets/down.png"></a>':'';
            $form .= '</td><td>'.$site['name'].'</td><td></td></tr>';
            $children = $sql->select_child($site['link']);
            if (count($children) > 0){
                $max_child = $sql->select_max_pos_child($site['link']);
            }
            foreach ($children as $child){
                $form .= '<tr><td></td><td>'.$child['pos'].'</td><td>';
                $form .= ($child['pos'] >= 2)?' <a href = "save.php?action=up&id='.$child['id'].'"><img src="assets/up.png"></a>':'';
                $form .= ($child['pos'] < $max_child)?' <a href = "save.php?action=down&id='.$child['id'].'"><img src="assets/down.png"></a>':'';
                $form .= '</td><td>'.$child['name'].'</td></tr>';
            }
            
        }
    }
    $form .= '</table>
              <script type="text/javascript">
                sites();
              </script>';
    
    return $form;
}