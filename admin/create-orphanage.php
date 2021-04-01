<?php include_once('../libs/OrphanageValidation.php'); ?>
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
		<article class="col-md-6 offset-md-3">
                     <a href="../layouts/img/nacoss.jpg">
                            <img class="mx-auto mb-4 rounded-circle d-block " src="../layouts/img/nacoss.jpg" alt="../layouts/img/nacoss.jpg" width="75px" height="75px" id="loginLog">
                     </a>
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
                                   <label for="haddress"><strong>Email Address</strong></label>
                                   <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                   <label for="haddress"><strong>Phone Number</strong></label>
                                   <input type="text" name="phone" id="phone" class="form-control input-sm" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                            <label for="haddress"><strong>Address</strong></label>
                            <textarea class="form-control" rows="6"  name="address" placeholder="Enter Message" id="message" name="message" /></textarea>
                            </div>
                            <br/>
                            <div class="row">
                                   <div class="col-xs-6 col-sm-6 col-md-6">
                                          <div class="form-group">
                                                 <label for="haddress"><strong>Password</strong></label>
                                                 <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                                          </div>
                                   </div>
                                   <div class="col-xs-6 col-sm-6 col-md-6">
                                          <div class="form-group">
                                                 <label for="haddress"><strong>Confirm Password</strong></label>
                                                 <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
                                          </div>
                                   </div>
                            </div>
                            <input type="submit" value="Register" name="create" class="btn btn-info btn-block">
		       </form>
		</article>
           </div>
        </main>
      </div>
    </div>
	<?php include_once("inc/footer.php"); ?>
    <script src="../layouts/jquery/jquery.js" type="text/javascript"></script>
    <script src="../layouts/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="../layouts/bootstrap/dist/assets/js/vendor/popper.min.js"></script>
    <script src="../layouts/bootsrap/js/bootstrap.min.js"></script>


  </body>
</html>
