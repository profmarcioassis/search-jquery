<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$nomeBD = "bdSeries";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $nomeBD);

	// Check connection
	if ($conn->connect_error) {
	    die("Falha na conexão: " . $conn->connect_error);
	} 
	//echo "Connected successfully";

?>