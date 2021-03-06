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
			$sql = "SELECT articleID, title, subtitle, writer, YEAR(tanggalTulis), MONTH(tanggalTulis), DAY(tanggalTulis)	 FROM `article` ORDER BY tanggalTulis DESC";
			$result = $conn->query($sql);
			if ($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					$monthNum  = $row["MONTH(tanggalTulis)"];
					$dateObj   = DateTime::createFromFormat('!m', $monthNum);
					$monthName = $dateObj->format('F');
					echo '<div class="post-preview">
						<a href="post.php?number=' .$row["articleID"]. '">
							<h2 class="post-title">'.
								$row["title"].
							'</h2>
							<h3 class="post-subtitle">'.
								$row["subtitle"].
							'</h3>
						</a>
						<p class="post-meta">Posted by ' . $row["writer"] . ' on ' . $monthName . " " . $row["DAY(tanggalTulis)"] . ', ' . $row["YEAR(tanggalTulis)"] . '</p>
					</div>
					<hr>';
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