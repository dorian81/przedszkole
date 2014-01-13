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
        return $this->query($q);
    }
    
    public function select_site($site){
        $q = 'SELECT * FROM sites WHERE link = "'.$site.'";';
        return $this->to_array($q);
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
    
    public function select_info(){
        $q = 'SELECT * FROM news  ORDER BY date DESC;';
        return $this->query($q);
    }
    
    public function select_info_main(){
        $q = 'SELECT * FROM news ORDER BY date DESC LIMIT 5;';
        return $this->query($q);
    }
        
    public function select_gal($gal){
        $q = 'SELECT img FROM gals WHERE gal="'.$gal.'" ORDER BY pos ASC;';
        return $this->query($q);
    }
}