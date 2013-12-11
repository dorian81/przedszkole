<?php
function adm_list(){
    require_once 'sql.php';
    $sql = new sql();
    
    $result = $sql->select_admins();
    $admins = '<h2>Administratorzy</h2>
               <table border=1 cellspacing=0 cellpadding=2>
               <tr><th>L.P.</th><th>Imię i nazwisko</th><th>Login</th><th>Akcje</th></tr>';
    $i = 1;
    while ($row = mysql_fetch_assoc($result)){
        $admins .= '<tr><td>'.$i.'</td>
                        <td>'.$row['imie'].'&nbsp;'.$row['nazwisko'].'</td>
                        <td>'.$row['login'].'</td>
                        <td>
                            <a href="index.php?action=adm_edit&id='.$row['id'].'"><img src="assets/edit.png" alt="Edytuj"></a>
                            <a href="index.php?action=adm_pwd&id='.$row['id'].'">Zmień hasło</a>
                            <a href="#" onclick="javascript:adm_del('.$row['id'].')"><img src="assets/delete.png" alt="Usuń"></a>
                        </td>
                    </tr>';
        $i++;
    }
    $admins .= '</table>';
    return $admins;
}

function adm_new(){
    $form = '<h2>Nowy administrator</h2>
            <form action="save.php?action=adm_new" method="POST" id="adm_form">
                <table border="0" cellspacing="2" cellpadding="2">
                    <tr><td>Imię</td><td><input type="text" size="50" name="imie"></td></tr>
                    <tr><td>Nazwisko</td><td><input type="text" size="50" name="nazwisko"></td></tr>
                    <tr><td>Login</td><td><input type="text" size="20" name="login"></td></tr>
                    <tr><td>Hasło</td><td><input type="password" size="20" name="pass" id="p1"></td></tr>
                    <tr><td>Powtórz hasło</td><td><input type="password" size="20" name="conf" id="p2"></td></tr>
                </table>
                <input type="button" value="Zapisz" onclick="javascript:adm_validate()">
             </form>';
    return $form;
}

function adm_edit($id){
    require_once 'sql.php';
    $sql = new sql();
    $row = mysql_fetch_assoc($sql->select_adm($id));
    $form = '<h2>Edycja danych administratora '.$row['imie'].' '.$row['nazwisko'].'</h2>
            <form action="save.php?action=adm_edit" method="POST">
                <input type="hidden" name="id" value="'.$row['id'].'">
                <table border="0" cellspacing="2" cellpadding="2">
                    <tr><td>Imię</td><td><input type="text" size="50" name="imie" value="'.$row['imie'].'"></td></tr>
                    <tr><td>Nazwisko</td><td><input type="text" size="50" name="nazwisko" value="'.$row['nazwisko'].'"></td></tr>
                    <tr><td>Login</td><td><input type="text" size="50" name="login" value="'.$row['login'].'"></td></tr>
                </table>
                <input type="submit" value="Zapisz">
             </form>';
    return $form;
}

function adm_pwd($id){
    require_once 'sql.php';
    $sql = new sql();
    $row = mysql_fetch_assoc($sql->select_adm($id));
    $form = '<h2>Zmiana hasła administratora '.$row['imie'].' '.$row['nazwisko'].'</h2>
            <form action="save.php?action=adm_pwd" method="POST" id="adm_form">
                <input type="hidden" name="id" value="'.$row['id'].'">
                <table border="0" cellspacing="2" cellpadding="2">
                    <tr><td>Hasło</td><td><input type="password" size="20" name="pass" id="p1"></td></tr>
                    <tr><td>Powtórz hasło</td><td><input type="password" size="20" name="conf" id="p2"></td></tr>
                </table>
                <input type="button" value="Zapisz" onclick="javascript:adm_validate()">
             </form>';
    return $form;
}