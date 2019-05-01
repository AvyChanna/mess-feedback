<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="stylesheet" href="/static/css/fa.css" crossorigin="anonymous" />
	<link rel="stylesheet" href="/static/css/bootstrap.css" crossorigin="anonymous" />
	<script src="/static/js/jquery.js" crossorigin="anonymous"></script>
	<script src="/static/js/popper.js" crossorigin="anonymous"></script>
	<script src="/static/js/bootstrap.js" crossorigin="anonymous"></script>
	<title>Mess Feedback Portal</title>
</head>

<body>
	<div class="content">
		<div class="header">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <a class="navbar-brand"
					href="javascript:void();">Mess Feedback</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
					aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span
						class="navbar-toggler-icon"></span> </button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active"> <a class="nav-link" href="#">Home<span
                                    class="sr-only">(current)</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" href="/add_mess.php">Add Mess</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="/add_remove_update_mess.php">Remove Mess</a> </li>
						<li class="nav-item"> <a class="nav-link" href="/update_mess.php">Update Mess</a> </li>
						<li class="nav-item"> <a class="nav-link" href="/add_students.php">Add Students</a> </li>
						<li class="nav-item"> <a class="nav-link" href="/remove_students.php">Remove Students</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="/add_keywords.php">Add Keywords</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="/add_remove_keywords.php">Remove Keywords</a>
						</li>
						<li class="nav-item"> <a class="nav-link" href="/admin_change_password.php">Change Password</a>
						</li>
					</ul>
					<button id="logoutbutton" class="btn btn-primary my-2 my-sm-0">Logout</button>
				</div>
			</nav>
		</div>
		<div class="container-fluid main page">
			<div class="text-light pt-5 pb-5 pb-md-0">
				<h1 class="text-center display-5 pt-2">Monthly Mess Report</h1>
				<div class="col-12 col-sm-10 col-md-8 col-xl-6 offset-0 offset-xl-3 offset-md-2 offset-sm-1 pb-5">
					<hr>
				</div>
				<div class="col-12 col-sm-8 col-md-6 col-xl-4 offset-0 offset-xl-4 offset-md-3 offset-sm-2 pb-5">
				<?php 
				$mysqli2 = new mysqli("localhost", "root", "", "mess");
				if ($resul = $mysqli2->query("select mess from mess"))
				while($ro = $resul->fetch_assoc())
				{
					$rating = (float)0.0;
					$count = (int)0;
					$mysqli = new mysqli("localhost", "root", "", "mess");
					$mess=mysqli_escape_string($mysqli, $ro['mess']);
					if ($result = $mysqli->query("SELECT rating FROM feedbacks where mess = '".$mess."' and MONTH(`date`) = MONTH(CURRENT_DATE()-INTERVAL 1 MONTH) AND YEAR(`date`) = YEAR(CURRENT_DATE()-INTERVAL 1 MONTH)"))
					{	while ($row = $result->fetch_assoc()) {
							$rating = (float)$rating + (float)$row['rating'];
							$count = $count + 1;
						}
						$result->free();
						$mysqli->close();
					}
					if ($count == 0)
						$rating = 5;
					else
						$rating = (float)$rating / $count;
						echo '<div class="card"><div class="card-body"><p class="card-text">Mess = <b>'.$mess.'</b></p><p class="card-text">Current Rating = <b>'.$rating.'</b></p></div></div>';
				}
				?>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer text-center">
		<hr> <span class="text-center mx-auto my-0 py-0"><i class="fas fa-copyright"></i> Avneet Singh, Naveen
			Gupta - Systems Programming Lab, 2019</span>
	</footer>
	<script src="/static/js/logout_button.js" crossorigin="anonymous"></script>
</body>

</html>