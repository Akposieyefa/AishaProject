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
