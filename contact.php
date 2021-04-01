<?php include_once('inc/nav.php');?>
<?php include_once('libs/ContactValidator.php');?>
	<!--Header-Ends-Here-->
	<!--start-contact-->
	<div class="contact">
		<div class="container">
			<div class="contact-main">
				<h3>How To Find Us</h3>
				<div class="contact-top">
					<iframe src="https://maps.google.com/maps?q=Nile University%20of%20san%20nigeria&t=&z=13&ie=UTF8&iwloc=&output=embed"  frameborder="0" style="border:0"></iframe>
					<p>Phasellus mollis hendrerit magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tortor ante, fringilla porttitor gravida at, ullamcorper non lacus. Integer rhoncus sem sit amet ante accumsan pulvinar. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut mollis, sapien in porta tristique, ante tellus sagittis neque, eu vehicula mi lorem a tellus.Morbi sed libero eu est tempor porttitor eu a orci. Aliquam imperdiet est auctor turpis ultricies viverra vitae dictum nibh. Etiam vel augue ipsum.</p>
					<div class="contact-one">
						<div class="col-md-3 contact-left">
							<div class="c-left">
								<span class="adrs"> </span>
							</div>
							<div class="c-right">
								<h5>The Company Name agi,<span>756 gt globel Place.</span></h5>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="col-md-3 contact-left">
							<div class="c-left">
								<span class="ph"> </span>
							</div>
							<div class="c-right">
							<p>Telephone: +1 234 567 9871
								<span>FAX: +1 234 567 9871</span>
							</p>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="col-md-3 contact-left">
							<div class="c-left">
								<span class="mail"> </span>
							</div>
							<div class="c-right">
								<p><a href="mailto:example@email.com">mail@user.com</a></p>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="contact-bottom">
					<h3>Contact Form</h3>
					<div class="contact-text">
						<?php if (isset($error)) { ?>
							<div class="alert alert-danger"><?php echo "$error" ?></div>
						<?php	} ?>
						<?php if (isset($success)) { ?>
							<div class="alert alert-success"><?php echo "$success" ?></div>
						<?php	} ?>
						<form action="" method="post">
							<div class="col-md-6 contact-left-text">
								<input type="text" name="name" value="First Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'First Name';}"/>
								<input type="text" name="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}"/>
								<input type="text" name="subject" value="Subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone';}"/>
							</div>
							<div class="col-md-6 contact-left-text">
								<textarea name="message" value="Message:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message..</textarea>
							</div>
							<div class="clearfix"></div>
							<div class="contact-but">
								<input type="submit" name="create" />
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end-contact-->
		<!--footer-Ends-Here-->
<?php include_once('inc/footer.php');?>