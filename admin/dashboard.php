<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>Admin Dashboard</title>
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
    <?php include_once("inc/nav.php"); ?><br/><br/><br/>
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 bg-dark" id="sidebar-sticky">
          <div class="">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link text-light" href="#">
                  <span data-feather="shopping-cart"></span><br/><br/>
                    <a href="#">
                        <img src="../layouts/img/user.jpg" class="mx-auto img-fluid d-block rounded-circle " width="70px" height="50px" />
                    </a>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="#">
                  <span data-feather="users"></span>
                    <strong>  Name :</strong> <?php echo($_SESSION['admin'][1]);?>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="#">
                  <span data-feather="bar-chart-2"></span>
                    <strong>Email :</strong> <?php echo strtolower($_SESSION['admin'][2]);?>
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="px-4 pt-3 col-md-9 ml-sm-auto col-lg-10">
          <div class="flex-wrap pb-2 mb-3 d-flex justify-content-between flex-md-nowrap align-items-center border-bottom">
            <h1 class="h2">Dashboard</h1>
	            <div class="mb-2 btn-toolbar mb-md-0">
	             <div>
	                <span data-feather="calendar"></span>
	               		<?php
                        if ($_SESSION['admin'][2] == null) {
                            ?>
	                      <span class="text-danger"><i class="fa fa-close"></i> Not Active </span>
	                    <?php
                        } else {
                            ?>
	                     <span class="text-success"><i class="fa fa-certificate"></i> Active </span>
	                    <?php
                        }  ?>
	              </div>&nbsp;&nbsp;
	              <div class="mr-2 btn-group">
	                <button class="btn btn-sm btn-outline-secondary"><i class="fa fa-anchor"></i></button>
	                <button class="btn btn-sm btn-outline-secondary"><i class="fa fa-headphones"></i></button>
	              </div>
	              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
	                <span data-feather="calendar"></span>
	               <i class="fa fa-television"></i>
	              </button>
	            </div>
              </div>
		<article>
			<div class="slider" id="main-slider" >
				<div class="slider-wrapper">
					<img src="../layouts/img/blog-5.jpg" alt="First" class="slide"  />
					<img src="../layouts/img/blog-6.jpg" alt="Second" class="slide" />
					<img src="../layouts/img/classes-5.jpg" alt="Third" class="slide" />
					<img src="../layouts/img/classes-2.jpg" alt="Forth" class="slide" />
					<img src="../layouts/img/classes-3.jpg" alt="Fifth" class="slide" />
				</div>
			</div>
		</article>

        </main>
      </div>
    </div>
	<?php include_once("inc/footer.php"); ?>
    <script src="../layouts/jquery/jquery.js" type="text/javascript"></script>
    <script src="../layouts/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="../layouts/bootstrap/dist/assets/js/vendor/popper.min.js"></script>
    <script src="../layouts/bootsrap/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
		<style type="text/css">
			 #div{
					 border:2px solid;
					 border-radius: 10px;
					 height: 100px;
			 }
			 /*start style for rollover image*/
			 .slider-wrapper {
					 width: 100%;
					 height: 370px;
					 position: relative;
					 margin-top:5px;
					 border-radius:3px;
					 margin-bottom:5px;
			 }
			 .slide {
					 float: left;
					 position: absolute;
					 width: 100%;
					 height: 100%;
					 opacity: 0;
					 transition: opacity 3s linear;
			 }
			 .slider-wrapper > .slide:first-child {
					 opacity: 1;
			 }/*end style for rollover image*/
	 	 </style>

  </body>
</html>
