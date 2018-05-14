<?php session_start();
	include "function/databaseConnect.php";
	include 'function/security.php';
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
    <header class="masthead" style="background-image: url('img/post-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
			<?php
				$sql0 = "SELECT title, subtitle FROM `article` LIMIT 1 OFFSET " . sanitize($_GET['number']);
				$result = $conn->query($sql0);
				$host  = $_SERVER['HTTP_HOST'];
				$url   = rtrim(dirname(htmlspecialchars($_SERVER["PHP_SELF"])), '/\\');
				$redirect = 'index.php';
				if ($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						echo '<h1>' .$row["title"]. '</h1>';
						echo '<h2 class="subheading">' .$row["subtitle"]. '</h2>';
					}
				}
			?>
              
              <!--<span class="meta">Posted by
                <a href="#">Start Bootstrap</a>
                on August 24, 2018</span>-->
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
			<?php
				$sql = "SELECT content FROM `article` LIMIT 1 OFFSET ".sanitize($_GET['number']);
				$result = $conn->query($sql);
				if ($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						echo '<p>' .$row["content"]. '</p>';
						if($_SERVER["REQUEST_METHOD"] == "POST")
						{
							$sql2 = "DELETE FROM `article` WHERE content = '" . $row["content"] . "'";
							$result2 = $conn->query($sql2);
							header("Location: https://$host$url/$redirect");
						}
					}
				}
			?>
			<form action="#" method="post">
			<?php
		  	if(isset($_SESSION['login_user']))
			{
				echo '<button class="btn btn-secondary">Delete</button>';
			}
			?>
			</form>
          </div>
        </div>
      </div>
    </article>
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

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

  </body>

</html>
