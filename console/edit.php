<?php

function form($site){
    $sql = new sql;
    if ($site != 'new'){
        $data = $sql->select_site($site);
    }else{
        $data['id'] ='';
        $data['name'] ='';
        $data['type'] = 'text';
        $data['link'] = '';
        $data['style'] = 'bg1';
        $data['content'] = '';
        $data['active'] = 0;
    }
    $form = '
            <form action = "save.php?action=';
    $form .= ($site !='new' )?'update':'insert';
    $form .= '" method = "POST">
                <input type="hidden" name="id" value="'.$data['id'].'">
                <input type="hidden" name="type" value="'.$data['type'].'">
                Nazwa: <input type="text" width="20" name="name" value="'.$data['name'].'"> Link: <input type="text" width="20" name="link" value="'.$data['link'].'">
                Kolor: <select name="style">';
    for ($i=1;$i<12;$i++){
        $form .= '<option value="bg'.$i.'" class="bg'.$i.'"';
        $form .= ($data['style'] == 'bg'.$i)?' selected':'';
        $form .= '>'.$i.'</option>';
    }
    $form .= '  </select>';
    if ($site != 'new'){
        $form .= '<a href="save.php?action=';
        $form .= ($data['active'] == 1)?'deact':'act';
        $form .= '&link='.$data['link'].'"><img src = "assets/';
        $form .= ($data['active'] == 1)?'active.png':'inactive.png';
        $form .= '"></a>';
    }
    $form .= '<input type = "submit" value = "Zapisz"><br>
                Treść:<br>
                <textarea name="content" rows="40" cols="100">'.$data['content'].'</textarea>
            </form>';
    return $form;
}

