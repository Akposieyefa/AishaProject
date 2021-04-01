<?php
    include_once('../phpFolder/updateValidation.php');
    include_once("../phpFolder/selectClass.php");
    $complain = new  SelectDetails();
    $student = $complain->allComplain();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title> Class Complains</title>
		<link href="../bootstrapFolder/dist/css/bootstrap.min.css" rel="stylesheet" />
		 <link href="../cssFolder/dashboard.css" rel="stylesheet" />
		<link href="../fonts/css/font-awesome.min.css" rel="stylesheet" />
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
	<div class="container-fluid">
	<div class="row">
	<?php include_once('nav.php');?>
			<div class="col-md-12"><br/><br/><br/><br/><br/>
			<div class="table-responsive">
				<table class="table table-striped table-hover table-bordered table-sm ">
					<thead class="text-center bg-primary text-light">
				 			<tr>
								<td><strong>Serial</strong><br></td>
								<td><strong>Case ID Number</strong></td>
								<td><strong>Subject </strong></td>
								<td><strong>Email </strong></td>
								<td><strong>Complain Message</strong></td>
								<td><strong>Date</strong></td>
								<td><strong>Action's</strong></td>
							</tr>
					</thead>
					<?php
                    $i = 0;
                        $start = 0;
                        $len = 30;
                        function complaintext($messages, $start, $len)
                        {
                            return substr($messages, $start, $len);
                        }

                        foreach ($student as $complain) {
                            $id = $complain['id'];
                            $caseID        =  $complain['caseID'];
                            $subject      = $complain['subject'];
                            $email      = $complain['email'];
                            $messages     = $complain['complainMessage'];
                            $date     =  $complain['caseDate'];

                            $i ++; ?>
						<tbody>
				      <div class="form">
								<form action="" method="POST">
									<tr>
										<input type="hidden" name="complainID" value="<?php echo $id; ?>" />
										<td><span style="background-color:#ff00bb;" class="badge" ><?php echo $i; ?></span></td>
										<td><?php echo $caseID ; ?></td>
										<td><?php echo $subject ; ?></td>
										<td><?php echo $email ; ?></td>
										<td>
											<?php

                                                $stirng = complaintext($messages, $start, $len)." "."<em>...more</em>";
                            echo $stirng; ?>
										</td>
										<td><?php echo $date ; ?></td>
										<td>
	                    <span>
												<a href="details.php? id=<?php echo $id?>" class="btn btn-info btn-sm">
													<i class="fa fa-info"></i> More
												</a> |
										   </span>
											 <span>
											    <button class="btn btn-danger btn-sm" name="deleteC"> <i  class="fa fa-trash"></i> Delete</button>
											 </span>
										</td>
									</tr>
								</form>
				      </div>
				        <?php
                        }    ?>
						</tbody>
				</table>
			</div>
			</div>
	</div>
	</div>
	<?php include_once("footer.php"); ?>
	<script src="../jqueryFolder/jquery.js" type="text/javascript"></script>
	<script src="../bootstrapFolder/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
	<script src="../bootstrapFolder/dist/assets/js/vendor/popper.min.js"></script>
	<script src="../bootsrapFolder/js/bootstrap.min.js"></script></body>
</html>
