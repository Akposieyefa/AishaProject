<?php
    session_start();
    if(!isset($_SESSION['user']))
	{	
	header('location:index.php');
}else {

?>
<!DOCTYPE html>
<html lang="en">
  <head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>Dashboard </title>
		<link href="../layouts/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
		<link href="../layouts/fonts/css/font-awesome.min.css" rel="stylesheet" />
		<link href="../layouts/css/dashboard.css" rel="stylesheet" />
		
	</head>
  <body>
	<?php
        include_once("inc/nav.php"); 
    ?><br/><br/><br/> <br/><br/><br/>
    <main role="main">
        <div class="container">
        <div class="row">
        <div class="col-md-7 offset-md-3 col-sm-12">
					
          <a href="imagesFolder/twetter.jpg">
              <img class="rounded-circle mx-auto d-block mb-4 " src="../layouts/img/logo.jpg" alt="../layouts/img/logo.jpg" width="75px" height="75px" id="loginLog">
            </a>
					<h3 class="text-center"><em>Orphanage Profile</em></h3>
				<table class="table table-sm table-boarderd">
					<tr>
						<td>
							<p>	<strong> Name :</strong></p>
						</td>
						<td>
							<?php echo($_SESSION['user']->name);?>
						</td>
					</tr>
          <tr>
						<td>
							<p>	<strong> Email:</strong></p>
						</td>
						<td>
							<?php echo($_SESSION['user']->email);?>
						</td>
					</tr>
					<tr>
						<td>
							<p>	<strong> Phone :</strong></p>
						</td>
						<td>
						<?php echo strtoupper(($_SESSION['user']->phone));?>
						</td>
					</tr>
					<tr>
						<td>
							<p>	<strong>Address : </strong></p>
						</td>
						<td>
						<?php echo strtolower(($_SESSION['user']->address));?>
						</td>
					</tr>
					<tr>
						<td>
							<p>	<strong>Reg Date: </strong></p>
						</td>
						<td>
						<?php echo strtolower(($_SESSION['user']->created_at));?>
						</td>
					</tr>
					<tr>
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
    </main><br/><br/>
	<?php include_once('inc/footer.php');?>

    <script src="../layouts/jquery/jquery.js" type="text/javascript"></script>
    <script src="../layouts/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="../layouts/bootstrap/dist/assets/js/vendor/popper.min.js"></script>
    <script src="../layouts/bootsrap/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  </body>
</html>
<?php
} ?>
