<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]=="t")
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
<link rel="stylesheet" href="/static/css/custom.css" crossorigin="anonymous" />
<script src="/static/js/jquery.js" crossorigin="anonymous"></script>
<script src="/static/js/popper.js" crossorigin="anonymous"></script>
<script src="/static/js/bootstrap.js" crossorigin="anonymous"></script>
<title>Mess Feedback Portal</title>
</head>
<body>
<div class="header">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <a class="navbar-brand" href="javascript:void();">Mess Feedback</a> 
	</nav>
</div>
<div class="container-fluid main page">
	<div class="text-light pt-5 pb-5 pb-md-0">
		<h1 class="text-center display-5 pt-2">Mess Management Signup</h1>
        <div class="col-12 col-sm-10 col-md-8 col-xl-6 offset-0 offset-xl-3 offset-md-2 offset-sm-1 pb-5"><hr></div>
		<div class="col-12 col-sm-8 col-md-6 col-xl-4 offset-0 offset-xl-4 offset-md-3 offset-sm-2 pb-5"> 
		<?php
			$mysqli = new mysqli('localhost', 'root', '','mess') or die("Connect failed: %s\n". $conn -> error);
			if($_SERVER['REQUEST_METHOD']=='POST'){
				if($_POST['password']==$_POST['confpassword']){
					$username = $mysqli->real_escape_string($_POST['username']);
					$fullname = $mysqli->real_escape_string($_POST['name']);
					$mess = $mysqli->real_escape_string($_POST['mess']);
					$rollno = $mysqli->real_escape_string($_POST['rollno']);
					$rollno = (int)$rollno;
					//$password = md5($_POST['password']);
					$password = $mysqli->real_escape_string($_POST['password']);
					$sql = "INSERT INTO users (username, `name`, rollno, passwordhash, mess)". "Values ('".$username."', '".$fullname."', ".$rollno.", '".$password."', '".$mess."')";

					if ($mysqli->query($sql)){
						header('location: ../login.php');
						die();
					} else echo  '<div class="text-danger h5 text-center">Username or Roll No already exist</div>';
				} else echo  '<div class="text-danger h5 text-center">Passwords do not match</div>';
			}
			?>
			<form action="#" method="POST">
			<div class="form-group">
				<label for="name">FullName:</label>
					<div class="input-group mb-3">
						<input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name" required>
					</div>
				</div>
				<div class="form-group">
					<label for="username">Username:</label>
					<div class="input-group mb-3">
						<input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
						<div class="input-group-append bg-dark"> <span class="input-group-text" >@iitg.ac.in</span> </div>
					</div>
				</div>
				<div class="form-group">
					<label for="rollno">Roll Number:</label>
					<div class="input-group mb-3">
						<input type="text" class="form-control" id="rollno" placeholder="Enter username" name="rollno" required>
					</div>
				</div>
				<div class="form-group">
					<label for="mess">Current Mess:</label>
					<div class="input-group mb-3">
					<select class="form-control" id="mess" name="mess">
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
					<label for="password">Password:</label>
					<div class="input-group mb-3">
						<input type="password" class="form-control hide" id="password" placeholder="Enter password" name="password" required>
						<div id="password-toggle" class="input-group-append"><span class="fas input-group-text fa-eye-slash"></span></div>
					</div>
				</div>
				<div class="form-group">
					<label for="confpassword">Confirm Password:</label>
					<div class="input-group mb-3">
						<input type="password" class="form-control hide" id="confpassword" placeholder="Confirm password" name="confpassword" required>
						<div id="password-toggle2" class="input-group-append"><span
										class="fas input-group-text fa-eye-slash"></span></div>
					</div>
				</div>
				<div class="row text-center">
					<button type="submit" class="mx-auto px-5 mt-3 btn btn-primary">Submit</button>
				</div>
			</form>
			<br>
			<div class="container-fluid text-center"> <a href="/login.php" class="pb-5">Already have an account? Login Here</a> </div>
		</div>
	</div>
</div>
<div class="footer">
	<nav class="navbar navbar-bottom navbar-expand my-0 pt-2 pb-2 navbar-dark bg-dark text-center border-bottom-0 border-left-0 border-right-0 border-primary">
		<span class="navbar-text text-center mx-auto my-0 pt-2 pb-2 text-decoration-none"><i class="fas fa-copyright"></i> Avneet Singh, Naveen Gupta - Systems Programming Lab, 2019</span>
	</nav>
</div>
<script src="/static/js/login.js" crossorigin="anonymous"></script>
</body>
</html>
