<?php
class Database{
	
	private $host  = 'sql204.epizy.com';
    private $user  = 'epiz_26877943';
    private $password   = "pYLIZRktLbr";
    private $database  = "epiz_26877943_playground_notifications_system"; 
    
    public function getConnection(){		
		$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
		if($conn->connect_error){
			die("Error failed to connect to MySQL: " . $conn->connect_error);
		} else {
			return $conn;
		}
    }
}
?>