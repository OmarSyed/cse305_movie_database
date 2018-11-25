<?php
	require_once('db_credentials.php');
	
	function connect_to_db(){ //connects to the database using the provided password 
		$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME); 
		if (mysqli_connect_errno()){
			$msg = "Database connection failed: ";
			$msg.= mysqli_connect_error();
			$msg.= " ( ". mysqli_connect_errno() . " ) ";
			exit($msg); 
		}
		return $connection; 
	}
	
	function db_query($connection, $sql) {
		$result_set = mysqli_query($connection, $sql);
		if(substr($sql, 0, 7) == 'SELECT ') {
		  confirm_query($result_set);
		}
		return $result_set;
	}
	
	function confirm_query($result_set) {
		if(!$result_set) {
		  exit("Database query failed.");
		}
	}
	
	function db_free_result($result_set) { //used when a result is no longer needed 
		return mysqli_free_result($result_set);
	}
	
	function db_escape($connection, $string) { //escapes special chars in mysql query
		return mysqli_real_escape_string($connection, $string);
	}
	
	function db_fetch_assoc($result_set) { //returns the result as an array
		return mysqli_fetch_assoc($result_set);
	}
	
	function db_close($connection) {
		return mysqli_close($connection);
	}
	
	
?>