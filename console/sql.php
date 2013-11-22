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
        $q = 'SELECT * FROM sites ORDER BY pos ASC;';
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
        $q = 'DELETE FROM sites WHERE id='.$id.';';
        return $this->query($q);
    }
    
    public function select_max_pos(){
        $q = 'SELECT MAX(pos) AS max FROM sites;';
        $result = $this->to_array($q);
        return $result['max'];
    }
    
    public function down($pos,$id){
        $new = $pos+1;
        $this->query('UPDATE sites SET pos='.$pos.' WHERE pos='.$new.';');
        $this->query('UPDATE sites SET pos='.$new.' WHERE id='.$id.';');
        return true;
    }
    
    public function up($pos,$id){
        $new = $pos-1;
        $this->query('UPDATE sites SET pos='.$pos.' WHERE pos='.$new.';');
        $this->query('UPDATE sites SET pos='.$new.' WHERE id='.$id.';');
        return true;
    }
    
    public function select_child($parrent){
        $q = 'SELECT * FROM sites WHERE parrent="'.$parrent.'";';
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
}