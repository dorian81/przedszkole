<?php

   require_once '/model/sql.php';

class bundle{
    public function head() {
        $head='';
        return $head;
    }
    
    public function content($site){
        if ($site == '') {
            $site = 'main';
        }
        $sql = new sql;
        $data = $sql->select_site($site);
        $content = $data['content'];
        if ($data['type'] == 'news'){
            $content.='<div>';
            $result = $sql->select_info();
            while ($row = mysql_fetch_assoc($result)){
                $info[]=$row;
            }
            foreach($info as $news){
                $content .= '<div class="info">
                                '.date('d-m-Y H:m',strtotime($news['date'])).'<br>
                                <h2>'.$news['title'].'</h2>
                                '.$news['content'].'<br><br></div>';
            }
            $content .='</div>';
        }
        if ($data['type'] == 'main'){
            $content.='<div><h1>Najnowsze informacje!</h1>';
            $result = $sql->select_info_main();
            while ($row = mysql_fetch_assoc($result)){
                $info[]=$row;
            }
            foreach($info as $news){
                $content .= '<div class="info">
                                '.date('d-m-Y H:m',strtotime($news['date'])).'<br>
                                <h2>'.$news['title'].'</h2>';
                $text = (strlen($news['content']) > 200)?substr($news['content'],0,strpos($news['content'],' ',180)).'(...)':$news['content'];
                $content .= $text.' <a href="/przedszkole/informacje">Czytaj>></a><br><br></div>';
            }
            $content .='</div>';
        }
        while ($needle = strpos($content,'##gal(')){
            $gal_length = strpos($content,')',$needle)-($needle+6);
            $gal = substr($content,$needle+6,$gal_length);
            $result = $sql->select_gal($gal);
            $imgs = '';
            while ($row = mysql_fetch_assoc($result)){
                $imgs .= '<a class="fancybox" rel="'.$gal.'" href="gals/'.$row['img'].'"><img src="gals/m/'.$row['img'].'" style="padding:0 5px 0 5px;"></a>';
            }
            $content = str_replace('##gal('.$gal.')',$imgs,$content);
        }
        $content.='<script type="text/javascript">
                            $(document).ready(function() {
                                $(".fancybox").fancybox();
                            });
                       </script> ';
        
        return $content;
    }
    
    public function menu($request){
        if ($request == '') {
            $request = 'main';
        }
        $sql = new sql();
        $result = $sql->select_sites();
        while ($row = mysql_fetch_assoc($result)){
            $sites[] = $row;
        }
        $menu = '';
        foreach ($sites as $site){
            if ($site['active'] == 1 && $site['parrent'] == '/'){
                $menu .= '<a href = "/przedszkole/'.$site['link'].'" class = "menu ';
                $menu .= ($request==$site['link'])?'selected ':'';
                $menu .= $site['style'].'">'.$site['name'].'</a>';
                $children = $sql->select_child($site['link']);
                if (count($children)>0){
                    $test = false;
                    foreach ($children as $child){
                        if ($child['link'] === $request) {
                            $test = true;
                        }
                    }
                    if ($test || $site['link'] == $request){
                        foreach ($children as $child){
                            $menu .= '<a href = "/przedszkole/'.$child['link'].'" class = "submenu ';
                            $menu .= ($request === $child['link'])?'selected ':'';
                            $menu .= $child['style'].'">'.$child['name'].'</a>';
                        }
                    }
                }
            }
        }
        return $menu;
    }
}
