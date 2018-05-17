<!DOCTYPE html>
<html lang='en'>
<head>
</head>
<body>
	<script src='js/custom-function.js'></script>
	<?php session_start();
		session_destroy();
		echo '	<script type="text/javascript">
					redirect("index.php");
				</script>';
	?>
</body>
</html>