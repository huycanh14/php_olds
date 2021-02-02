<?php 
class Database {

    protected $_connect;

    public function __construct()
    {
        $this->_connect = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
        $this->_connect->set_charset('utf8');
        if ($this->_connect->connect_error) {
            die("Connection failed: " . $this->_connect->connect_error);
        }       
    }
}
?>