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
        $q = 'SELECT * FROM sites;';
        $result = $this->query($q);
        return $result;
    }
    
    public function select_site($site){
        $q = 'SELECT * FROM sites WHERE link = "'.$site.'";';
        $result = $this->query($q);
        return mysql_fetch_assoc($result);
    }
    
    public function update($data){
        $q = 'UPDATE sites SET name = "'.$data['name'].'",link = "'.$data['link'].'", content = "'. addslashes($data['content']).'", style = "'.$data['style'].'" WHERE id='.$data['id'].';';
        return $this->query($q);
    }
    
    public function insert($data){
        $q = 'INSERT INTO sites (name, link, type, style, content) VALUES ("'.$data['name'].'","'.$data['link'].'","'.$data['type'].'","'.$data['style'].'","'.addslashes($data['content']).'");';
        return $this->query($q);
    }
    
    public function status($status,$link){
        $q = 'UPDATE sites SET active='.$status.' WHERE link="'.$link.'";';
        return $this->query($q);
    }
}