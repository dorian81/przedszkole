<?php

   require_once '/model/sql.php';

class bundle{
    public function head() {
        $head='';
        return $head;
    }
    
    public function content($site){
        if ($site == '') $site = 'main';
        $sql = new sql;
        $data = $sql->select_site($site);
        $content = $data['content'];
        return $content;
    }
    
    public function menu($request){
        if ($request == '') $request = 'main';
        $sql = new sql();
        $result = $sql->select('sites');
        while ($row = mysql_fetch_assoc($result)){
            $sites[] = $row;
        }
        $menu = '';
        foreach ($sites as $site){
            if ($site['active'] == 1){
                $menu .= '<a href = "/przedszkole/'.$site['link'].'" class = "menu ';
                $menu .= ($request==$site['link'])?'selected ':'';
                $menu .= $site['style'].'">'.$site['name'].'</a>';
            }
        }
        return $menu;
    }
}
