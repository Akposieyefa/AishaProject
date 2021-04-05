<?php include_once('../libs/ComplainValidation.php'); ?>
<!doctype html>
<html lang="en">
  <head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>Complain </title>
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
		<div class="container-fluid">
		 <div class="row">
				<div class="col-md-6 offset-md-3 col-sm-12"><br/><br/>
						<hr class="featurette-divider">
						<img class="rounded-circle mx-auto d-block mb-4 " src="../layouts/img/logo.jpg" alt="../layouts/img/logo.jpg" width="120px" height="120px">
					</a>
            <?php  if (isset($error)) {  ?>
                 <div class="alert alert-danger"><?php echo "$error" ?></div>
            <?php  }  ?>
            <?php if (isset($success)) {  ?>
                 <div class="alert alert-success"><?php echo "$success" ?></div>
            <?php  }    ?>
              <form class="needs-validation" novalidate action="" method="POST">
			<input type="hidden" class="form-control" name="orphange_id" value="<?php echo 	$_SESSION['user'][0];?>" required />
                    <div class="mb-3">
                        <label for="address"><strong>Subject</strong></label>
                        <input type="text" class="form-control" name="subject" placeholder="Subject Matter" required />
                    </div>
			<div class="mb-3">
                        <!-- <label for="address"><strong>Email</strong></label> -->
                        <input type="hidden" class="form-control" name="email" value="<?php echo 	$_SESSION['user'][2];?>" required />
                    </div>
									<div class="mb-3">
                        <label for="haddress"><strong>Complain</strong></label>
                        <textarea class="form-control" rows="6"  name="info" placeholder="Enter your complain " required /></textarea>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="complain">Submit Complain </button><br/>
                  </form>
				</div>
	    </div>
	  </div><br/>
	  <?php include_once('inc/footer.php');?>

<script src="../layouts/jquery/jquery.js" type="text/javascript"></script>
<script src="../layouts/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="../layouts/bootstrap/dist/assets/js/vendor/popper.min.js"></script>
<script src="../layouts/bootsrap/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
			<script>
			  // Example starter JavaScript for disabling form submissions if there are invalid fields
			  (function() {
				'use strict';

				window.addEventListener('load', function() {
				  // Fetch all the forms we want to apply custom Bootstrap validation styles to
				  var forms = document.getElementsByClassName('needs-validation');

				  // Loop over them and prevent submission
				  var validation = Array.prototype.filter.call(forms, function(form) {
					form.addEventListener('submit', function(event) {
					  if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					  }
					  form.classList.add('was-validated');
					}, false);
				  });
				}, false);
			  })();
			</script>
	</body>
</html>
