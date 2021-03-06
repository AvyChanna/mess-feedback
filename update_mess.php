<?php session_start(); 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]=="f")
{
	header("location: /login.php");die();
}
if($_SESSION["status"]!="admin")
{
	header("location: /home.php");die();
}?>
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
					<li class="nav-item"> <a class="nav-link" href="/admin.php">Home</a> </li>
					<li class="nav-item"> <a class="nav-link" href="/add_mess.php">Add Mess</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="/add_remove_update_mess.php">Remove Mess</a> </li>
                    <li class="nav-item active"> <a class="nav-link" href="#">Update Mess<span
								class="sr-only">(current)</span></a> </li>
					<li class="nav-item"> <a class="nav-link" href="/add_students.php">Add Students</a> </li>
					<li class="nav-item"> <a class="nav-link" href="/remove_students.php">Remove Students</a> </li>
					<li class="nav-item"> <a class="nav-link" href="/add_keywords.php">Add Keywords</a></li>
					<li class="nav-item"> <a class="nav-link" href="/add_remove_keywords.php">Remove Keywords</a> </li>
					<li class="nav-item"> <a class="nav-link" href="/admin_change_password.php">Change Password</a>
					</li>
				</ul>
				<button id="logoutbutton" class="btn btn-primary my-2 my-sm-0">Logout</button>
			</div>
		</nav>
	</div>
<div class="container-fluid main page">
	<div class="text-light pt-5 pb-5 pb-md-0">
		<h1 class="text-center display-5 pt-2">Mess Management Signup</h1>
		<div class="col-12 col-sm-10 col-md-8 col-xl-6 offset-0 offset-xl-3 offset-md-2 offset-sm-1 pb-5"><hr></div>
		<div class="col-12 col-sm-8 col-md-6 col-xl-4 offset-0 offset-xl-4 offset-md-3 offset-sm-2 pb-5"> 
            <form action="/api/update_mess_api.php" method="POST">
            <div class="form-group">
							<label for="mess">Mess:</label>
							<div class="input-group mb-3">
							<select class="form-control " id="mess" name="mess">
										<?php 
											$mysqli = new mysqli("localhost", "root", "", "mess");
											if ($result = $mysqli->query("SELECT mess FROM mess"))
												while ($row = $result->fetch_assoc())
													if($row['mess'] !== $_SESSION['mess'])
														echo '<option>'.$row['mess'].'</option>';
										?>
									</select>
							</div>
						</div>
			<div class="form-group">
				<label for="mess_manager">New Mess Manager:</label>
				<div class="input-group mb-3">
					<input type="text" class="form-control" id="mess_manager" placeholder="Enter name of mess manager" name="mess_manager" required>
				</div>
			</div>
			<div class="form-group">
				<label for="manager_number">New Mess Manager Mobile No.:</label>
				<div class="input-group mb-3">
					<input type="text" class="form-control" id="manager_number" placeholder="Enter mobile number of mess manager" name="manager_number" required>
				</div>
			</div>
			<div class="row text-center">
				<button type="submit" class="mx-auto px-5 mt-3 btn btn-primary">UPDATE</button>
			</div>
			</form>
			<br>
		</div>
	</div>
</div>
</div>
<div class="footer">
<nav class="navbar navbar-bottom navbar-expand my-0 pt-2 pb-2 navbar-dark bg-dark text-center border-bottom-0 border-left-0 border-right-0 border-primary">
	<span class="navbar-text text-center mx-auto my-0 pt-2 pb-2 text-decoration-none"><i class="fas fa-copyright"></i> Avneet Singh, Naveen Gupta - Systems Programming Lab, 2019</span>
</nav>
</div>
<script src="/static/js/logout_button.js" crossorigin="anonymous"></script>

</body>

</html>