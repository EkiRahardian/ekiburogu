<?php session_start();
	include "function/databaseConnect.php";
	include 'function/security.php';
	include "main/header.php";
	$failed = false;
	if(isset($_SESSION['login_user']))
	{
		echo'	<script type="text/javascript">
					redirect("index.php");
				</script>';
	}
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$encryptPassword = encrypt($_POST['pass']);
		$myusername = mysqli_real_escape_string($conn,sanitize($_POST['username']));
		$mypassword = mysqli_real_escape_string($conn,sanitize($encryptPassword)); 
		$sql = "SELECT username FROM administrator WHERE username = '$myusername' and password = '$mypassword'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
		if($count == 1)
		{
			$_SESSION['login_user'] = $myusername;
			echo'	<script type="text/javascript">
						redirect("index.php");
					</script>';
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
          <p>Cuman Eki yang boleh bikin, edit, atau hapus artikel, buktikan kalau kamu itu Eki!</p>
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