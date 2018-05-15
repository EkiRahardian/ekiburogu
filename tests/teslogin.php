<?php
	include '../function/databaseConnect.php';
	include '../function/security.php';
	
	$berhasil = 0;
	function login_userbenarpasswordbenar()
	{
		echo 'user benar password benar : ';
		$encryptPassword = encrypt('ekikurangajar');
		$myusername = mysqli_real_escape_string($GLOBALS['conn'],sanitize('ekirahardian'));
		$mypassword = mysqli_real_escape_string($GLOBALS['conn'],sanitize($encryptPassword)); 
		$sql = "SELECT username FROM administrator WHERE username = '$myusername' and password = '$mypassword'";
		$result = mysqli_query($GLOBALS['conn'],$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
		if($count == 1)
		{
			echo 'Tes Masuk Berhasil<br>';
			$GLOBALS['berhasil']++;
		}
		else
		{
			echo 'Tes Masuk Gagal<br>';
		}
	}
	login_userbenarpasswordbenar();
	
	function login_usersalahpasswordsalah()
	{
		echo 'user salah password salah: ';
		$encryptPassword = encrypt('ekikurangajar123');
		$myusername = mysqli_real_escape_string($GLOBALS['conn'],sanitize('ekirahardian123'));
		$mypassword = mysqli_real_escape_string($GLOBALS['conn'],sanitize($encryptPassword)); 
		$sql = "SELECT username FROM administrator WHERE username = '$myusername' and password = '$mypassword'";
		$result = mysqli_query($GLOBALS['conn'],$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$count = mysqli_num_rows($result);
		if($count == 1)
		{
			echo 'Tes Masuk Berhasil<br>';
			$GLOBALS['berhasil']++;
		}
		else
		{
			echo 'Tes Masuk Gagal<br>';
		}
	}
	login_usersalahpasswordsalah();
	
	function login_userkosongpasswordkosong()
	{
		echo 'user kosong password kosong: ';
		$encryptPassword = encrypt('');
		$myusername = mysqli_real_escape_string($GLOBALS['conn'],sanitize(''));
		$mypassword = mysqli_real_escape_string($GLOBALS['conn'],sanitize($encryptPassword)); 
		$sql = "SELECT username FROM administrator WHERE username = '$myusername' and password = '$mypassword'";
		$result = mysqli_query($GLOBALS['conn'],$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$count = mysqli_num_rows($result);
		if($count == 1)
		{
			echo 'Tes Masuk Berhasil<br>';
			$GLOBALS['berhasil']++;
		}
		else
		{
			echo 'Tes Masuk Gagal<br>';
		}
	}
	login_userkosongpasswordkosong();
	
	function login_usersalahpasswordbenar()
	{
		echo 'user salah password benar: ';
		$encryptPassword = encrypt('ekikurangajar');
		$myusername = mysqli_real_escape_string($GLOBALS['conn'],sanitize('ekirahardian123'));
		$mypassword = mysqli_real_escape_string($GLOBALS['conn'],sanitize($encryptPassword)); 
		$sql = "SELECT username FROM administrator WHERE username = '$myusername' and password = '$mypassword'";
		$result = mysqli_query($GLOBALS['conn'],$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$count = mysqli_num_rows($result);
		if($count == 1)
		{
			echo 'Tes Masuk Berhasil<br>';
			$GLOBALS['berhasil']++;
		}
		else
		{
			echo 'Tes Masuk Gagal<br>';
		}
	}
	login_usersalahpasswordbenar();
	
	function login_usersalahpasswordkosong()
	{
		echo 'user salah password kosong: ';
		$encryptPassword = encrypt('');
		$myusername = mysqli_real_escape_string($GLOBALS['conn'],sanitize('ekirahardian123'));
		$mypassword = mysqli_real_escape_string($GLOBALS['conn'],sanitize($encryptPassword)); 
		$sql = "SELECT username FROM administrator WHERE username = '$myusername' and password = '$mypassword'";
		$result = mysqli_query($GLOBALS['conn'],$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$count = mysqli_num_rows($result);
		if($count == 1)
		{
			echo 'Tes Masuk Berhasil<br>';
			$GLOBALS['berhasil']++;
		}
		else
		{
			echo 'Tes Masuk Gagal<br>';
		}
	}
	login_usersalahpasswordkosong();
	
	function login_userbenarpasswordsalah()
	{
		echo 'user benar password salah: ';
		$encryptPassword = encrypt('ekikurangajar123');
		$myusername = mysqli_real_escape_string($GLOBALS['conn'],sanitize('ekirahardian'));
		$mypassword = mysqli_real_escape_string($GLOBALS['conn'],sanitize($encryptPassword)); 
		$sql = "SELECT username FROM administrator WHERE username = '$myusername' and password = '$mypassword'";
		$result = mysqli_query($GLOBALS['conn'],$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$count = mysqli_num_rows($result);
		if($count == 1)
		{
			echo 'Tes Masuk Berhasil<br>';
			$GLOBALS['berhasil']++;
		}
		else
		{
			echo 'Tes Masuk Gagal<br>';
		}
	}
	login_userbenarpasswordsalah();
	
	function login_userbenarpasswordkosong()
	{
		echo 'user benar password kosong: ';
		$encryptPassword = encrypt('');
		$myusername = mysqli_real_escape_string($GLOBALS['conn'],sanitize('ekirahardian'));
		$mypassword = mysqli_real_escape_string($GLOBALS['conn'],sanitize($encryptPassword)); 
		$sql = "SELECT username FROM administrator WHERE username = '$myusername' and password = '$mypassword'";
		$result = mysqli_query($GLOBALS['conn'],$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$count = mysqli_num_rows($result);
		if($count == 1)
		{
			echo 'Tes Masuk Berhasil<br>';
			$GLOBALS['berhasil']++;
		}
		else
		{
			echo 'Tes Masuk Gagal<br>';
		}
	}
	login_userbenarpasswordkosong();
	
	function login_userkosongpasswordbenar()
	{
		echo 'user kosong password benar: ';
		$encryptPassword = encrypt('ekikurangajar');
		$myusername = mysqli_real_escape_string($GLOBALS['conn'],sanitize(''));
		$mypassword = mysqli_real_escape_string($GLOBALS['conn'],sanitize($encryptPassword)); 
		$sql = "SELECT username FROM administrator WHERE username = '$myusername' and password = '$mypassword'";
		$result = mysqli_query($GLOBALS['conn'],$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$count = mysqli_num_rows($result);
		if($count == 1)
		{
			echo 'Tes Masuk Berhasil<br>';
			$GLOBALS['berhasil']++;
		}
		else
		{
			echo 'Tes Masuk Gagal<br>';
		}
	}
	login_userkosongpasswordbenar();
	
	function login_userkosongpasswordsalah()
	{
		echo 'user kosong password salah: ';
		$encryptPassword = encrypt('ekikurangajar123');
		$myusername = mysqli_real_escape_string($GLOBALS['conn'],sanitize(''));
		$mypassword = mysqli_real_escape_string($GLOBALS['conn'],sanitize($encryptPassword)); 
		$sql = "SELECT username FROM administrator WHERE username = '$myusername' and password = '$mypassword'";
		$result = mysqli_query($GLOBALS['conn'],$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$count = mysqli_num_rows($result);
		if($count == 1)
		{
			echo 'Tes Masuk Berhasil<br>';
			$GLOBALS['berhasil']++;
		}
		else
		{
			echo 'Tes Masuk Gagal<br>';
		}
	}
	login_userkosongpasswordsalah();
	
	echo '<br>';
	if($berhasil == 1)
	{
		echo 'Testing berhasil, hanya kondisi username benar dan password benar yang dibolehkan masuk ke sesi log in';
	}
	else
	{
		echo 'Testing gagal, ada kondisi selain username benar dan password benar yang dibolehkan masuk ke sesi log in';
	}
?>