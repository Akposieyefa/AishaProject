
<?php
    session_start();
    if(!isset($_SESSION['user']))
  { 
  header('location:index.php');
}else {

include_once("../libs/classes/DB.php");
include_once('../libs/classes/Children.php');
 $pdo = new DB();
$home = new Children($pdo);
$homes = $home->index([$_SESSION['user']->id]);
    
if(isset($_REQUEST['deleteid']))
  {
$id=$_GET['deleteid'];
$homes->delete($id);
$query = $dbh->prepare($sql);
$success="Page data updated  successfully";

}

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
                      <?php if (isset($error)) { ?>
                            <div class="alert alert-danger"><?php echo "$error" ?></div>
                     <?php  } ?>
                     <?php if (isset($success)) { ?>
                            <div class="alert alert-success"><?php echo "$success" ?></div>
                     <?php  } ?>
                            <h3 class="text-center"><em>Orphan Profile</em></h3>
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
                                                 <?php 
                                                
                                                 foreach($homes as $res){ ?>

                                                        <tr>
                                                               <td><span style="background-color:#ff00bb;" class="badge" ><?php echo $i++; ?></span></td>
                                                               <td><img src="image/<?php echo $res->picture; ?>" alt="image/<?php echo $res->picture; ?>" height="80px" width="80px"><?php echo $res->name; ?></td>
                                                               <td><?php echo $res->dob; ?></td>
                                                               <td><?php echo $res->gender; ?></td>
                                                               <td><?php echo $res->created_at; ?></td>
                                                               <td>
                                                                   <span>
                                                                    <a href="all-child.php?deleteid=<?php echo htmlentities($res->id);?>" onclick="return confirm('Do you really want to Delete this?')" class="btn btn-danger"><i  class="fa fa-trash"></i> Delete Orphange</a>
                                                                   </span>
                                                                   <span>
                                                                    <a href="update-child.php?orphanid=<?php echo htmlentities($res->id);?>" class="btn btn-info"><i  class="fa fa-trash"></i> Update Data</a>
                                                                   </span>
                                                               </td>
                                                        </tr>
                                                 <?php } ?>
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
<?php } ?>