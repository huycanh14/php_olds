<?php 
class Database {

    protected $_connect;

    public function __construct()
    {
    	/*
    	$server = "localhost";
		$username = "root";
		$password = "";
		$database = 'quanlysinhvien_php1117e';
		$db = new mysqli($server, $username, $password, $database);
		$db->set_charset('utf8');
		if ($db->connect_error) {
		    exit('Lỗi kết nối: '.$db->connect_error);
		}
    	 */
        $this->_connect = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
        $this->_connect->set_charset('utf8');
        if ($this->_connect->connect_error) {
            die("Connection failed: " . $this->_connect->connect_error);
        }       
    }
}
?>