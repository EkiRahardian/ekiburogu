<?php session_start();
	include "function/databaseConnect.php";
	include 'function/security.php';
	include "main/header.php";
?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/post-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
			<?php
				$number0 = mysqli_real_escape_string($conn,sanitize($_GET['number']));
				if(ctype_digit($number0))
				{
					$sql0 = "SELECT title, subtitle FROM `article` LIMIT 1 OFFSET " . $number0;
					$hitungTable0 = "SELECT COUNT(*) FROM article";
					$hasilHitung0 = $conn->query($hitungTable0);
					$rowHasil0 = $hasilHitung0->fetch_assoc();
					$result = $conn->query($sql0);
					if ($result->num_rows > 0 && (int)$number0 <= $rowHasil0['COUNT(*)'])
					{
						while($row = $result->fetch_assoc())
						{
							echo '<h1>' .$row["title"]. '</h1>
							<h2 class="subheading">' .$row["subtitle"]. '</h2>';
						}
					}
					else
					{
						echo '<h1>404 Not Found</h1>
						<h2 class="subheading">Aku Gak Pernah Nulis Itu :(</h2>';
					}
				}
				else
				{
					echo '<h1>404 Not Found</h1>
					<h2 class="subheading">Aku Gak Pernah Nulis Itu :(</h2>';
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
				$host  = $_SERVER['HTTP_HOST'];
				$url   = rtrim(dirname(htmlspecialchars($_SERVER["PHP_SELF"])), '/\\');
				$redirect = 'index.php';
				$number = mysqli_real_escape_string($conn,sanitize($_GET['number']));
				if(ctype_digit($number))
				{
					$sql = "SELECT content FROM `article` LIMIT 1 OFFSET ". $number;
					$hitungTable = "SELECT COUNT(*) FROM article";
					$hasilHitung = $conn->query($hitungTable);
					$rowHasil = $hasilHitung0->fetch_assoc();
					$result = $conn->query($sql);
					if ($result->num_rows > 0  && $number <= $rowHasil0['COUNT(*)'])
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
						if(isset($_SESSION['login_user']))
						{
							echo '	<form action="#" method="post">
										<button class="btn btn-secondary">Delete</button>
									</form>';
						}
					}
					else
					{
						echo '<p>Coba cari lagi dengan mengklik "Home" di kanan atas halaman.</p>';
					}
				}
				else
				{
					echo '<p>Coba cari lagi dengan mengklik "Home" di kanan atas halaman.</p>';
				}
			?>
          </div>
        </div>
      </div>
    </article>
	<?php
	include 'main/footer.php';
	?>