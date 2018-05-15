<?php session_start();
	include "function/databaseConnect.php";
	include 'function/security.php';
	include "main/header.php";
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
	<?php
	include 'main/footer.php';
	?>