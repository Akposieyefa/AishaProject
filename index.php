<?php include_once('inc/nav.php');?>
	<!--Header-Ends-Here-->
	<!--logo-Ends-Here-->
	<div class="logo">
		<div class="container">
			<div class="logo-main">
				<img src="images/logo.png" arc="">
			</div>
		</div>
	</div>
	<!--logo-Ends-Here-->
	<!--Banner-Starts-Here-->
	<div class="banner">
					<div  id="top" class="callbacks_container">
			      		<ul class="rslides" id="slider4">
			        	<li>
							<div class="banner-1">
							</div>
						</li>
						<li>
							<div class="banner-2">
							</div>
						</li>
						<li>
							<div class="banner-3">
							</div>
						</li>
			      </ul>
			    </div>
			    <div class="clearfix"> </div>
			</div>
	<!--Banner-Ends-Here-->
	<!--Slider-Starts-Here-->
				<script src="js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager: true,
			        nav: true,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
			<!--End-slider-script-->
		<!--child-stars-Here-->
		<div class="child">
			<div class="container">
				<div class="child-main">
					<h1>Let’s build the world without child abuse and neglect !</h1>
					<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus consectetur lacus ac odio volutpat ullamcorper. Phasellus finibus sit amet metus sit amet pretium. Suspendisse vehicula justo dolor, vitae bibendum sem luctus in. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
				</div>
			</div>
		</div>
		<!--child-Ends-Here-->
		<!--servive-starts-Here-->
		<div class="servive">
			<div class="container">
				<div class="servive-main">
					<div class="col-md-4 servive-left">
						<h3>Help to servive</h3>
						<h4>DONEC IN EUISMOD AUGUE EU FRING ILLA ENIM MAECENAS</h4>
						<p>Nullam pretium orci eu consequat porttitor Nam facilisis lorem quis velit hendrerit, eu sodales lacus venenatis. Pellentesque mollis nibh id lorem rhon cus, at faucibus nisi dapibus. Sed eget risus vel me tus efficitur efficitur. </p>
					</div>
					<div class="col-md-4 servive-right">
						<h4>Class aptent taciti sociosqu ad lit ora torquent per conubi</h4>
						<p>Nullam pretium orci eu consequat porttitor Nam facilisis lorem quis velit hendrerit, eu sodales lacus venenatis. Pellentesque mollis nibh id lorem rhon cus, at faucibus nisi dapibus. Sed eget risus vel me tus efficitur efficitur. </p>
						<div class="s-btn">
							<a href="#">More</a>
						</div>
					</div>
					<div class="col-md-4 servive-right">
						<h4>Class aptent taciti sociosqu ad lit ora torquent per conubi</h4>
						<p>Nullam pretium orci eu consequat porttitor Nam facilisis lorem quis velit hendrerit, eu sodales lacus venenatis. Pellentesque mollis nibh id lorem rhon cus, at faucibus nisi dapibus. Sed eget risus vel me tus efficitur efficitur. </p>
						<div class="s-btn">
							<a href="#">More</a>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!--servive-Ends-Here-->
		<!--mission-starts-Here-->
		<div class="mission">
			<div class="container">
				<div class="mission-main">
					<div class="col-md-6 mission-left">
						<h3>Our mission</h3>
						<div class="col-md-6 mission-one">
							<img src="images/mission-2.jpg" alt="">
							<div class="m-btn">
								<a href="#">More info</a>
							</div>
						</div>
						<div class="col-md-6 mission-two">
							<h4>Class aptent taciti sociosqu ad ora torquent per conubi</h4>
							<p>Nullam pretium orci eu consequat po rttitor Nam facilisis lorem quis velit hendrerit, eu sodales lacus venenatis. Pellentesque mollis. </p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-6 mission-left">
						<h3>Children at risk</h3>
						<div class="col-md-6 mission-one">
							<img src="images/mission-2.jpg" alt="">
							<div class="m-btn">
								<a href="#">More info</a>
							</div>
						</div>
						<div class="col-md-6 mission-two">
							<h4>Fusce elementum sem maximus leo finibus ultricies</h4>
							<p>Nullam pretium orci eu consequat po rttitor Nam facilisis lorem quis velit hendrerit, eu sodales lacus venenatis. Pellentesque mollis. </p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-6 mission-left"></div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!--mission-Ends-Here-->
		<!--help-starts-Here-->
		<div class="help">
			<div class="container">
				<div class="help-main">
					<h3>How we help</h3>
					<p>Nullam pretium orci eu consequat porttitor Nam facilisis lorem quis velit hendrerit, eu sodales lacus venenatis. Pellentesque mollis nibh id lorem rhoncus, at faucibus nisi dapibus. Sed eget risus vel metus efficitur efficitur.Nullam pretium orci eu consequat porttitor Nam facilisis lorem quis velit hendrerit, eu sodales lacus venenatis. Pellentesque mollis nibh id lorem rhoncus, at faucibus nisi dapibus. Sed eget risus vel metus efficitur efficitur. at faucibus nisi dapibus. Sed eget risus </p>
					<div class="h-btn">
						<a href="#">More</a>
					</div>
				</div>
			</div>
		</div>
		<!--help-Ends-Here-->
		<!--footer-Ends-Here-->
<?php include_once('inc/footer.php');?>