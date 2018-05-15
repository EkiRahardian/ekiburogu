<?php session_start();
	include "function/databaseConnect.php";
	include 'function/security.php';
	include "main/header.php";
	$host  = $_SERVER['HTTP_HOST'];
	$failed = false;
	$url   = rtrim(dirname(htmlspecialchars($_SERVER["PHP_SELF"])), '/\\');
	$redirect = 'addarticle.php';
	if(isset($_SESSION['login_user']))
	{
		header("Location: https://$host$url/$redirect");
	}
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$encryptPassword = encrypt($_POST['pass']);
		$myusername = mysqli_real_escape_string($conn,sanitize($_POST['username']));
		$mypassword = mysqli_real_escape_string($conn,sanitize($encryptPassword)); 
		$sql = "SELECT username FROM administrator WHERE username = '$myusername' and password = '$mypassword'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$active = $row['active'];
		$count = mysqli_num_rows($result);
		if($count == 1)
		{
			$_SESSION['login_user'] = $myusername;
			header("Location: https://$host$url/$redirect");
		}
		else
		{
			$failed = true;
		}
	}
	function errorLogin()
	{
		echo "	<div class='alert alert-danger'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times
					</button>
					<strong>Your Username or Password is invalid!</strong>
				</div>	";
	}
?>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">Eki's Blog</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="addarticle.php">Buat Artikel Baru</a>
            </li>
			<?php
			if(isset($_SESSION['login_user']))
			{
				echo '	<li class="nav-item">
							<a class="nav-link" href="logout.php">Log Out</a>
						</li>	';
			}
			?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/contact-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1>Log In</h1>
              <span class="subheading">Kamu Eki bukan?.</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p>Cuman Eki yang boleh bikin artikel baru, buktikan kalau kamu itu Eki!</p>
          <form name="sentMessage" id="login">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="Username" id="username" name="username" required oninvalid="this.setCustomValidity('Username belum diisi')"oninput="this.setCustomValidity('')">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" id="password" name="pass" required oninvalid="this.setCustomValidity('Password belum diisi')"oninput="this.setCustomValidity('')">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div></div>
            <div class="form-group">
			<?php
				if ($failed == true)
				{
					errorLogin();
				}
			?>
              <button formmethod="post" class="btn btn-primary" id="sendMessageButton">Log In</button>
            </div>
          </form>
        </div>
      </div>
    </div>
	<?php
	include 'main/footer.php';
	?>