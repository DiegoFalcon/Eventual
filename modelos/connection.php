<?php

class Connection{
	public function EjecutaQuery($query)
	{
		//set server access variables
		$host="127.0.0.1";
		$user = "root";
		$pass = "";
		$db="eventual";
		
		//open connection
		
		$connection = mysqli_connect($host,$user,$pass,$db) or die ("Unable to connect!");
		
		$result = mysqli_query($connection,$query);
		
		mysqli_close($connection);
		
		return $result;	
		
	}
	
}
?>
