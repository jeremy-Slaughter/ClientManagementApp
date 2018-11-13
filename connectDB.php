<?php

function dbConnect()
  {
  	$dbName = "";
	$dbUser = "";
	$dbPassword ="";
	$dbHost = "";
	//Establishes connection to database 
	$conn = new mysqli($dbHost, $dbUser, $dbPassword,$dbName);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
} 
return $conn;
}

function dbClose($conn)
{
  $conn->close();
}
?>