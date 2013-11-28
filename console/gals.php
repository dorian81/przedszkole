<?php
    require_once 'sql.php';

    function gal_form($gal){
        $form = '<h2>Nowa galeria</h2>
                 <form action ="save.php?action=gal_new" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="MAX_FILE_SIZE" value="4000000" />
                    Nazwa <input type="text" name="name" value="'.$gal.'"><br>
                    Wybierz zdjęcie: <input type="file" name="file"><input type="submit" value="Dodaj">
                 </form>';
        echo $form;
    }
    
    function gal_edit($gal){
        $sql = new sql;
        $result = $sql->select_gal($gal);
        $max_pos = $sql->select_max_gal_pos($gal);
        
        $form = '<h2>Edycja galerii '.$gal.'</h2>
                 <form action ="save.php?action=gal_save" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="MAX_FILE_SIZE" value="4000000" />
                    Wybierz zdjęcie: <input type="file" name="file"><input type="submit" value="Dodaj">
                    <input type="hidden" name="pos" value="'.($max_pos+1).'">
                    <input type="hidden" name="gal" value="'.$gal.'">
                 </form>';
        while ($row = mysql_fetch_assoc($result)){
            $form .= '<img src="../gals/m/'.$row['img'].'" class="gal">';
        }
        echo $form;
    }