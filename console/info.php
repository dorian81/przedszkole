<?php
require_once 'sql.php';
function inf_form(){
    $sql = new sql;
    $action = $_GET['action'];
    
    if ($action == 'inf_new'){
        $data['id'] = '';
        $data['title'] = '';
        $data['date'] = date('Y-m-d H:i:s');
        $data['content'] = '';
    }else{
        $data = $sql->inf_select_inf($_GET['id']);
    }
    
    $form = '<h2>Nowa wiadomość</h2>
            <form action="save.php?action=';
    $form .= ($action == 'inf_new')?'in_new':'in_sav&id='.$data['id'];
    $form .= '" method="POST"><input type="hidden" name="id" value="'.$data['id'].'">
            Temat: <input type="text" value="'.$data['title'].'" name = "title"><input type = "submit" value = "';
    $form .= ($action == 'inf_new')?'Dodaj':'Zapisz';
    $form .= '"><br>
            Treść:<br>
            <textarea name = "content" rows = "5" cols = "80">'.$data['content'].'</textarea></form>';
    return $form;
}

function inf_list(){
    $sql = new sql;
    $result = $sql->select_info();
    while ($row = mysql_fetch_assoc($result)){
        $news[]=$row;
    }
    $form = '<h2>Lista wiadomości</h2>';
    foreach ($news as $info){
        $form .= '<strong>'.$info['title'].'</strong> '.date('d-m-Y H:m',strtotime($info['date'])).' <a href="index.php?action=inf_edit&id='.$info['id'].'">Edytuj</a> <a href = "save.php?action=in_del&id='.$info['id'].'">Usuń</a><br>'.$info['content'].'<br><br>';
    }
    return $form;
}
