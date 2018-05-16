<?php session_start();
	if(session_destroy())
	{
		echo'	<script type="text/javascript">
					window.location.assign("https://" + window.location.hostname +"/ekiburogu/index.php");
				</script>';
	}
?>