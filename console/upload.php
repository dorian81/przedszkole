<?php

function upl_list(){
    $entries = array();
    $list = '';
    if ($handle = opendir('../upload')) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                $entries[] = $entry;
            }
        }
        closedir($handle);

        if (count($entries) == 0){
            $list = '<h2>Brak plików</h2>';
        }else{
            $list = '<h2>Lista plików:</h2>
                     <table border="0" cellspacing="2" cellpadding="2">';
            foreach ($entries as $entry){
                $list .= '<tr><td><a href="../upload/'.$entry.'">'.$entry.'</a></td>
                              <td>
                                <a rel="#" onclick="javascript:del(\''.$entry.'\')"><img src="assets/delete.png" alt="Usuń"></a>&nbsp;
                                <a rel="#" onclick="javascript:cpy(\'http://'.$_SERVER['HTTP_HOST'].'/upload/'.$entry.'\')"><img src="assets/link.png" alt="Link"></a>
                              </td>
                          </tr>';
            }
        }
    }
    $list .= '</table><br><a href="index.php?action=upl_new"><img src="assets/new.png" alt="dodaj"></a>';
    echo $list;
}

function upl_form(){
    $form = '<h2>Nowy plik</h2><form action="save.php?action=upl" method="POST" enctype="multipart/form-data">
            Wybierz plik: <input type="file" name="file"><input type="submit" value="Dodaj">
            </form>';
    echo $form;
}

