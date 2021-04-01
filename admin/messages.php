<?php
    include_once('../libs/classes/Contact.php');
    $message = new Contact();
    $messages = $message->index();
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title> Message's</title>
		<link href="../layouts/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
		<link href="../layouts/fonts/css/font-awesome.min.css" rel="stylesheet" />
		<link href="../layouts/css/dashboard.css" rel="stylesheet" />
		<?php
			session_start();
			$url = "../admin.php";
			if ($_SESSION['admin']) {
				$_SESSION['admin'];
			} else {
				header("location:$url");
			}
		?>
	</head>
	<body>
		<?php  include_once("inc/nav.php");?>	<br/><br/><br/><br/>
		<div class="container-fluid">
			<div class="col-12">
				<h5 class="text-center h3" ><em>Message's</em></h5><br/>
				<div class="table-responsive">
					<table class="table table-striped table-lg table-border">
						<thead>
							<tr>
								<td><strong>sNo</strong><br></td>
								<td><strong>Name</strong></td>
								<td><strong>Email</strong></td>
								<td><strong>Subject</strong></td>
								<td><strong>Message</strong></td>
								<td><strong>Date</strong></td>
								<td><strong>Status</strong></td>
								<td><strong>Action's<strong></td>
							</tr>
						</thead>
						<tbody>
							<?php $i= 1;?>
							<div class="form">
							<?php  foreach ($messages as $message):?>
								<form action="" method="POST">
									<tr>
										<input type="hidden" name="messageID" value="<?php echo $id; ?>">
										<td><span style="background-color:#ff00bb;" class="badge" ><?php echo $i++; ?></span></td>
										<td><?php echo $message["name"]; ?></td>
										<td><?php echo $message["email"]; ?></td>
										<td><?php echo $message["subject"];?></td>
										<td><?php echo $message["message"]; ?></td>
										<td><?php echo $message["created_at"]; ?></td>
										<td><?php echo $message["status"]; ?></td>
										<td>
										<?php if ($message["status"] === null) { ?>
											<span>
												<button class="btn btn-primary" name="updateM"> <i class="fa fa-check"></i> Approve</button> |
											</span>
											<span>
												<button class="btn btn-danger" name="deleteM"> <i  class="fa fa-trash"></i> Delete</button>
											</span>
										<?php } else { ?>
											<span class="h3">
												<button class="btn btn-danger" name="deleteM"> <i  class="fa fa-trash"></i> Delete</button>
											</span>
										<?php } ?>
										</td>
									</tr>
								</form>
								<?php endforeach ?>
							</div>
						
					</tbody>
				</table>
				</div>
			</div>
		</div>
		<?php include_once("inc/footer.php"); ?>
		<script src="../layouts/jquery/jquery.js" type="text/javascript"></script>
		<script src="../layouts/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
		<script src="../layouts/bootstrap/dist/assets/js/vendor/popper.min.js"></script>
		<script src="../layouts/bootsrap/js/bootstrap.min.js"></script>
	</body>
</html>
