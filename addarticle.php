<?php session_start();
	include "function/databaseConnect.php";
	include 'function/security.php';
	include "main/header.php";

	$success = false;
	$index = NULL;
	$user_check = $_SESSION['login_user'];
	$query = mysqli_query($conn,"SELECT username FROM administrator WHERE username = '$user_check'");
	$row = mysqli_fetch_array($query,MYSQLI_ASSOC);
	$login_session = $row['username'];
	if(!isset($user_check))
	{
		echo'	<script type="text/javascript">
					redirect("login.php");
				</script>';
	}
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		for ($x = 1; $x <= 1000; $x++)
		{
			$result = mysqli_query($conn,"SELECT articleID FROM article WHERE articleID = ".$x);
			if($result->num_rows == 0) {
				 $index = $x;
				 break;
			}
		}
		$thisTitle = mysqli_real_escape_string($conn,sanitize($_POST['title']));
		$thisSubtitle = mysqli_real_escape_string($conn,sanitize($_POST['subtitle']));
		$thisContent = mysqli_real_escape_string($conn,sanitize($_POST['content']));
		$sql = "INSERT INTO article (articleID, title, subtitle, content) VALUES ('$index','$thisTitle','$thisSubtitle','$thisContent');";
		$result = mysqli_query($conn,$sql);
		$success = true;
	}
	function sendSuccess()
	{
		echo "<div class='alert alert-success'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;
		</button>
		<strong>Artikelnya sudah dipos!</strong>
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
              <h1>Buat Artikel Baru</h1>
              <span class="subheading">Eki mau nulis apa hari ini?</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p>Monggo tulis apa yang kamu pikirkan sekarang, tapi jangan nulis yang aneh-aneh ya.</p>
          <form name="sentMessage" id="contactForm">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Title</label>
                <input type="text" class="form-control" placeholder="Title" id="name" name="title" required oninvalid="this.setCustomValidity('Judulnya apa?')"oninput="this.setCustomValidity('')">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Subtitle</label>
                <input type="text" class="form-control" placeholder="Subtitle" id="email" name="subtitle" required oninvalid="this.setCustomValidity('Mau cerita soal apa?')"oninput="this.setCustomValidity('')">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Content</label>
                <textarea rows="10" class="form-control" placeholder="Content" id="message" name="content" required oninvalid="this.setCustomValidity('Isinya apa?')"oninput="this.setCustomValidity('')"></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div></div>
            <div class="form-group">
			<?php
				if ($success == true)
				{
					sendSuccess();
				}
			?>
              <button formmethod="post" class="btn btn-primary" id="sendMessageButton">Buat</button>
            </div>
          </form>
        </div>
      </div>
    </div>
	<?php
	include 'main/footer.php';
	?>