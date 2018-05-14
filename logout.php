<?php session_start();?>
<?php
	$host  = $_SERVER['HTTP_HOST'];
	$url   = rtrim(dirname(htmlspecialchars($_SERVER["PHP_SELF"])), '/\\');
	$redirect = 'login.php';
	if(session_destroy())
	{
		header("Location: https://$host$url/$redirect");	
	}
?>