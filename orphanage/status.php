<?php
	session_start();
    if(!isset($_SESSION['user']))
  { 
  header('location:index.php');
}else{

?>
<?php
	include_once('../phpFolder/updateValidation.php');
	include_once("../phpFolder/selectClass.php");
	$statu = new SelectDetails();
	if (isset($_GET['id'])) {
		$studentID = $_GET['id'];
		$status = $statu->studentViews($studentID);
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title> Status</title>
		<link href="../bootstrapFolder/dist/css/bootstrap.min.css" rel="stylesheet" />
		 <link href="../cssFolder/dashboard.css" rel="stylesheet" />
		<link href="../fonts/css/font-awesome.min.css" rel="stylesheet" />
	</head>
	<body>
			<?php
			  include_once("nav.php");
			?>
			<br/><br/><br/><br/>
		<div class="container-fluid">
			<div class="col-12">
				<h5 class="text-center h3" ><em>Complain Status</em></h5><br/>
				<div class="table-responsive">
					<table class="table table-striped table-sm table-border">
						<thead>
							<tr>
								<td><strong>serial</strong><br></td>
								<td><strong>Case Identity</strong></td>
								<td><strong>Email</strong></td>
								<td><strong>Subject</strong></td>
								<td><strong>Complain</strong></td>
								<td><strong>Date</strong></td>
								<td><strong>Status</strong></td>
								<td><strong>Action's<strong></td>
							</tr>
						</thead>
							<?php
							$i = 0;
							foreach ($status as $statu)
								{
										$sta   =  $statu['status'];
										$id        = $statu['id'];
										$caseID      = $statu['caseID'];
										$subject      = $statu['subject'];
										$email     =  $statu['email'];
										$complainMessage   =  $statu['complainMessage'];
										$caseDate   =  $statu['caseDate'];

										$i ++;

							?>
						<tbody>

							<div class="form">
								<form action="" method="POST">
									<tr>
										<input type="hidden" name="complainID" value="<?php echo $id;?>">
										<td><span style="background-color:#ff00bb;" class="badge" ><?php echo $i; ?></span></td>
										<td><?php echo $caseID; ?></td>
										<td><?php echo $subject; ?></td>
										<td><?php echo $email;?></td>
										<td><?php echo $complainMessage;?></td>
										<td><?php echo $caseDate;?></td>
										<td>
										<?php
										   if($sta === NULL){
											  ?>
											<span>
												<p>Pending</p>
											</span>
										<?php
										   }else{
											   ?>
											<span >
												<?php echo $sta;?>
											</span>
										<?php

										   }
										?>

										</td>
										<td>
											<button class="btn btn-danger" name="deleteC"> <i  class="fa fa-trash"></i> Delete</button>
										</td>
									</tr>
								</form>
							</div>

						<?php

							}
						?>
					</tbody>
				</table>
				</div>
			</div><br/><br/>
			<footer class="container">
				<p class='h6 text-center'>&copy; 2018-2019 Nigerian Army Institute of Technology</p>
			</footer>
		</div>
		<script src="../jqueryFolder/jquery.js" type="text/javascript"></script>
		<script src="../bootstrapFolder/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
		<script src="../bootstrapFolder/dist/assets/js/vendor/popper.min.js"></script>
		<script src="../bootsrapFolder/js/bootstrap.min.js"></script>
	</body>
</html>
<?php
}

}else{
	echo "
				<script>
					alert('You have not reported any complain ');
				</script>";
}
?>
