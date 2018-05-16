<?php session_start();
	include "function/databaseConnect.php";
	include 'function/security.php';
	include "main/header.php";

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
	if(isset($_GET['number']))
	{
		$getNumber = mysqli_real_escape_string($conn,sanitize($_GET['number']));
		if(ctype_digit($getNumber))
		{
			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
				$thisTitle = mysqli_real_escape_string($conn,sanitize($_POST['title']));
				$thisSubtitle = mysqli_real_escape_string($conn,sanitize($_POST['subtitle']));
				$thisContent = mysqli_real_escape_string($conn,sanitize($_POST['content']));
				$sql = "UPDATE article SET title ='$thisTitle',subtitle ='$thisSubtitle',content='$thisContent' WHERE articleID =" . $getNumber . ";";
				$result = mysqli_query($conn,$sql);
				$success = true;
			}
		}
	}
	function sendSuccess()
	{
		echo "<div class='alert alert-success'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;
		</button>
		<strong>Artikelnya sudah diedit!</strong>
		</div>";
	}
?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/contact-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
			<?php
				if(isset($_GET['number']))
				{
					$number0 = mysqli_real_escape_string($conn,sanitize($_GET['number']));
					if(ctype_digit($number0))
					{
						$hitungTable0 = "SELECT COUNT(*) FROM article";
						$hasilHitung0 = $conn->query($hitungTable0);
						$rowHasil0 = $hasilHitung0->fetch_assoc();;
						if ((int)$number0 < $rowHasil0['COUNT(*)'])
						{
								echo ' <h1>Edit Artikelnya</h1>
									   <span class="subheading">Ada yang typo? atau mau ngeralat?</span>';
						}
						else
						{
							echo '<h1>404 Not Found</h1>
							<span class="subheading">Gak ada artikelnya kok mau diedit :(</span>';
						}
					}
					else
					{
						echo '<h1>404 Not Found</h1>
						<span class="subheading">Gak ada artikelnya kok mau diedit :(</span>';
					}
				}
				else
				{
					echo '<h1>404 Not Found</h1>
					<span class="subheading">Gak ada artikelnya kok mau diedit :(</span>';
				}
			?>
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
			if(isset($_GET['number']))
			{
				$number = mysqli_real_escape_string($conn,sanitize($_GET['number']));
				if(ctype_digit($number))
				{
					$sql = "SELECT * FROM `article` WHERE articleID = " . $number;
					$hitungTable = "SELECT COUNT(*) FROM article";
					$hasilHitung = $conn->query($hitungTable);
					$rowHasil = $hasilHitung->fetch_assoc();
					$result = $conn->query($sql);
					if ($result->num_rows > 0 && (int)$number < $rowHasil['COUNT(*)'])
					{
						while($row = $result->fetch_assoc())
						{
							echo '
								  <p>Jangan lupa habis diedit klik tombol "Simpan", nanti artikelnya gak jadi ke edit lagi wkwkwkwk.</p>
								  <form name="sentMessage" id="contactForm">
									<div class="control-group">
									  <div class="form-group floating-label-form-group controls">
										<label>Title</label>
										<input type="text" value="'.$row["title"].'" class="form-control" placeholder="Title" id="name" name="title" required oninvalid="this.setCustomValidity("Judulnya apa?")"oninput="this.setCustomValidity('.')">
										<p class="help-block text-danger"></p>
									  </div>
									</div>
									<div class="control-group">
									  <div class="form-group floating-label-form-group controls">
										<label>Subtitle</label>
										<input type="text" value="'.$row["subtitle"].'" class="form-control" placeholder="Subtitle" id="email" name="subtitle" required oninvalid="this.setCustomValidity("Mau cerita soal apa?")"oninput="this.setCustomValidity('.')">
										<p class="help-block text-danger"></p>
									  </div>
									</div>
									<div class="control-group">
									  <div class="form-group floating-label-form-group controls">
										<label>Content</label>
										<textarea rows="10" class="form-control" placeholder="Content" id="message" name="content" required oninvalid="this.setCustomValidity("Isinya apa?")"oninput="this.setCustomValidity('.')">'.$row["content"].'</textarea>
										<p class="help-block text-danger"></p>
									  </div>
									</div>
									<br>
									<div></div>
									<div class="form-group">
							';
										if ($success == true)
										{
											sendSuccess();
										}
							echo '
									  <button formmethod="post" class="btn btn-primary" id="sendMessageButton">Simpan</button>
									</div>
								  </form>
							';
						}
					}
					else
					{
						echo '<p>Artikel yang mau kamu edit gak ada.</p>';
					}
				}
				else
				{
					echo '<p>Artikel yang mau kamu edit gak ada.</p>';
				}
			}
			else
			{
				echo '<p>Artikel yang mau kamu edit gak ada.</p>';
			}
		  ?>
        </div>
      </div>
    </div>
	<?php
	include 'main/footer.php';
	?>