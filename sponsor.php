<?php
	include_once("./libs/classes/DB.php");
    include_once('./libs/classes/Children.php');
    $pdo = new DB();
    $home = new Children($pdo);
    $homes = $home->orphans();
?>
<?php include_once('inc/nav.php');?>
	<!--Header-Ends-Here-->
	<!--gallery-Ends-Here-->
	<div class="products">
		<div class="container">	
			<div class="products-top">		
				<h3>Sponsor a Child</h3>
				<p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore </p>
			</div>
			<div class="products-bottom">
			<?php foreach ($homes as $res){
				?>
				<div class="col-md-4">
					<div class="card" style="width: 18rem;">
					  <img src="orphanage/image/<?php echo $res->picture;?>" class="card-img-top" alt="..." height="64px" width="64px">
					  <div class="card-body">
					    <h5 class="card-title"><?php echo $res->name;?></h5>
					    <p class="card-text"><?php echo $res->dob;?>.</p>
					    <a href="detail.php?childid=<?php echo $res->id;?>&homeid=<?php echo $res->orphanage_id;?>" class="btn btn-primary">Sponsor</a>
					  </div>
					</div>
				</div>  
			<?php }?>
					  
		
					
				<div class="clearfix"> </div>	
		</div>
		
		
	</div>
	<!--gallery-Ends-Here-->
		<!--footer-Ends-Here-->
<?php include_once('inc/footer.php');?>