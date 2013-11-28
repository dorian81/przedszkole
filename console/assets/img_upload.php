<?php
function upload_img($file){
    $img_name = $file['tmp_name'];
    $type = $file['type'];
    $name = $_SERVER['DOCUMENT_ROOT'].'/przedszkole/gals/'.$file['name'];
    $m_name = $_SERVER['DOCUMENT_ROOT'].'/przedszkole/gals/m/'.$file['name'];
    
    if ($type == "image/jpeg" || $type == "image/pjpeg"){
        if(!($img = imagecreatefromjpeg($img_name))){
		echo("Nie mogę otworzyć pliku:\"". $img_name."\"");
		return false;
	}else{
            list($szerokosc, $wysokosc) = getimagesize($img_name);
            if ($szerokosc>900){
                if ($szerokosc>$wysokosc){
                    $skala=$szerokosc/900;
                    $n_wysokosc=floor($wysokosc/$skala);
                    $n_szerokosc=900;
                }
            $tempImg = imagecreatetruecolor($n_szerokosc,$n_wysokosc);
            imagecopyresampled($tempImg, $img, 0, 0, 0, 0, $n_szerokosc, $n_wysokosc, $szerokosc, $wysokosc);
            imagejpeg($tempImg, $name);
            }else{
                move_uploaded_file($file['tmp_name'],$name);
            }
            if ($szerokosc>120){
                if ($szerokosc>$wysokosc){
                    $skala=$szerokosc/120;
                    $n_wysokosc=floor($wysokosc/$skala);
                    $n_szerokosc=120;
                }
                $tempImg = imagecreatetruecolor($n_szerokosc,$n_wysokosc);
                imagecopyresampled($tempImg, $img, 0, 0, 0, 0, $n_szerokosc, $n_wysokosc, $szerokosc, $wysokosc);
                imagejpeg($tempImg, $m_name);
            }else{
                move_uploaded_file($file['img']['tmp_name'],$m_name);
            }
            return true;
        }
    }
}


