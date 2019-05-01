<?php session_start(); 
if(  (isset($_SESSION["loggedin"]))&&($_SESSION["loggedin"]=="t")&&isset($_POST['oldpassword'])&&($_SESSION['password']==$_POST['oldpassword'])){
    $mysqli = new mysqli('localhost', 'root', '','mess') or die("Connect failed: %s\n". $conn -> error);
	if($_SERVER['REQUEST_METHOD']=='POST'){
		//$password = md5($_POST['password']);
		if($_POST['newpassword']==$_POST['confpassword'])
		{
			$sql = "UPDATE users SET passwordhash='".$_POST['newpassword']."' WHERE username='".$_SESSION['username']."'";
			$result = $mysqli->query( $sql);
			$_SESSION['password']=$_POST['confpassword'];
		} else die($mysqli->error);
	}
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
						<li class="nav-item"> <a class="nav-link" href="/add_mess.php">Add Mess</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="/add_remove_update_mess.php">Remove Mess</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="/add_students.php">Add Students</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="/remove_students.php">Remove Students</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="/add_keywords.php">Add Keywords</a> </li>
						<li class="nav-item"> <a class="nav-link" href="/add_remove_keywords.php">Remove Keywords</a>
						</li>
						<li class="nav-item active"> <a class="nav-link" href="#">Change Password<span
									class="sr-only">(current)</span></a> </li>
					</ul>
					<button id="logoutbutton" class="btn btn-primary my-2 my-sm-0">Logout</button>
				</div>
			</nav>
		</div>
		<div class="container-fluid main page">
			<div class="text-light pt-5 pb-5 pb-md-0">
				<h1 class="text-center display-5 pt-2">Change Password</h1>
				<div class="col-12 col-sm-10 col-md-8 col-xl-6 offset-0 offset-xl-3 offset-md-2 offset-sm-1 pb-5">
					<hr>
				</div>
				<div class="col-12 col-sm-8 col-md-6 col-xl-4 offset-0 offset-xl-4 offset-md-3 offset-sm-2 pb-5">
					<!-- TODO add signup api uri -->
					<form action="#" method="POST">
						<div class="form-group">
							<label for="oldpassword">Old Password:</label>
							<div class="input-group mb-3">
								<input type="password" class="form-control hide" id="oldpassword"
									placeholder="Enter old password" name="oldpassword" required>
								<div id="oldpassword-toggle" class="input-group-append"><span
										class="fas input-group-text fa-eye-slash"></span></div>
							</div>
						</div>
						<div class="form-group">
							<label for="newpassword">New Password:</label>
							<div class="input-group mb-3">
								<input type="password" class="form-control hide" id="newpassword"
									placeholder="Enter new password" name="newpassword" required>
								<div id="newpassword-toggle" class="input-group-append"><span
										class="fas input-group-text fa-eye-slash"></span></div>
							</div>
						</div>
						<div class="form-group">
							<label for="confpassword">Confirm Password:</label>
							<div class="input-group mb-3">
								<input type="password" class="form-control hide" id="confpassword"
									placeholder="Confirm new password" name="confpassword" required>
								<div id="confpassword-toggle" class="input-group-append"><span
										class="fas input-group-text fa-eye-slash"></span></div>
							</div>
						</div>
						<div class="row text-center">
							<button type="submit" class="mx-auto px-5 mt-3 btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer text-center">
		<hr> <span class="text-center mx-auto my-0 py-0"><i class="fas fa-copyright"></i> Avneet Singh, Naveen
			Gupta - Systems Programming Lab, 2019</span>
	</footer>
	<!-- <script defer src="/static/js/clipboard.js" crossorigin="anonymous"></script> -->
	<script src="/static/js/logout_button.js" crossorigin="anonymous"></script>
	<script src="/static/js/change_password.js" crossorigin="anonymous"></script>
</body>

</html>