<?php session_start();
	include "function/databaseConnect.php";
	include 'function/security.php';
	include "main/header.php";
	unset($_SESSION['number']);
?>
	<script>
		function editButton()
		{
			document.write("<form action=editarticle.php><button name='edit' value='"+ String(window.location.search).substr(8) +"' class='btn btn-secondary'>Edit</button></form>");
		}
		function deleteButton()
		{
			document.write("<form method=post><button name='delete' class='btn btn-secondary'>Delete</button></form>");
		}
	</script>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/post-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
			<?php
				if(isset($_GET['number']))
				{
					$number = mysqli_real_escape_string($conn,sanitize($_GET['number']));
					if(ctype_digit($number))
					{
						$sql = "SELECT title, subtitle, writer, YEAR(tanggalTulis), MONTH(tanggalTulis), DAY(tanggalTulis) FROM `article` WHERE articleID =" . $number;
						$result = $conn->query($sql);
						if ($result->num_rows > 0)
						{
							while($row = $result->fetch_assoc())
							{
								$monthNum  = $row["MONTH(tanggalTulis)"];
								$dateObj   = DateTime::createFromFormat('!m', $monthNum);
								$monthName = $dateObj->format('F');
								echo '<h1>' .$row["title"]. '</h1>
								<h2 class="subheading">' .$row["subtitle"]. '</h2>
								<span class="meta">Posted by ' . $row["writer"] . ' on ' . $monthName . " " . $row["DAY(tanggalTulis)"] . ', ' . $row["YEAR(tanggalTulis)"] . '</span>';
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
				}
				else
				{
					echo '<h1>404 Not Found</h1>
					<h2 class="subheading">Aku Gak Pernah Nulis Itu :(</h2>';
				}
			?>
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
			if(isset($_GET['number']))
			{
				if(ctype_digit($number))
				{
					$sql = "SELECT content FROM `article` WHERE articleID = " . $number;
					$result = $conn->query($sql);
					if ($result->num_rows > 0)
					{
						while($row = $result->fetch_assoc())
						{
							if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"]))
							{
								$_SESSION['number'] = $number;
								echo '	<script>
											redirect("deletearticle.php");
										</script>';
							}
							echo '<p>' .nl2br($row["content"]). '</p>';
						}
						if(isset($_SESSION['login_user']))
						{
							echo '	<script>
										deleteButton();
										document.write("<br>");
										editButton();
									</script> ';
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