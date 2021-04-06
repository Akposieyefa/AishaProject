<?php include_once('../libs/SendMailValidation.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>Mail</title>
		<link href="../layouts/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
		<link href="../layouts/fonts/css/font-awesome.min.css" rel="stylesheet" />
		<link href="../layouts/css/dashboard.css" rel="stylesheet" />
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
	<?php include_once('inc/nav.php');?><br/><br/><br/><br/>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<a href="../layouts/img/logo.jpg">
					<img class="mx-auto mb-4 rounded-circle d-block " src="../layouts/img/nacoss.jpg" alt="../layouts/img/nacoss.jpg" width="75px" height="75px" id="loginLog">
				</a>

				<form action="" method="post">
					<div class="mb-3">
						<label for="subject"><strong>Subject</strong></label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-legal"></i></span>
							</div>
							<input type="text" class="form-control form-control-lg" placeholder="Enter Subject" name="subject" />
						</div>
					</div>
					<label for="haddress"><strong>Message</strong></label>
						<textarea class="form-control" rows="6"  name="message" placeholder="Enter Message" id="message" name="message" /></textarea>
						<br/>
					<button class="btn btn-md btn-success btn-block"  name="send">Send Mail...</button>
				</form>
			</div>
		</div>
	</div><br/><br/><br/>
	<?php include_once("inc/footer.php"); ?>
    <script src="../layouts/jquery/jquery.js" type="text/javascript"></script>
    <script src="../layouts/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="../layouts/bootstrap/dist/assets/js/vendor/popper.min.js"></script>
    <script src="../layouts/bootsrap/js/bootstrap.min.js"></script>
</body>
</html>
