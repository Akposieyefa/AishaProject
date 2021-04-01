<?php
	include_once('phpFolder/insertValidation.php');
	$conn = mysqli_connect('localhost','root','techshark3','complain');
	$department = mysqli_query($conn,"select * from courses");
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>Register</title>
		<link href="bootstrapFolder/dist/css/bootstrap.min.css" rel="stylesheet" />
		<link href="fonts/css/font-awesome.min.css" rel="stylesheet" />
	</head>
  <body class="bg-light">
  <?php include_once("nav.php");	?><br/><br/><br/><br/>
    <div class="container-fluid">
      <div class="row">
		<div class="col-12">
			<a href="imagesFolder/logo.jpg">
				<img class="rounded-circle mx-auto d-block mb-4 " src="imagesFolder/logo.jpg" alt="imagesFolder/logo.jpg" width="75px" height="75px" id="loginLog">
			</a>
		</div>
        <div class="col-md-7 offset-md-3">
		<h2>Registration <i class="fa fa-edit"></i> </h2>
					<?php
						if (isset($error)) {
						?>
							<div class="alert alert-danger"><?php echo "$error" ?></div>
						<?php			}		?>

						<?php
							if (isset($success)) {
						?>
							<div class="alert alert-success"><?php echo "$success" ?></div>
						<?php		}	?>
				<form class="needs-validation" novalidate action="" method="POST">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName"><strong>First Name</strong></label>
                <input type="text" class="form-control" name="firstName" placeholder="First Name" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName"><strong>Last Name</strong></label>
                <input type="text" class="form-control" name="lastName" placeholder="Last Name" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="matNumber"><strong>Matriculation Number</strong></label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control" name="matNumber" placeholder="Username" required>
              </div>
            </div>

					<div class="mb-3">
					<label for="department"><strong>Department</strong></label>
				      <select name="department" class="form-control input-sm">
								<option value="">--select an option---</option>
									<?php
									while($row = mysqli_fetch_array($department)){
										echo "<option value='".$row['id']."'>".$row['name']."</option>";
									}
									?>
							</select>
		         </div>

            <div class="mb-3">
              <label for="email"><strong>Email</strong> <span class="text-muted">(Required)</span></label>
              <input type="email" class="form-control" name="email" placeholder="you@example.com" required>
            </div>

						<div class="mb-3">
							<label for="address"><strong>Phone Number</strong></label>
							<input type="text" class="form-control" name="phone" placeholder="08100788859" required>
            </div>

						<div class="row">
              <div class="col-md-6 mb-3">
							  <label for="password"><strong>Password </strong><span class="text-muted">(Required)</span></label>
							  <input type="text" class="form-control" name="password" placeholder="Enter Password" required>
						  </div>
              <div class="col-md-6 mb-3">
							  <label for="cpassword"><strong>Confirm Password </strong><span class="text-muted">(Required)</span></label>
							  <input type="text" class="form-control" name="cpassword" placeholder="Confirm Password" required>
              </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-success btn-lg " type="submit" name="register">Register...</button><br/>
          </form><br/>
		  		<a href="index.php" class="text-primary h6">Already Have an Account...?</a>
        </div>
      </div><br/><br/>
    </div>
		<?php include_once("footer.php"); ?>

    <script src="jqueryFolder/jquery.js" type="text/javascript"></script>
    <script src="bootstrapFolder/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="bootstrapFolder/dist/assets/js/vendor/popper.min.js"></script>
    <script src="bootsrapFolder/js/bootstrap.min.js"></script>
    <script src="jqueryFolder/loginValidation.js" type="text/javascript"></script> <script>
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
