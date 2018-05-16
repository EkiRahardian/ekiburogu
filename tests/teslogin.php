<?php
	include '../function/databaseConnect.php';
	include '../function/security.php';
	
	$berhasil = false;
	$gagal = false;
	echo 'Test Log In<br><br>';
	function login_userbenarpasswordbenar()
	{
		echo 'username benar & password benar : ';
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
			$GLOBALS['berhasil'] = true;
		}
		else
		{
			echo 'Tes Masuk Gagal<br>';
		}
	}
	login_userbenarpasswordbenar();
	
	function login_usersalahpasswordsalah()
	{
		echo 'username salah & password salah: ';
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
			$GLOBALS['gagal'] = true;
		}
		else
		{
			echo 'Tes Masuk Gagal<br>';
		}
	}
	login_usersalahpasswordsalah();
	
	function login_userkosongpasswordkosong()
	{
		echo 'username kosong & password kosong: ';
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
			$GLOBALS['gagal'] = true;
		}
		else
		{
			echo 'Tes Masuk Gagal<br>';
		}
	}
	login_userkosongpasswordkosong();
	
	function login_usersalahpasswordbenar()
	{
		echo 'username salah & password benar: ';
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
			$GLOBALS['gagal'] = true;
		}
		else
		{
			echo 'Tes Masuk Gagal<br>';
		}
	}
	login_usersalahpasswordbenar();
	
	function login_usersalahpasswordkosong()
	{
		echo 'username salah & password kosong: ';
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
			$GLOBALS['gagal'] = true;
		}
		else
		{
			echo 'Tes Masuk Gagal<br>';
		}
	}
	login_usersalahpasswordkosong();
	
	function login_userbenarpasswordsalah()
	{
		echo 'username benar & password salah: ';
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
			$GLOBALS['gagal'] = true;
		}
		else
		{
			echo 'Tes Masuk Gagal<br>';
		}
	}
	login_userbenarpasswordsalah();
	
	function login_userbenarpasswordkosong()
	{
		echo 'username benar & password kosong: ';
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
			$GLOBALS['gagal'] = true;
		}
		else
		{
			echo 'Tes Masuk Gagal<br>';
		}
	}
	login_userbenarpasswordkosong();
	
	function login_userkosongpasswordbenar()
	{
		echo 'username kosong & password benar: ';
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
			$GLOBALS['gagal'] = true;
		}
		else
		{
			echo 'Tes Masuk Gagal<br>';
		}
	}
	login_userkosongpasswordbenar();
	
	function login_userkosongpasswordsalah()
	{
		echo 'username kosong & password salah: ';
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
			$GLOBALS['gagal'] = true;
		}
		else
		{
			echo 'Tes Masuk Gagal<br>';
		}
	}
	login_userkosongpasswordsalah();
	
	echo '<br>';
	if($berhasil == true && $gagal == false)
	{
		echo 'Testing berhasil, hanya kondisi username benar & password benar yang dibolehkan masuk ke sesi log in';
	}
	else
	{
		echo 'Testing gagal, ada kondisi selain username benar & password benar yang diperbolehkan masuk ke sesi log in, atau kondisi username benar & password benar tidak diperbolehkan login';
	}
?>