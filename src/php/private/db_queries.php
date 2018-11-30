<?php
	
	function find_all_actors(){ //returns list of all actors
		global $db; 
		$sql = "SELECT firstName, lastName FROM actor ORDER BY(lastName) ASC;"; //make sure to correct the attributes 
		$result = db_query($db, $sql); 
		return $result; 
	}
	
	function rank_all_movies(){
		global $db; 
		$sql = "select movieName, AVG(rating) from israted group by(movieName) ORDER by(AVG(rating)) DESC;";
		$result = db_query($db, $sql); 
		return $result; 
	}
	
	function insert_rating($movieName, $rating){
		global $db;
		$sql = "INSERT INTO isRated SELECT NULL, m.id, m.name, m.genre, m.year,".$rating."FROM movie m where m.name='".$movieName."';";
		$result = db_query($db, $sql); 
		return $result;
	}
	// implement other website functions 
	function find_associated_movies($actorName){ //find movies belonging to actor
		global $db; 
		$firstAndLast = split(" ", $actorName); 
		$sql = "select movieName, movieGenre, movieYear from actsin a where a.actorFirstName='".$firstAndLast[0]."' AND a.actorLastName='".$firstAndLast[1]."';";
		$result = db_query($db, $sql); 
		return $result; 
	}
	
	function find_movies_by_genre($genre){
		global $db; 
		$sql = "select movieName, avg(rating) from israted where movieGenre='".$genre."' group by(movieName) order by(avg(rating)) asc;"
		$result = db_query($db, $sql);
		return $result; 
	}
?>