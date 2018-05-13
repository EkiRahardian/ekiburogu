<?php
	$servername = "localhost";
	$username = "naufalri_admin";
	$password = "kurangajar1803";
	$dbname = "naufalri_data";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}
?>