<?php
class Profile {

	public $table = 'uprofiles';
	
	function Profile($fn, $ln, $em, $un, $pw){
		$servername = "mysql.cs.iastate.edu";
		$username = "dbu309ss3";
		$password = "MDE1MGYyODVi";
		$dbname = "db309ss3";
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		$sql = "SELECT id FROM uprofiles ORDER BY id DESC LIMIT 1";
		$result = $conn->query($sql);
		if(!result){$result = 0;}
		
		$this->id = $result;
		$this->fname = $fn;
		$this->lname = $ln;
		$this->email = $em;
		$this->username = $un;
		$this->password = $pw;
		
		$conn->close();
	}
	
	function insert(){
		$servername = "mysql.cs.iastate.edu";
		$username = "dbu309ss3";
		$password = "MDE1MGYyODVi";
		$dbname = "db309ss3";
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		$sql = "INSERT INTO uprofiles (fname, lname, email, username, password)
			VALUES ($this->fname, $this->lname, $this->email, $this->username, $this->password)";
		
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} 
		else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}
	
}
		
?>