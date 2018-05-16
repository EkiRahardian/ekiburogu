<?php session_start();
	$host  = $_SERVER['HTTP_HOST'];
	$url   = rtrim(dirname(htmlspecialchars($_SERVER["PHP_SELF"])), '/\\');
	$redirect = 'index.php';
	if(session_destroy())
	{
		header("Location: https://$host$url/$redirect");	
	}
?>