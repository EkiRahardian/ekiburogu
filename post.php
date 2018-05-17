<?php session_start();
	include "function/databaseConnect.php";
	include 'function/security.php';
	include "main/header.php";
?>
	<script>
		function editButton()
		{
			var number = String(window.location.search).substr(8);
			var editLink = "editarticle.php";
			document.write("<form action="+ editLink + "><button name='edit' value='"+ number +"' class='btn btn-secondary'>Edit</button></form>");
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
						$sql = "SELECT title, subtitle FROM `article` WHERE articleID =" . $number;
						$result = $conn->query($sql);
						if ($result->num_rows > 0)
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
							echo '<p>' .$row["content"]. '</p>';
							if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete']))
							{
								$sql2 = "DELETE FROM `article` WHERE articleID = " . $number;
								$result2 = $conn->query($sql2);
								echo'	<script type="text/javascript">
											redirect("index.php");
										</script>';
							}
						}
						if(isset($_SESSION['login_user']))
						{
							echo '	<form>
										<button formmethod="post" name="delete" class="btn btn-secondary">Delete</button>
									</form>
									<br>
									<script>
										editButton();
									</script>';
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