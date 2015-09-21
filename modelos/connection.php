<?php

class Connection{
	public function EjecutaQuery($query)
	{
		//set server access variables

		$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="eventual";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());
		
		$result = mysqli_query($con,$query);
		
		mysqli_close($con);
		
		return $result;	
		
	}
	
}
?>
