<?php session_start();
	include "function/databaseConnect.php";
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
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Eki's Blog</h1>
              <span class="subheading">Monggo dibaca baca</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
		<?php
			//Menghitung jumlah row di tabel
			$sql = "SELECT * FROM `article`";
			$connStatus = $conn->query($sql);
			$numberOfRows = mysqli_num_rows($connStatus);
			$sql = "SELECT title, subtitle FROM `article`";
			$result = $conn->query($sql);
			if ($result->num_rows > 0)
			{
				$index = 0;
				while($row = $result->fetch_assoc())
				{
					echo '<div class="post-preview">';
						echo '<a href="post.php?number=' .$index. '">';
							echo '<h2 class="post-title">';
								echo $row["title"];
							echo '</h2>';
							echo '<h3 class="post-subtitle">';
								echo $row["subtitle"];
							echo '</h3>';
						echo '</a>';
					echo '</div>';
					echo '<hr>';
					$index++;
				}
			}
		?>
          <!-- Pager -->
        </div>
      </div>
    </div>
	<?php
	include 'main/footer.php';
	?>