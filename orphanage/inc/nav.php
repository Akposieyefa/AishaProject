<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
     <div class="container">
          <a class="navbar-brand bg-dark" href="#"> 	<?php echo  $_SESSION['user'][2]; ?> </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarsExample03">
            <ul class="ml-auto navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="dashboard.php"> Dashboard <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
               <a class="nav-link" href="complain.php"> Complaints</a>
              </li>
              <li class="nav-item">
               <a href="create-child.php" class="nav-link"> Add Children</a>
              </li>
              <li class="nav-item">
               <a href="all-child.php" class="nav-link"> All Children</a>
              </li>
              <li class="nav-item">
               <a class="nav-link" href="destroy.php"> Sign Out</a>
              </li>
            </ul>
          </div>
     </div>
</nav>