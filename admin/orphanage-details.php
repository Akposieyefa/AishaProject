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
$sql = "delete from orphanage  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$stmt=$dbh->query("delete from orphans where orphanage_id='$id'");
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
	
	<title>Orphanage Central System | Orphanage Details   </title>

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

						<h2 class="page-title">Orphanage Details</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Orphanage Info</div>
							<div class="panel-body">


<div id="print">
								<table border="1"  class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%"  >
				
									<tbody>
									<?php 
$orphanageid=intval($_GET['orphanageid']);
									$sql = "SELECT `orphanage`.* FROM `orphanage` WHERE `orphanage`.`id`=:orphanageid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':orphanageid',$orphanageid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
	$countOrphans = $dbh->query("SELECT count(id) AS orphansnum FROM orphans WHERE orphanage_id='$orphanageid'")->fetchColumn();
	$countSponsors = $dbh->query("SELECT count(id) AS sponsorsnum FROM tbl_donations WHERE orphanage_id='$orphanageid'")->fetchColumn();
	
	$sponsorsWorth = $dbh->query("SELECT sum(amount) AS worth FROM tbl_donations WHERE orphanage_id='$orphanageid'")->fetchAll(PDO::FETCH_OBJ);
foreach($results as $result)
{				?>	
	<h3 style="text-align:center; color:grey">#<?php echo htmlentities($result->id);?> </h3>

		<tr>
											<th colspan="4" style="text-align:center;color:blue">User Details</th>
										</tr>
										<tr>
											<th>Name.</th>
											<td><?php echo htmlentities($result->name);?></td>
											<th>Email</th>
											<td><?php echo htmlentities($result->email);?></td>
										</tr>
										<tr>											
											<th>Phone</th>
											<td><?php echo htmlentities($result->phone);?></td>
											<th>Address</th>
											<td><?php echo htmlentities($result->address);?></td>
										</tr>
											<tr>											
											<th>Reg Date</th>
											<td><?php echo htmlentities($result->created_at);?></td>
											<th>Last Update Date</th>
											<td><?php echo htmlentities($result->updated_at);?></td>
										</tr>
										<tr>
											<th colspan="4" style="text-align:center;color:blue">Orphanage Details</th>
										</tr>
											<tr>											
											<th>Number of Orphans</th>
											<td><?php echo htmlentities($countOrphans);?> <a href="orphanage-list.php?orphanageid=<?php echo $result->id;?>">view list</a></td>
											<th>Number of Sponsors</th>
											<td><?php echo htmlentities($countSponsors);?> <a href="orphanage-sponsor.php?orphanageid=<?php echo $result->id;?>">view list</a></td>
										</tr>
										<tr>
											<th>Sponsored Worth</th>
											<td>&#8358;<?php echo number_format($sponsorsWorth->worth, 2);?></td>
										</tr>
										<tr>	
										<td style="text-align:center" colspan="4">
				
<a href="orphanage-details.php?deleteid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Delete this?')" class="btn btn-danger"> Delete Orphange</a>
</td>
</tr>
										<?php $cnt=$cnt+1; }} ?>
										
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
