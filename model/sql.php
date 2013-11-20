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
    
    public function select($table){
        $q = 'SELECT * FROM '.$table;
        return $this->query($q);
    }
    
    public function select_site($site){
        $q = 'SELECT * FROM sites WHERE link = "'.$site.'";';
        return $this->to_array($q);
    }
    
    public function update ($data){
        $q = 'update sites set name = "'.$data['name'].'",link = "'.$data['link'].'", content = "'.$data['content'].'" where id=2;';
        return $this->query($q);
    }
}