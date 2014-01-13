<?php
class sql{
    
    private $server = 'localhost';
    private $username = 'root';
    private $password = '';
    private $db_name = 'przedszkole';
    
    private function connect(){
        $connect = mysql_connect($this->server, $this->username, $this->password);
        mysql_select_db($this->db_name);
        return $connect;
    }
    
    private function query ($q){
        $db = $this->connect();
        mysql_query("set charset utf8; set names utf8;");
        $result = mysql_query($q);
        return $result;
        mysql_close($db);
    }
    
    private function to_array($q){
        return mysql_fetch_assoc($this->query($q));
    }
    
    public function select_sites(){
        $q = 'SELECT * FROM sites WHERE parrent = \'/\' ORDER BY pos ASC;';
        $result = $this->query($q);
        return $result;
    }
    
    public function select_site($site){
        $q = 'SELECT * FROM sites WHERE link = "'.$site.'";';
        $result = $this->query($q);
        return mysql_fetch_assoc($result);
    }
    
    public function select_pos($id){
        $q = 'SELECT pos FROM sites WHERE id = "'.$id.'";';
        $result = $this->query($q);
        return mysql_fetch_assoc($result);
    }
    
    public function update($data){
        $q = 'UPDATE sites SET name = "'.$data['name'].'",link = "'.$data['link'].'", content = "'. addslashes($data['content']).'", style = "'.$data['style'].'", type="'.$data['type'].'" WHERE id='.$data['id'].';';
        return $this->query($q);
    }
    
    public function insert($data){
        $q = 'INSERT INTO sites (name, link, type, style, content, pos, parrent) VALUES ("'.$data['name'].'","'.$data['link'].'","'.$data['type'].'","'.$data['style'].'","'.addslashes($data['content']).'",'.$data['pos'].',"'.$data['parrent'].'");';
        return $this->query($q);
    }
    
    public function status($status,$link){
        $q = 'UPDATE sites SET active='.$status.' WHERE link="'.$link.'";';
        return $this->query($q);
    }
    
    public function delete($id){
        $result = $this->query('SELECT pos,parrent FROM sites WHERE id = '.$id.';');
        $site = mysql_fetch_assoc($result);
        $q = $this->query('UPDATE sites SET pos = pos - 1 WHERE pos > '.$site['pos'].' AND parrent = \''.$site['parrent'].'\';');
        if ($q){
            $q = 'DELETE FROM sites WHERE id='.$id.';';
            return $this->query($q);
        }else {
            return false;
        }
    }
    
    public function select_max_pos(){
        $q = 'SELECT MAX(pos) AS max FROM sites WHERE parrent = \'/\';';
        $result = $this->to_array($q);
        return $result['max'];
    }
    
    public function select_max_pos_child($parent){
        $q = 'SELECT MAX(pos) AS max FROM sites WHERE parrent = \''.$parent.'\';';
        $result = $this->to_array($q);
        return $result['max'];
    }
    
    public function down($pos,$id){
        $new = $pos+1;
        $result = $this->query('SELECT parrent FROM sites WHERE id = '.$id.';');
        $parrent = mysql_fetch_assoc($result);
        $this->query('UPDATE sites SET pos='.$pos.' WHERE pos='.$new.' AND parrent = \''.$parrent['parrent'].'\';');
        $this->query('UPDATE sites SET pos='.$new.' WHERE id='.$id.' AND parrent = \''.$parrent['parrent'].'\';');
        return true;
    }
    
    public function up($pos,$id){
        $new = $pos-1;
        $result = $this->query('SELECT parrent FROM sites WHERE id = '.$id.';');
        $parrent = mysql_fetch_assoc($result);
        $this->query('UPDATE sites SET pos='.$pos.' WHERE pos='.$new.' AND parrent = \''.$parrent['parrent'].'\';');
        $this->query('UPDATE sites SET pos='.$new.' WHERE id='.$id.' AND parrent = \''.$parrent['parrent'].'\';');
        return true;
    }
    
    public function select_child($parrent){
        $q = 'SELECT * FROM sites WHERE parrent="'.$parrent.'" ORDER BY pos;';
        $result = $this->query($q);
        $children = array();
        if ($result){
            while ($row = mysql_fetch_assoc($result)){
                    $children[] = $row;
                }
        }
        return $children;
    }
    
    public function update_children($parrent,$style){
        $q = 'UPDATE sites SET style="'.$style.'" WHERE parrent="'.$parrent.'";';
        return $this->query($q);
    }
    
    public function inf_select_inf($id){
        $q = 'SELECT * FROM news WHERE id='.$id.';';
        return $this->to_array($q);
    }
    
    public function insert_info($data){
        $q = 'INSERT INTO news (title,content) VALUES ("'.addslashes($data['title']).'","'.addslashes($data['content']).'");';
        return $this->query($q);
    }
    
    public function select_info(){
        $q = 'SELECT * FROM news  ORDER BY date DESC;';
        return $this->query($q);
    }
    
    public function update_info($data){
        $q = 'UPDATE news SET title="'.addslashes($data['title']).'", content="'.addslashes($data['content']).'" WHERE id='.$data['id'].';';
        return $this->query($q);
    }
    
    public function info_delete($id){
        $q = 'DELETE FROM news WHERE id='.$id.';';
        return $this->query($q);
    }
    
    public function select_gal_names(){
        $q = 'SELECT DISTINCT(gal) FROM gals ORDER BY gal;';
        return $this->query($q);
    }
    
    public function insert_gal($name,$file){
        $q = 'INSERT INTO gals(img,gal,pos) VALUES ("'.$file.'","'.$name.'",1);';
        return$this->query($q);
    }
    
    public function select_gal($gal){
        $q = 'SELECT * FROM gals WHERE gal="'.$gal.'" ORDER BY pos ASC;';
        return $this->query($q);
    }
    
    public function select_max_gal_pos($gal){
        $q = 'SELECT MAX(pos) AS max FROM gals WHERE gal="'.$gal.'";';
        $result = $this->to_array($q);
        return $result['max'];
    }
    
    public function insert_photo($data){
        $q = 'INSERT INTO gals(img,gal,pos) VALUES ("'.$data['img'].'","'.$data['gal'].'",'.$data['pos'].');';
        return $this->query($q);
    }
    
    public function select_img_pos($id){
        $q = 'SELECT pos FROM gals WHERE id='.$id.';';
        $result = mysql_fetch_assoc($this->query($q));
        return $result['pos'];
    }
    
    public function gal_right($pos,$id){
        $new = $pos + 1;
        $this->query('UPDATE gals SET pos='.$pos.' WHERE pos='.$new.';');
        $this->query('UPDATE gals SET pos='.$new.' WHERE id='.$id.';');
        return true;
    }   
    
    public function gal_left($pos,$id){
        $new = $pos - 1;
        $this->query('UPDATE gals SET pos='.$pos.' WHERE pos='.$new.';');
        $this->query('UPDATE gals SET pos='.$new.' WHERE id='.$id.';');
        return true;
    }
    
    public function select_img($id){
        $q = 'SELECT img FROM gals WHERE id='.$id.';';
        $result = mysql_fetch_assoc($this->query($q));
        return $result['img'];
    }
    
    public function del_img($id){
        $q = 'DELETE FROM gals WHERE id='.$id.';';
        $result = $this->query($q);
        return $result;
    }
    
    public function select_admins(){
        $q = 'SELECT id, imie, nazwisko, login FROM admins;';
        $result = $this->query($q);
        return $result;
    }
    
    public function insert_adm($data){
        $q = 'INSERT INTO admins(imie,nazwisko,login,pass) VALUES ("'.$data['imie'].'","'.$data['nazwisko'].'","'.$data['login'].'","'.crypt($data['pass'],'przEdszk0le').'");';
        $result = $this->query($q);
        return $result;
    }
    
    public function check_login($login,$pass){
        $q = 'SELECT imie,nazwisko FROM admins WHERE login="'.$login.'" AND pass="'.crypt($pass,'przEdszk0le').'";';
        $result = $this->query($q);
        return $result;
    }
    
    public function select_adm($id){
        $q = 'SELECT id,imie,nazwisko,login FROM admins WHERE id='.$id.';';
        $result = $this->query($q);
        return $result;
    }
    
    public function update_adm($data){
        $q = 'UPDATE admins SET imie="'.$data['imie'].'", nazwisko="'.$data['nazwisko'].'", login="'.$data['login'].'" WHERE id='.$data['id'].';';
        $result = $this->query($q);
        return $result;
    }
    
    public function pwd($data){
        $q = 'UPDATE admins SET pass="'.crypt($data['pass'],'przEdszk0le').'" WHERE id='.$data['id'].';';
        $result = $this->query($q);
        return $result;
    }
    
    public function del_adm($id){
        $q = 'DELETE FROM admins WHERE id='.$id.';';
        $result = $this->query($q);
        return $result;
    }
    
}