<?php session_start(); 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]=="f")
{
	header("location: /login.php");die();
}
if($_SESSION["status"]!="student")
{
	header("location: /home.php");die();
} ?>
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
						<li class="nav-item"> <a class="nav-link" href="/student.php">Home</a> </li>
						<li class="nav-item active"> <a class="nav-link" href="#">Change Mess For Upcoming Month<span
									class="sr-only">(current)</span></a> </li>
						<li class="nav-item"> <a class="nav-link" href="/student_new_feedback.php">Provide New
								Feedback</a> </li>
						<li class="nav-item"> <a class="nav-link" href="/student_change_password.php">Change
								Password</a> </li>
					</ul>
					<button id="logoutbutton" class="btn btn-primary my-2 my-sm-0">Logout</button>
				</div>
			</nav>
		</div>
		<div class="container-fluid main page">
			<div class="text-light pt-5 pb-5 pb-md-0">
				<h1 class="text-center display-5 pt-2">Change mess</h1>
				<div class="col-12 col-sm-10 col-md-8 col-xl-6 offset-0 offset-xl-3 offset-md-2 offset-sm-1 pb-5">
					<hr>
				</div>
				<div class="col-12 col-sm-8 col-md-6 col-xl-4 offset-0 offset-xl-4 offset-md-3 offset-sm-2 pb-5">
					<div class="container-fluid h5 mb-3">Current Mess = <b><?php echo $_SESSION['mess'] ?></b></div>
					<?php
						$mysqli = new mysqli("localhost", "root", "", "mess");
						$mess=mysqli_escape_string($mysqli, $_SESSION['mess']);
						$username=mysqli_escape_string($mysqli, $_SESSION['username']);
						if ($result = $mysqli->query("SELECT 1 FROM dual where DAY(CURRENT_DATE()) >= 27"))
						{	
							if($result->num_rows == 0){
							echo '<div class="h4 py-5 text-success  text-center">Change mess feature will start after 27th every month</div>';
						}else{
							$result->free();
							echo '<form action="/api/change-mess.php" method="POST">';
							echo '<div class="form-group container-fluid">';
							echo '<label for="newmess">New Mess</label>';
							echo '<select class="form-control form-control-sm" id="newmess" name="newmess">';
							$mysqli2 = new mysqli("localhost", "root", "", "mess");
							if ($result = $mysqli2->query("SELECT mess FROM mess"))
								while ($row = $result->fetch_assoc())
									if($row['mess'] !== $_SESSION['mess'])
										echo '<option>'.$row['mess'].'</option>';
							echo '</select></div><div class="row text-center"><button type="submit" class="mx-auto px-5 mt-3 btn btn-primary">Change mess</button></div></form>';
						}
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