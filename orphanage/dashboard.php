<!doctype html>
<html lang="en">
  <head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>Dashboard </title>
		<link href="../cssFolder/carousel.css" rel="stylesheet" />
		<link href="../bootstrapFolder/dist/css/bootstrap.min.css" rel="stylesheet" />
		<link href="../fonts/css/font-awesome.min.css" rel="stylesheet" />
		<?php
			session_start();
			$url = "../login.php";
			if ($_SESSION['user']) {
			$_SESSION['user'];
			}else{
				header("location:$url");
			}
		?>
	</head>
  <body>
	<?php
		include_once("nav.php");
	?>
    <main role="main">
        <div class="container">
        <div class="row">
        <div class="col-md-7 offset-md-3 col-sm-12">
					<br/><br/>
          <a href="imagesFolder/twetter.jpg">
              <img class="rounded-circle mx-auto d-block mb-4 " src="../imagesFolder/logo.jpg" alt="imagesFolder/logo.jpg" width="75px" height="75px" id="loginLog">
            </a>
					<h3 class="text-center"><em>Student Profile</em></h3>
				<table class="table table-sm table-boarderd">
					<tr>
						<td>
							<p>	<strong> First Name :</strong></p>
						</td>
						<td>
							<?php echo ($_SESSION['user'][1]);?>
						</td>
					</tr>
          <tr>
						<td>
							<p>	<strong> Last Name :</strong></p>
						</td>
						<td>
							<?php echo ($_SESSION['user'][2]);?>
						</td>
					</tr>
					<tr>
						<td>
							<p>	<strong> Matriculation Number :</strong></p>
						</td>
						<td>
						<?php echo strtoupper(($_SESSION['user'][3]));?>
						</td>
					</tr>
					<tr>
						<td>
							<p>	<strong>Email : </strong></p>
						</td>
						<td>
						<?php echo strtolower(($_SESSION['user'][5]));?>
						</td>
					</tr>
					<tr>
						<td>
							<p>	<strong>Phone Number: </strong></p>
						</td>
						<td>
						<?php echo strtolower(($_SESSION['user'][6]));?>
						</td>
					</tr>
					<tr>
						<td>
							<p>	<strong>Department: </strong></p>
						</td>
						<td>
						<?php echo ($_SESSION['user'][10]);?>
						</td>
					</tr>
          <tr>
						<td>

						</td>
						<td>
              <br/>
						     	<button class="btn btn-sm btn-success" type="submit" name="user" > Edit Details</button>
						</td>
					</tr>
				</table>
				</div>
        </div>
      </div>

	  <footer class="container">
        <p class='h6 text-center'>&copy; 2018-2019 Nigerian Army Institute of Technology</p>
      </footer>
    </main><br/><br/>


	<script src="../jqueryFolder/jquery.js" type="text/javascript"></script>
	<script src="../bootstrapFolder/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
	<script src="../bootstrapFolder/dist/assets/js/vendor/popper.min.js"></script>
	<script src="../bootsrapFolder/js/bootstrap.min.js"></script>

  </body>
</html>
