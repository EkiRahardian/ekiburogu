<?php session_start();
	include "function/databaseConnect.php";
	include 'function/sanitize.php';
	include "main/header.php";

	$success = false;
	$failure = false;
	if(!isset($_SESSION['login_user']))
	{
		echo'	<script type="text/javascript">
					redirect("login.php");
				</script>';
	}
	if(isset($_GET['edit']))
	{
		$getNumber = mysqli_real_escape_string($conn,sanitize($_GET['edit']));
		if(ctype_digit($getNumber))
		{
			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
				try
				{
					$thisTitle = mysqli_real_escape_string($conn,sanitize($_POST['title']));
					$thisSubtitle = mysqli_real_escape_string($conn,sanitize($_POST['subtitle']));
					$thisContent = mysqli_real_escape_string($conn,sanitize($_POST['content']));
					$sql = "UPDATE article SET title ='$thisTitle',subtitle ='$thisSubtitle',content='$thisContent', tanggalTulis=now() WHERE articleID =" . $getNumber . ";";
					$result = mysqli_query($conn,$sql);
					$success = true;
				}
				catch(Exception $e)
				{
					$failure = true;
				}
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
	function sendFailure()
	{
		echo "<div class='alert alert-danger'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;
		</button>
		<strong>Ada kesalahan ketika menyimpan perubahan!</strong>
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
				if(isset($_GET['edit']))
				{
					$number = mysqli_real_escape_string($conn,sanitize($_GET['edit']));
					if(ctype_digit($number))
					{
						$sql = "SELECT * FROM `article` WHERE articleID = " . $number;
						$result = $conn->query($sql);
						if ($result->num_rows > 0)
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
			if ($success == true)
			{
				sendSuccess();
			}
			else if ($failure == true)
			{
				sendFailure();
			}
			if(isset($number))
			{
				$number = mysqli_real_escape_string($conn,sanitize($number));
				if(ctype_digit($number))
				{
					$sql = "SELECT * FROM `article` WHERE articleID = " . $number;
					$result = $conn->query($sql);
					if ($result->num_rows > 0)
					{
						while($row = $result->fetch_assoc())
						{
							echo '
								  <p>Jangan lupa habis diedit klik tombol "Simpan", nanti artikelnya gak jadi ke edit lagi wkwkwkwk.</p>
								  <form name="sentMessage" id="contactForm" method="post">
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
									  <button  class="btn btn-primary" id="sendMessageButton">Simpan</button>
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