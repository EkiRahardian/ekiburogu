<?php session_start();
	include "function/databaseConnect.php";
	include "function/security.php";
	include "main/header.php";
	if(!isset($_SESSION['login_user']))
	{
		echo'	<script type="text/javascript">
					redirect("login.php");
				</script>';
	}
?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/post-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
				<?php
					if(isset($_GET['delete']))
					{
						$number = mysqli_real_escape_string($conn,sanitize($_GET['delete']));
						if(ctype_digit($number))
						{
							$sql = "SELECT title FROM `article` WHERE articleID = " . $number;
							$result = $conn->query($sql);
							if ($result->num_rows > 0)
							{
								echo '	<div class="post-heading">
											<h1>Hapus?</h1>
											<h2 class="subheading">Yakin mau dihapus?</h2>
										</div>';
							}
							else
							{
								echo '	<div class="post-heading">
												<h1>Hapus?</h1>
												<h2 class="subheading">Tunggu, mau hapus apa?</h2>
											</div>';
							}
						}
						else
						{
							echo '	<div class="post-heading">
											<h1>Hapus?</h1>
											<h2 class="subheading">Tunggu, mau hapus apa?</h2>
										</div>';
						}
					}
					else
					{
						echo '	<div class="post-heading">
										<h1>Hapus?</h1>
										<h2 class="subheading">Tunggu, mau hapus apa?</h2>
									</div>';
					}
				?>
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
					if($_SERVER["REQUEST_METHOD"] == "POST")
					{
						$sql2 = "DELETE FROM `article` WHERE articleID = " . $number;
						$result2 = $conn->query($sql2);
						echo'	<script type="text/javascript">
									redirect("index.php");
								</script>';
					}
					if(isset($number))
					{
						if(ctype_digit($number))
						{
							$sql = "SELECT title FROM `article` WHERE articleID = " . $number;
							$result = $conn->query($sql);
							if ($result->num_rows > 0)
							{
								while($row = $result->fetch_assoc())
								{
									echo '	<p>Setelah ini, artikelmu yang berjudul "' .$row["title"]. '" akan dihapus</p>';
								}
								echo '	<form method="post"><button class="btn btn-primary" id="sendMessageButton">Ya</button></form><br>
										<form action=post.php><button name=number value="' . $number . '" class="btn btn-primary" id="sendMessageButton">Tidak</button></form>';
							}
							else
							{
								echo '<p>Gak ada artikelnya kok main hapus-hapus aja...</p>';
							}
						}
						else
						{
							echo '<p>Gak ada artikelnya kok main hapus-hapus aja...</p>';
						}
					}
					else
					{
						echo '<p>Gak ada artikelnya kok main hapus-hapus aja...</p>';
					}
				?>

          </div>
        </div>
      </div>
    </article>
	<?php
	include 'main/footer.php';
	?>