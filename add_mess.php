<?php session_start(); 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]=="f")
{
	header("location: /login.php");die();
}
if($_SESSION["status"]!="admin")
{
	header("location: /home.php");die();
}
?>
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
					<li class="nav-item active"> <a class="nav-link" href="#">Add Mess<span
								class="sr-only">(current)</span></a> </li>
					<li class="nav-item"> <a class="nav-link" href="/add_remove_update_mess.php">Remove Mess</a> </li>
					<li class="nav-item"> <a class="nav-link" href="/update_mess.php">Update Mess</a> </li>
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
		<h1 class="text-center display-5 pt-2">Add Mess</h1>
		<div class="col-12 col-sm-10 col-md-8 col-xl-6 offset-0 offset-xl-3 offset-md-2 offset-sm-1 pb-5"><hr></div>
		<div class="col-12 col-sm-8 col-md-6 col-xl-4 offset-0 offset-xl-4 offset-md-3 offset-sm-2 pb-5"> 
		<?php
$mysqli = new mysqli('localhost', 'root', '','mess') or printf("Connect failed: %s\n". $conn -> error);
if($_SERVER['REQUEST_METHOD']=='POST'){
	if($_POST['password']==$_POST['confpassword']){
		$mess = $mysqli->real_escape_string($_POST['mess']);
		$mess_manager = $mysqli->real_escape_string($_POST['mess_manager']);
		$mobileno = $mysqli->real_escape_string($_POST['manager_number']);
		$mobileno = (int)$mobileno;
		//$password = md5($_POST['password']);
		$password = $mysqli->real_escape_string($_POST['password']);
		$sql = "INSERT INTO mess (mess, username)". "Values ('".$mess."', '".$mess."_mess_manager')";
		$sql2 = "INSERT INTO users (username, `name`, rollno, passwordhash, mess, `status`)". "Values ('".$mess."_mess_manager', '".$mess_manager."', ".$mobileno.", '".$password."', '".$mess."', 'manager')";
		if (($mysqli->query($sql)) &&($mysqli->query($sql2))){
			$_SESSION['message']= 'Registration successful';
			header('location: ../add_mess.php');
		} else echo '<div class="text-danger h5 text-center">Mess with entered name already exist</div>';
	} else echo '<div class="text-danger h5 text-center">Passwords do not match</div>';
}
?>
			<form action="#" method="POST">
			<div class="form-group">
				<label for="mess">New Mess:</label>
				<div class="input-group mb-3">
						<input type="text" class="form-control" id="mess" placeholder="Enter new mess" name="mess" required>
				</div>
			</div>
			<div class="form-group">
				<label for="mess_manager">Mess Manager:</label>
				<div class="input-group mb-3">
					<input type="text" class="form-control" id="mess_manager" placeholder="Enter name of mess manager" name="mess_manager" required>
				</div>
			</div>
			<div class="form-group">
				<label for="manager_number">Mess Manager Mobile No.:</label>
				<div class="input-group mb-3">
					<input type="text" class="form-control" id="manager_number" placeholder="Enter mobile number of mess manager" name="manager_number" required>
				</div>
			</div>
			<div class="form-group">
				<label for="password">Temporary Password For Mess Manager Account:</label>
				<div class="input-group mb-3">
					<input type="password" class="form-control hide" id="password"
						placeholder="Enter temporary password" name="password" required>
					<div id="password-toggle" class="input-group-append"><span
							class="fas input-group-text fa-eye-slash"></span></div>
				</div>
			</div>
			<div class="form-group">
				<label for="confpassword">Confirm Temporary Password:</label>
				<div class="input-group mb-3">
					<input type="password" class="form-control hide" id="confpassword"
						placeholder="Confirm temporary password" name="confpassword" required>
					<div id="password-toggle2" class="input-group-append"><span
										class="fas input-group-text fa-eye-slash"></span></div>
				</div>
			</div>
			<div class="row text-center">
				<button type="submit" class="mx-auto px-5 mt-3 btn btn-primary">ADD</button>
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
<script src="/static/js/login.js" crossorigin="anonymous"></script>
<script src="/static/js/logout_button.js" crossorigin="anonymous"></script>

</body>

</html>