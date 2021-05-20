<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_REQUEST['deleteid']))
	{
$id=$_GET['deleteid'];
$sql = "delete from orphans WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$msg="Page data updated  successfully";

}

?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Orphanage Central System | Orphan Details   </title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Orphan Details</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Orphan Info</div>
							<div class="panel-body">


<div id="print">
								<table border="1"  class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%"  >
				
									<tbody>
									<?php 
$orphanid=intval($_GET['orphanid']);
									$sql = "SELECT `orphans`.* FROM `orphans` WHERE `orphans`.`id`=:orphanid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':orphanid',$orphanid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
	
	$countSponsors = $dbh->query("SELECT count(id) AS sponsorsnum FROM tbl_donations WHERE orphan_id='$orphanid'")->fetchColumn();
	
	$sponsorsWorth = $dbh->query("SELECT sum(amount) AS worth FROM tbl_donations WHERE orphan_id='$orphanid'")->fetchAll(PDO::FETCH_OBJ);
foreach($results as $result)
{				

$orphanages = $dbh->query("SELECT id,name FROM orphanage WHERE id='{$result->orphanage_id}'")->fetchAll(PDO::FETCH_OBJ);
foreach ($orphanages as $orphanage) {

	?>	
	<h3 style="text-align:center; color:grey"><img src="<?php echo htmlentities($result->picture);?>" alt="picture" height="240px" width="240px"></h3>

		<tr>
											<th colspan="4" style="text-align:center;color:blue">User Details</th>
										</tr>
										<tr>
											<th>Name.</th>
											<td><?php echo htmlentities($result->name);?></td>
											<th>Date of Birth</th>
											<td><?php echo htmlentities($result->dob);?></td>
										</tr>
										<tr>											
											<th>Gender</th>
											<td><?php echo htmlentities($result->gender);?></td>
											<th>Reg Date</th>
											<td><?php echo htmlentities($result->created_at);?></td>
										</tr>
										<tr>
											<th colspan="4" style="text-align:center;color:blue">Orphan Details</th>
										</tr>
										<tr>											
											<th>Orphanage</th>
											<td><?php echo htmlentities($orphanage->name);?> <a href="orphanage-details.php?orphanageid=<?php echo $orphanage->id;?>">view</a></td>
											<th>Sponsor count</th>
											<td><?php echo htmlentities($countSponsors);?> <a href="orphanage-sponsor.php?orphanageid=<?php echo $orphanage->id;?>">view list</a></td>
										</tr>
										<tr>
											<th>Sponsored Worth</th>
											<td>&#8358;<?php echo number_format($sponsorsWorth->worth, 2);?></td>
										</tr>
										<tr>	
										<td style="text-align:center" colspan="4">
				
<a href="orphan-details.php?deleteid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Delete this?')" class="btn btn-danger"> Delete Orphange</a>
</td>
</tr>
										<?php $cnt=$cnt+1; }}} ?>
										
									</tbody>
								</table>
								<form method="post">
	   <input name="Submit2" type="submit" class="txtbox4" value="Print" onClick="return f3();" style="cursor: pointer;"  />
	</form>

							</div>
						</div>

					

					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script language="javascript" type="text/javascript">
function f3()
{
window.print(); 
}
</script>
</body>
</html>
<?php } ?>
