<?php
	
	function find_all_actors(){
		global $db; 
		$sql = "SELECT FirstName, LastName FROM Actors GROUPBY FirstName, LastName ORDER BY LastName DESC;"; //make sure to correct the attributes 
		$result = db_query($db, $sql); 
		return $result; 
	}
	
	function rank_all_movies(){
		global $db; 
		$sql = "SELECT name FROM Rated GROUPBY name RANK BY rating";
		$result = db_query($db, $sql); 
		return $result; 
	}
	
	// implement other website functions 
?>