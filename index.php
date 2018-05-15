<?php session_start();
	include "function/databaseConnect.php";
	include "main/header.php";
?>
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
					echo '<div class="post-preview">
						<a href="post.php?number=' .$index. '">
							<h2 class="post-title">'.
								$row["title"].
							'</h2>
							<h3 class="post-subtitle">'.
								$row["subtitle"].
							'</h3>
						</a>
					</div>
					<hr>';
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