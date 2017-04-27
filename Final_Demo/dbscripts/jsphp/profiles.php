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

function multi_insert($parr){
	
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
	
	$arrlength = count($parr);

	//loops throught an array of profiles and inserts them into the table.
	for($x = 0; $x < $arrlength; $x++) {

		$sql = "INSERT INTO uprofiles (fname, lname, email, username, password)
		VALUES ($parr[x]->fname, $parr[x]->lname, $parr[x]->email, $parr[x]->username, $parr[x]->password)";
		
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} 
		else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	$conn->close();
}
/*QUERIES*/

/* dangerous do not use please
function $servername = "mysql.cs.iastate.edu";
	$username = "dbu309ss3";
	$password = "MDE1MGYyODVi";
	$dbname = "db309ss3";
		

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
		
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} 
	else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();query($sql){
	
}
*/

function query_ten_profiles_by_fname($value){
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
	$sql = "SELECT * FROM uprofiles WHERE fname=$value ORDER BY id DESC LIMIT 10";
	
	$result = $conn->query($sql);
	if (!result) {
		echo "Error: " . $sql . "<br>" . $conn->error;
	} 
	else {
		echo "SUCCESS: ten most recent profiles selected by first name succesfully";
	}
	
	$encode = array();
	while($row = mysqli_fetch_assoc($result)){
		$encode[] = $row;
	}
	
	$ret = json_encode($encode);
	
	$result->close();
	$thread = $conn->thread_id;
	$conn->close();
	$conn->kill($thread);
	
	return $ret;
}

function query_ten_profiles_by_lname($value){
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
	$sql = "SELECT * FROM uprofiles WHERE lname=$value ORDER BY id DESC LIMIT 10";
	
	$result = $conn->query($sql);
	if (!result) {
		echo "Error: " . $sql . "<br>" . $conn->error;
	} 
	else {
		echo "SUCCESS: ten most recent profiles selected by last name succesfully";
	}
	
	$encode = array();
	while($row = mysqli_fetch_assoc($result)){
		$encode[] = $row;
	}
	
	$ret = json_encode($encode);
	
	$result->close();
	$thread = $conn->thread_id;
	$conn->close();
	$conn->kill($thread);
	
	return $ret;
}

function query_profiles_by_fname($value){
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
	$sql = "SELECT * FROM uprofiles WHERE fname=$value ORDER BY id DESC LIMIT 1";
	
	$result = $conn->query($sql);
	if (!result) {
		echo "Error: " . $sql . "<br>" . $conn->error;
	} 
	else {
		echo "SUCCESS: profile selected by first name succesfully";
	}
	
	$encode = array();
	while($row = mysqli_fetch_assoc($result)){
		$encode[] = $row;
	}
	
	$ret = json_encode($encode);
	
	$result->close();
	$thread = $conn->thread_id;
	$conn->close();
	$conn->kill($thread);
	
	return $ret;
}

function query_profiles_by_lname($value){
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
	$sql = "SELECT * FROM uprofiles WHERE lname=$value ORDER BY id DESC LIMIT 1";
	
	$result = $conn->query($sql);
	if (!result) {
		echo "Error: " . $sql . "<br>" . $conn->error;
	} 
	else {
		echo "SUCCESS: profile selected by last name succesfully";
	}
	
	$encode = array();
	while($row = mysqli_fetch_assoc($result)){
		$encode[] = $row;
	}
	
	$ret = json_encode($encode);
	
	$result->close();
	$thread = $conn->thread_id;
	$conn->close();
	$conn->kill($thread);
	
	return $ ret;
}

function query_profiles_by_id($value){
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
	$sql = "SELECT * FROM uprofiles WHERE id=$value ORDER BY id DESC LIMIT 1";
	
	$result = $conn->query($sql);
	if (!result) {
		echo "Error: " . $sql . "<br>" . $conn->error;
	} 
	else {
		echo "SUCCESS: profile selected by id succesfully";
	}
	
	$encode = array();
	while($row = mysqli_fetch_assoc($result)){
		$encode[] = $row;
	}
	
	$ret = json_encode($encode);
	
	$result->close();
	$thread = $conn->thread_id;
	$conn->close();
	$conn->kill($thread);
	
	return $ret;
}

function query_profiles_by_email($value){
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
	$sql = "SELECT * FROM uprofiles WHERE email=$value ORDER BY id DESC LIMIT 1";
	
	$result = $conn->query($sql);
	if (!result) {
		echo "Error: " . $sql . "<br>" . $conn->error;
	} 
	else {
		echo "SUCCESS: profile selected by email succesfully";
	}
	
	$encode = array();
	while($row = mysqli_fetch_assoc($result)){
		$encode[] = $row;
	}
	
	$ret = json_encode($encode);
	
	$result->close();
	$thread = $conn->thread_id;
	$conn->close();
	$conn->kill($thread);
	
	return $ret;
	
}

function query_profiles_email_by_id($value){
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
	$sql = "SELECT email FROM uprofiles WHERE id=$value ORDER BY id DESC LIMIT 1";
	
	$result = $conn->query($sql);
	if (!result) {
		echo "Error: " . $sql . "<br>" . $conn->error;
	} 
	else {
		echo "SUCCESS: a profile's email selected by id succesfully";
	}
	
	$encode = array();
	while($row = mysqli_fetch_assoc($result)){
		$encode[] = $row;
	}
	
	$ret = json_encode($encode);
	
	$result->close();
	$thread = $conn->thread_id;
	$conn->close();
	$conn->kill($thread);
	
	return $ret;
}

function query_profiles_fname_by_id($value){
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
	$sql = "SELECT fname FROM uprofiles WHERE id=$value ORDER BY id DESC LIMIT 1";
	
	$result = $conn->query($sql);
	if (!result) {
		echo "Error: " . $sql . "<br>" . $conn->error;
	} 
	else {
		echo "SUCCESS: a profile's first name selected by id succesfully";
	}
	
	$encode = array();
	while($row = mysqli_fetch_assoc($result)){
		$encode[] = $row;
	}
	
	$ret = json_encode($encode);
	
	$result->close();
	$thread = $conn->thread_id;
	$conn->close();
	$conn->kill($thread);
	
	return $ret;
}

function query_profiles_lname_by_id($value){
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
	$sql = "SELECT lname FROM uprofiles WHERE id=$value ORDER BY id DESC LIMIT 1";
	
	$result = $conn->query($sql);
	if (!result) {
		echo "Error: " . $sql . "<br>" . $conn->error;
	} 
	else {
		echo "SUCCESS: a profile's last name selected by id succesfully";
	}
	
	$encode = array();
	while($row = mysqli_fetch_assoc($result)){
		$encode[] = $row;
	}
	
	$ret = json_encode($encode);
	
	$result->close();
	$thread = $conn->thread_id;
	$conn->close();
	$conn->kill($thread);
	
	return $ret;
}

function query_profiles_username_by_id($value){
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
	$sql = "SELECT username FROM uprofiles WHERE id=$value ORDER BY id DESC LIMIT 1";
	
	$result = $conn->query($sql);
	if (!result) {
		echo "Error: " . $sql . "<br>" . $conn->error;
	} 
	else {
		echo "SUCCESS: a profile's username selected by id succesfully";
	}
	
	$encode = array();
	while($row = mysqli_fetch_assoc($result)){
		$encode[] = $row;
	}
	
	$ret = json_encode($encode);
	
	$result->close();
	$thread = $conn->thread_id;
	$conn->close();
	$conn->kill($thread);
	
	return $ret;
}

function query_profiles_id_by_username($value){
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
	$sql = "SELECT id FROM uprofiles WHERE username=$value ORDER BY id DESC LIMIT 1";
	
	$result = $conn->query($sql);
	if (!result) {
		echo "Error: " . $sql . "<br>" . $conn->error;
	} 
	else {
		echo "SUCCESS: a profile's id selected by username succesfully";
	}
	
	$encode = array();
	while($row = mysqli_fetch_assoc($result)){
		$encode[] = $row;
	}
	
	$ret = json_encode($encode);
	
	$result->close();
	$thread = $conn->thread_id;
	$conn->close();
	$conn->kill($thread);
	
	return $ret;
}

function query_profiles_password_by_username($value){
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
	$sql = "SELECT id FROM uprofiles WHERE username=$value ORDER BY id DESC LIMIT 1";
	
	$result = $conn->query($sql);
	if (!result) {
		echo "Error: " . $sql . "<br>" . $conn->error;
	} 
	else {
		echo "SUCCESS: a profile's password selected by username succesfully";
	}
	
	$encode = array();
	while($row = mysqli_fetch_assoc($result)){
		$encode[] = $row;
	}
	
	$ret = json_encode($encode);
	
	$result->close();
	$thread = $conn->thread_id;
	$conn->close();
	$conn->kill($thread);
	
	return $ret;
}

function query_profiles_password_by_id($value){
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
	$sql = "SELECT id FROM uprofiles WHERE username=$value ORDER BY id DESC LIMIT 1";
	
	$result = $conn->query($sql);
	if (!result) {
		echo "Error: " . $sql . "<br>" . $conn->error;
		$conn->close();
		return -1;
	} 
	else {
		echo "SUCCESS: a profile's password selected by id succesfully";
	}
	
	$encode = array();
	while($row = mysqli_fetch_assoc($result)){
		$encode[] = $row;
	}
	
	$ret = json_encode($encode);
	
	$result->close();
	$thread = $conn->thread_id;
	$conn->close();
	$conn->kill($thread);
	
	return $ret;
}

/*END QUERIES*/

/*BEGIN UPDATE*/

function update_profile_password_by_username($usr, $newp){
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
	$sql = "UPDATE uprofile SET password=$newp WHERE username=$usr";
	
	$result = $conn->query($sql);
	if (!result) {
		echo "Error: " . $sql . "<br>" . $conn->error;
		$conn->close();
		return -1;
	} 
	else {
		echo "SUCCESS: a profile's password selected by id succesfully";
	}
	
	$encode = array();
	while($row = mysqli_fetch_assoc($result)){
		$encode[] = $row;
	}
	
	$ret = json_encode($encode);
	
	$result->close();
	$thread = $conn->thread_id;
	$conn->close();
	$conn->kill($thread);
	
	return $ret;
}

function update_profile_password_by_id($iden, $newp){
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
	$sql = "UPDATE uprofile SET password=$newp WHERE id=$iden";
	
	$result = $conn->query($sql);
	if (!result) {
		echo "Error: " . $sql . "<br>" . $conn->error;
		$conn->close();
		return -1;
	} 
	else {
		echo "SUCCESS: a profile's password selected by id succesfully";
	}
	
	$encode = array();
	while($row = mysqli_fetch_assoc($result)){
		$encode[] = $row;
	}
	
	$ret = json_encode($encode);
	
	$result->close();
	$thread = $conn->thread_id;
	$conn->close();
	$conn->kill($thread);
	
	return $ret;
}

function update_profile_fname_by_id($iden, $fn){
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
	$sql = "UPDATE uprofile SET fname=$fn WHERE id=$iden";
	
	$result = $conn->query($sql);
	if (!result) {
		echo "Error: " . $sql . "<br>" . $conn->error;
		$conn->close();
		return -1;
	} 
	else {
		echo "SUCCESS: a profile's password selected by id succesfully";
	}
	
	$encode = array();
	while($row = mysqli_fetch_assoc($result)){
		$encode[] = $row;
	}
	
	$ret = json_encode($encode);
	
	$result->close();
	$thread = $conn->thread_id;
	$conn->close();
	$conn->kill($thread);
	
	return $ret;
}

function update_profile_lname_by_id($iden, $ln){
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
	$sql = "UPDATE uprofile SET lname=$ln WHERE id=$iden";
	
	$result = $conn->query($sql);
	if (!result) {
		echo "Error: " . $sql . "<br>" . $conn->error;
		$conn->close();
		return -1;
	} 
	else {
		echo "SUCCESS: a profile's password selected by id succesfully";
	}
	
	$encode = array();
	while($row = mysqli_fetch_assoc($result)){
		$encode[] = $row;
	}
	
	$ret = json_encode($encode);
	
	$result->close();
	$thread = $conn->thread_id;
	$conn->close();
	$conn->kill($thread);
	
	return $ret;
}

function update_profile_username_by_id($iden, $usrnm){
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
	$sql = "UPDATE uprofile SET username=$usrnm WHERE id=$iden";
	
	$result = $conn->query($sql);
	if (!result) {
		echo "Error: " . $sql . "<br>" . $conn->error;
		$conn->close();
		return -1;
	} 
	else {
		echo "SUCCESS: a profile's password selected by id succesfully";
	}
	
	$encode = array();
	while($row = mysqli_fetch_assoc($result)){
		$encode[] = $row;
	}
	
	$ret = json_encode($encode);
	
	$result->close();
	$thread = $conn->thread_id;
	$conn->close();
	$conn->kill($thread);
	
	return $ret;
}

function update_profile_email_by_id($iden, $em){
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
	$sql = "UPDATE uprofile SET email=$em WHERE id=$iden";
	
	$result = $conn->query($sql);
	if (!result) {
		echo "Error: " . $sql . "<br>" . $conn->error;
		$result->close();
		$conn->close();
		return -1;
	} 
	else {
		echo "SUCCESS: a profile's password selected by id succesfully";
	}
	
	$encode = array();
	while($row = mysqli_fetch_assoc($result)){
		$encode[] = $row;
	}
	
	$ret = json_encode($encode);
	
	$result->close();
	$thread = $conn->thread_id;
	$conn->close();
	$conn->kill($thread);
	
	return $ret;
}
/*END UPDATE*/

/*DELETE ROW*/
function delete_profile_by_id($iden){
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
	$sql = "DELETE FROM uprofile WHERE id=$iden";
	
	$result = $conn->query($sql);
	if (!result) {
		echo "Error: " . $sql . "<br>" . $conn->error;
		$result->close();
		$thread = $conn->thread_id;
		$conn->close();
		$conn->kill($thread);
		return -1;
	} 
	else {
		echo "SUCCESS: a profile's password selected by id succesfully";
	}
	
	$encode = array();
	while($row = mysqli_fetch_assoc($result)){
		$encode[] = $row;
	}
	
	$ret = json_encode($encode);
	
	$result->close();
	$thread = $conn->thread_id;
	$conn->close();
	$conn->kill($thread);
	
	return $ret;
}

/*DELETE END*/

/*ETC*/
function check_password($usr, $pass){
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
	$sql = "SELECT password FROM uprofiles WHERE username= $usr LIMIT 1";
	
	$result = $conn->query($sql);
	if (!result) {
		echo "Error: " . $sql . "<br>" . $conn->error;
		$result->close();
		$thread = $conn->thread_id;
		$conn->close();
		$conn->kill($thread);
		return -1;
	} 
	else {
		echo "SUCCESS: a profile's password selected by id succesfully";
	}
	
	$encode = array();
	while($row = mysqli_fetch_assoc($result)){
		$encode[] = $row;
	}
	
	$ret = json_encode($encode);
	
	$result->close();
	$thread = $conn->thread_id;
	$conn->close();
	$conn->kill($thread);
	
	return $ret;
}
?>