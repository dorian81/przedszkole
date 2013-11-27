<?php
    require_once 'sql.php';

    function gal_form(){
        if (isset($_GET['gal'])){
            $gal=$_GET['gal'];
        }else{
            $gal='';
        }
        
        $form = '<h2>Nowa galeria</h2>
                 <form action ="save.php?action=gal_new" method="POST" enctype="multipart/form-data">
                    Nazwa <input type="text" name="name" value="'.$gal.'"><br>
                    Wybierz zdjęcie: <input type="file" name="file"><input type="button" value="Dodaj">
                 </form>';
        echo $form;
    }