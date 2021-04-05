<!doctype html>
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
		<?php
            session_start();
            $url = "../login.php";
            if ($_SESSION['user']) {
                $_SESSION['user'];
            } else {
                header("location:$url");
            }
        ?>
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
       <?php if (isset($error)) { ?>
                            <div class="alert alert-danger"><?php echo "$error" ?></div>
                     <?php	} ?>
                     <?php if (isset($success)) { ?>
                            <div class="alert alert-success"><?php echo "$success" ?></div>
                     <?php	} ?>
                     <form method="post" action="">
                            <div class="form-group">
                                   <label for="haddress"><strong>Name</strong></label>
                                   <input type="text" name="name" id="name" class="form-control input-sm" placeholder="Orphanage Name">
                            </div>
                            <div class="form-group">
                                   <label for="haddress"><strong>DOB</strong></label>
                                   <input type="date" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                   <label for="haddress"><strong>Gender</strong></label>
                                   <input type="date" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                   <label for="haddress"><strong>Image</strong></label>
                                   <input type="file" name="phone" id="phone" class="form-control input-sm" placeholder="Phone Number">
                            </div>
                            <br/>
                            
                            <input type="submit" value="Register" name="create" class="btn btn-info btn-block">
		       </form>
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
