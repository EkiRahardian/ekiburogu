<?php session_start();
	include "function/databaseConnect.php";
	include 'function/security.php';
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
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Eki's Blog</title>
	<link rel="icon" type="image/gif" href="img/fifight.gif" />
	
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

  </head>

  <body>

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
				echo '<li class="nav-item">';
				echo '<a class="nav-link" href="logout.php">Log Out</a>';
				echo '</li>';
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
          <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
          <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
          <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
          <form name="sentMessage" novalidate>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Title</label>
                <input type="text" class="form-control" placeholder="Title" id="name" name="title" required data-validation-required-message="Judulnya apa?">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Subtitle</label>
                <input type="text" class="form-control" placeholder="Subtitle" id="email" name="subtitle" required data-validation-required-message="Mau cerita soal apa?">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Content</label>
                <textarea rows="10" class="form-control" placeholder="Content" id="message" name="content" required data-validation-required-message="Isinya apa?"></textarea>
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
              <button formmethod="post" class="btn btn-primary">Kirim</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="https://twitter.com/Nau_Rizzz">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.facebook.com/naufalrizky.r">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://github.com/EkiRahardian/">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; Eki's Blog 2018</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

  </body>

</html>
