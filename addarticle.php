<?php session_start();
	include "function/databaseConnect.php";
	include 'function/security.php';
	include "main/header.php";
	$success = false;
	$host  = $_SERVER['HTTP_HOST'];
	$url   = rtrim(dirname(htmlspecialchars($_SERVER["PHP_SELF"])), '/\\');
	$redirect = 'login.php';
	$user_check = $_SESSION['login_user'];
	$query = mysqli_query($conn,"SELECT username FROM administrator WHERE username = '$user_check'");
	$row = mysqli_fetch_array($query,MYSQLI_ASSOC);
	$login_session = $row['username'];
	if(!isset($_SESSION['login_user']))
	{
		header("Location: https://$host$url/$redirect");
	}
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$thisTitle = mysqli_real_escape_string($conn,sanitize($_POST['title']));
		$thisSubtitle = mysqli_real_escape_string($conn,sanitize($_POST['subtitle']));
		$thisContent = mysqli_real_escape_string($conn,sanitize($_POST['content']));
		$sql = "INSERT INTO article (title, subtitle, content) VALUES ('$thisTitle','$thisSubtitle','$thisContent');";
		$result = mysqli_query($conn,$sql);
		$success = true;
	}
	function sendSuccess()
	{
		echo "<div class='alert alert-success'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;";
		echo "</button>";
		echo "<strong>Artikelnya sudah dipos!</strong>";
		echo "</div>";
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
              <h1>Buat Artikel Baru</h1>
              <span class="subheading">Eki mau nulis apa hari ini?</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p>Monggo tulis apa yang kamu pikirkan sekarang, tapi jangan nulis yang aneh-aneh ya.</p>
          <form name="sentMessage" id="contactForm">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Title</label>
                <input type="text" class="form-control" placeholder="Title" id="name" name="title" required oninvalid="this.setCustomValidity('Judulnya apa?')"oninput="this.setCustomValidity('')">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Subtitle</label>
                <input type="text" class="form-control" placeholder="Subtitle" id="email" name="subtitle" required oninvalid="this.setCustomValidity('Mau cerita soal apa?')"oninput="this.setCustomValidity('')">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Content</label>
                <textarea rows="10" class="form-control" placeholder="Content" id="message" name="content" required oninvalid="this.setCustomValidity('Isinya apa?')"oninput="this.setCustomValidity('')"></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div></div>
            <div class="form-group">
			<?php
				if ($success == true)
				{
					sendSuccess();
				}
			?>
              <button formmethod="post" class="btn btn-primary" id="sendMessageButton">Kirim</button>
            </div>
          </form>
        </div>
      </div>
    </div>
	<?php
	include 'main/footer.php';
	?>