<?php
    include_once('../libs/classes/Children.php');
    $home = new Children();
    $homes = $home->index();
?>
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
        <div class="container-fluid">
              <div class="row">
                     <div class="col-md-12 col-sm-12">			
                            <a href="imagesFolder/twetter.jpg">
                                   <img class="mx-auto mb-4 rounded-circle d-block " src="../layouts/img/logo.jpg" alt="../layouts/img/logo.jpg" width="75px" height="75px" id="loginLog">
                            </a>
                            <h3 class="text-center"><em>Orphanage Profile</em></h3>
                            <div class="table-responsive">
					<table class="table table-striped table-lg table-border">
						<thead>
							<tr>
								<td><strong>sNo</strong><br></td>
                                                        <td><strong>Name</strong><br></td>
								<td><strong>Date of Birth</strong></td>
								<td><strong>Gender</strong></td>
								<td><strong>Date</strong></td>
								<td><strong>Action's<strong></td>
							</tr>
						</thead>    
                                          <?php $i = 1; ?>  
						<tbody>
                                                 <?php foreach ($homes as $home): ?>
                                                        <tr>
                                                               <td><span style="background-color:#ff00bb;" class="badge" ><?php echo $i++; ?></span></td>
                                                               <td><?php echo $home['name']; ?></td>
                                                               <td><?php echo $home['dob']; ?></td>
                                                               <td><?php echo $home['gender']; ?></td>
                                                               <td><?php echo $home['created_at']; ?></td>
                                                               <td>
                                                                      <form action="" method="post">
                                                                             <input type="hidden" name="messageID" value="<?php echo $home['id']; ?>">
                                                                             <span>
                                                                                    <button class="btn btn-danger" name="delete"> <i  class="fa fa-trash"></i> Delete</button>
                                                                             </span>
                                                                      </form>
                                                               </td>
                                                        </tr>
                                                 <?php endforeach?>
                                          </tbody>
				</table>
				</div>

                    </div>
              </div>
      </div><br/><br/>
	<?php include_once('inc/footer.php');?>

    <script src="../layouts/jquery/jquery.js" type="text/javascript"></script>
    <script src="../layouts/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="../layouts/bootstrap/dist/assets/js/vendor/popper.min.js"></script>
    <script src="../layouts/bootsrap/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  </body>
</html>
