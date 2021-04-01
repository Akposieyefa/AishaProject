<?php
	include_once('../phpFolder/updateValidation.php');
	include_once('../phpFolder/insertValidation.php');
	include_once("../phpFolder/selectClass.php");
	$complain = new  SelectDetails();
		if (isset($_GET['id'])) {
		$complainID = $_GET['id'];
		$student = $complain->individualComplains($complainID);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title> Complain's</title>
		<link href="../bootstrapFolder/dist/css/bootstrap.min.css" rel="stylesheet" />
		 <link href="../cssFolder/dashboard.css" rel="stylesheet" />
		<link href="../fonts/css/font-awesome.min.css" rel="stylesheet" />
		<?php
			session_start();
			$url = "../admin.php";
			if ($_SESSION['admin']) {
			$_SESSION['admin'];
			}else{
				header("location:$url");
			}
		?>
	</head>
<body>
	<?php include_once('nav.php');?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-7 offset-md-3"><br/><br/><br/><br/><br/>
				<div class="panel">
					<div class="panel-content">
						<div class="panel-header">
							<a href="../imagesFolder/nacoss.jpg">
								<img class="rounded-circle mx-auto d-block mb-4 " src="../imagesFolder/nacoss.jpg" alt="imagesFolder/logo.jpg" width="75px" height="75px" id="loginLog">
							</a>
						</div>
						<div class="panel-body">
							<p class="text-center h5"> <u>Content of Complain</u></p>
							<p class="text-center h4">
								<?php echo strtoupper($student[0]['subject']);?>
							</p><br/><br/>
							<p class="text-justify lead">
								<?php echo $student[0]['complainMessage'];?>
							</p>
							<form action="" method="POST">
							<input type="hidden" name="complainID" value="<?php echo $student[0]['id'];?>" />
							<input type="hidden" name="email" value="<?php echo $student[0]['email'];?>" />
								<div class="mb-3">
									<label for="message"><strong>Respond Info</strong></label>
									<textarea class="form-control" rows="6"  name="message" placeholder="Enter your complain " required /></textarea>
								</div>
								<hr class="mb-2">
								<button class="btn btn-info btn-md btn-block" type="submit" name="action">Respond  </button><br/>
							</form>
						</div>
					</div>
					<br><br>
				</div>
			</div>
		</div>
	</div>
	<?php include_once("footer.php"); ?>
	<script src="../jqueryFolder/jquery.js" type="text/javascript"></script>
	<script src="../bootstrapFolder/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
	<script src="../bootstrapFolder/dist/assets/js/vendor/popper.min.js"></script>
	<script src="../bootsrapFolder/js/bootstrap.min.js"></script>
</body>
</html>
<?php
		}
?>
