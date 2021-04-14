<?php
    include_once('./libs/classes/Children.php');
    $home = new Children();
    $homes = $home->index();
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
			<?php foreach ($homes as $home): ?>
				<div class="col-md-4">
					<div class="view view-tenth">
					      <a href="single.html">
						   <div class="clearfix inner_content">
							<div class="product_image">
								<img src="orphanage/image/<?php echo $home['picture'];?>" class="img-responsive of-my" alt=""/>
								<div class="mask" >
			                        <h4><?php echo $home['name'];?></h4>
			                        <p><strong>DOB : </strong><?php echo $home['dob'];?></p>
			                    </div>
			                  	</div>
			                 </div>
				            </a> 
				       </div>
				</div>  

			<?php endforeach?>
					  
		
					
				<div class="clearfix"> </div>	
		</div>
		
		
	</div>
	<!--gallery-Ends-Here-->
		<!--footer-Ends-Here-->
<?php include_once('inc/footer.php');?>