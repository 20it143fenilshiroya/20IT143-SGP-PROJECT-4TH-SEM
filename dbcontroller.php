<?php
class DBController {
	 private $server = "localhost";
     private $user = "root";
     private $pass = "";
     private $database = "login_register_pure_coding";
     private $connection = "";
	
	function __construct() {
		$conn = $this->connectDB();
		$this->connection = $conn;
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->server,$this->user,$this->pass,$this->database);
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->connection,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->connection,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>