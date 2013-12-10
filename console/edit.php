<?php

function form($site){
    $sql = new sql;
    if ($site != 'new'){
        $data = $sql->select_site($site);
        $form = '<h2>Edycja strony: "'.$data['name'].'"</h2>';
    }else{
        $form = '<h2>Nowa strona</h2>';
        $data['pos'] = $sql->select_max_pos()+1;
        $data['id'] = '';
        $data['name'] = '';
        $data['type'] = 'text';
        $data['link'] = '';
        if (isset($_GET['parrent']) && $_GET['parrent'] !='/'){
            $parent = $sql->select_site($_GET['parrent']);
            $data['style'] = $parent['style'];
        }else{
            $data['style'] = 'bg1';
        }
        $data['content'] = '';
        $data['active'] = 0;
        if (!isset($_GET['parrent'])){
            $data['parrent'] = '/';
        } else{
            $data['parrent'] = $_GET['parrent'];
        }
    }
    $form .= '
            <form action = "save.php?action=';
    $form .= ($site !='new' )?'update':'insert';
    $form .= '" method = "POST">
                <input type="hidden" name="id" value="'.$data['id'].'">
                <input type="hidden" name="pos" value="'.$data['pos'].'">
                
                <input type="hidden" name="parrent" value="'.$data['parrent'].'">
                Nazwa: <input type="text" width="20" name="name" value="'.$data['name'].'"> ';
    $form .= ($data['link'] == 'main')?'<input type="hidden" name="link" value="main">':'Link: <input type="text" width="20" name="link" value="'.$data['link'].'">';
    if ($data['parrent'] == '/'){
        $form .= ' Kolor: <select name="style">';
        for ($i=1;$i<12;$i++){
            $form .= '<option value="bg'.$i.'" class="bg'.$i.'"';
            $form .= ($data['style'] == 'bg'.$i)?' selected':'';
            $form .= '>'.$i.'</option>';
        }
        $form .= '</select>';
    }else{
        $form .= '<input type="hidden" name="style" value="'.$data['style'].'">';
    }
    if ($site != 'new' && $data['link'] != 'main'){
        $form .= '<a href="save.php?action=';
        $form .= ($data['active'] == 1)?'deact':'act';
        $form .= '&link='.$data['link'].'"><img src = "assets/';
        $form .= ($data['active'] == 1)?'active.png':'inactive.png';
        $form .= '"></a>';
    }
    if ($site != 'new' && $data['link'] != 'main'){
        $form .= '<a href="save.php?action=delete&id='.$data['id'].'"><img src = "assets/delete.png"></a>';
        $form .= ($data['parrent'] == '/')?'<a href="index.php?action=new&parrent='.$data['link'].'"><img src = "assets/subsite.png"></a>':'';
    }
    $form .= '<input type = "submit" value = "Zapisz"><br>';
    if ($data['link'] == 'main'){
        $form .= '<input type="hidden" name="type" value="main">';
    }else{
        $form .= 'Typ :<select name = "type"><option value="text"';
        $form .= ($data['type']=='text')?' selected':'';
        $form .= '>Tekst</option>';
        $form .= '<option value="news"';
        $form .= ($data['type']=='news')?' selected':'';
        $form .= '>Informacje</option>';   
        $form .= '<option value="poll"';
        $form .= ($data['type']=='poll')?' selected':'';
        $form .= '>Ankieta</option>';
        $form .='</select>';
    }
    $form .= 'Treść:<br>
                <textarea name="content" class="content">'.$data['content'].'</textarea>
            </form>
            <script type = "text/javascript">
                $( \'textarea.content\' ).ckeditor();
            </script>';
    return $form;
}

