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
        
        $form = '<h2>Edycja galerii '.$gal.'<a style="margin-left:10px;" href="#" onclick="javascript:del_gal(\''.$gal.'\')"><img src="assets/delete.png" alt="Usuń galerię"></a></h2>
                 <form action ="save.php?action=gal_save" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="MAX_FILE_SIZE" value="4000000" />
                    Wybierz zdjęcie: <input type="file" name="file"><input type="submit" value="Dodaj">
                    <input type="hidden" name="pos" value="'.($max_pos+1).'">
                    <input type="hidden" name="gal" value="'.$gal.'">
                 </form>
                 <br>
                 <table border="0" cellspacing="2"cellpadding="2">
                 ';
        $rc = 0;
        while ($row = mysql_fetch_assoc($result)){
            if ($rc == 0){
                $form.='<tr>';
            }
            $form .= '<td><div style="text-align:center;">';
            $form .= ($row['pos'] < $max_pos)?'<a class="right" href="save.php?action=gal_right&id='.$row['id'].'&gal='.$row['gal'].'"><img src="assets/right.png"></a>':'';
            $form .= '<a href="#" onclick="javascript:del_img('.$row['id'].',\''.$row['gal'].'\')"><img src="assets/delete.png" alt="Usuń"></a>';
            $form .= ($row['pos'] > 1)?'<a class="left" href="save.php?action=gal_left&id='.$row['id'].'&gal='.$row['gal'].'"><img src="assets/left.png"></a>':'';
            $form .= '</div><div><img src="../gals/m/'.$row['img'].'" class="gal"></div></td>';
            $rc++;
            if ($rc > 4){
                $rc = 0;
                $form .= '</tr>';
            }
        }   
        
        echo $form;
    }