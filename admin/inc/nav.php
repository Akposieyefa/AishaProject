<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top ">
	<div class="container">
		<a class="navbar-brand bg-dark" href="#">
			<?php echo "Welcome"." ". $_SESSION['admin'][1]; ?>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
			<ul class="ml-auto navbar-nav">
				<li class="nav-item active">
					<a class="nav-link display-8" href="dashboard.php" id="home"> Dashboard</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="messages.php">  Message's</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="create-orphanage.php">Create</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="all-orphanage.php"> Orphanages</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="send_mail.php"> Send Mail</a>
				</li>
			</ul>
			<ul class="ml-auto navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="destroy.php"><i class="fa fa-power-off"></i> SignOut</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
