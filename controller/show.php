<?php

   require_once '/model/sql.php';

class bundle{
    public function head() {
        $head='';
        return $head;
    }
    
    public function content($site){
        $sql = new sql;
        $site = $sql->select_site($site);
        $content = $site['content'];
        return $content;
    }
    
    public function menu($request){
        $sql = new sql();
        $result = $sql->select('sites');
        while ($row = mysql_fetch_assoc($result)){
            $sites[] = $row;
        }
        $menu = '';
        if (mysql_num_rows($result) > 1){
            foreach ($sites as $site){
                $menu .= '<a href = "'.$site['link'].'" class = "menu ';
                $menu .= ($request==$site['link'])?'selected ':'';
                $menu .= $site['style'].'">'.$site['name'].'</a>';
            }
        }else{
            $menu .= '<a href = "/'.$sites['link'].'" class = "menu ';
            $menu .= ($request==$sites['link'])?'selected ':'';
            $menu .= $sites['style'].'">'.$sites['name'].'</a>';
        }
        return $menu;
    }
}
