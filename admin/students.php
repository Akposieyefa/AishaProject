<?php
	include_once('../phpFolder/updateValidation.php');
	include_once("../phpFolder/selectClass.php");
	$student = new SelectDetails();
	$students = $student->studentDetails();
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title> Student's</title>
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
			<?php  include_once("nav.php");	?><br/><br/><br/><br/>
		<div class="container-fluid">
			<div class="col-12">
				<h5 class="text-center h3" ><em> All Student's</em></h5><br/>
				<div class="table-responsive">
					<table class="table table-striped table-lg table-border">
						<thead>
							<tr>
								<td><strong>serial</strong><br></td>
								<td><strong>First Name</strong></td>
								<td><strong>Last Name</strong></td>
								<td><strong>Matric Number</strong></td>
								<td><strong>Department</strong></td>
								<td><strong>Email</strong></td>
								<td><strong>Phone Number</strong></td>
								<td><strong>Date</strong></td>
								<td><strong>Action's<strong></td>
							</tr>
						</thead>
							<?php
							$i = 0;
							foreach ($students as $student)
								{
										$id        = @$student[0]['id'];
										$firstName   =  $student['firstName'];
										$lastName      = $student['lastName'];
										$matNumber      = $student['matNumber'];
										$department    	 =  $student['name'];
										$email   					=  $student['email'];
										$phone   					=  $student['phone'];
										$date  						 =  $student['date'];

										$i ++;

							?>
						<tbody>

							<div class="form">
								<form action="" method="POST">
									<tr>
										<input type="hidden" name="studentID" value="<?php echo $id;?>">
										<td><span style="background-color:#ff00bb;" class="badge" ><?php echo $i; ?></span></td>
										<td><?php echo $firstName; ?></td>
										<td><?php echo $lastName; ?></td>
										<td><?php echo $matNumber;?></td>
										<td><?php echo $department;?></td>
										<td><?php echo $email ;?></td>
										<td><?php echo $phone;?></td>
										<td><?php echo $date;?></td>
										<td>
											 <button class="btn btn-danger btn-sm" name="deleteS"> <i  class="fa fa-trash"></i> Delete</button>
										</td>
									</tr>
								</form>
							</div>

						<?php	}	?>
					</tbody>
				</table>
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
