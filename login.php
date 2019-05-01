<?php
session_start();
if(  (isset($_SESSION["loggedin"]))   &&   ($_SESSION["loggedin"]=="t")){
	header("Location: home.php");
	die();
}
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
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
			</nav>
		</div>
		<div class="container-fluid main page">
			<div class="text-light pt-5 pb-5 pb-md-0">
				<h1 class="text-center display-5 pt-2">Mess Management Login</h1>
				<div class="col-12 col-sm-10 col-md-8 col-xl-6 offset-0 offset-xl-3 offset-md-2 offset-sm-1 pb-5">
					<hr>
				</div>
				<div class="col-12 col-sm-8 col-md-6 col-xl-4 offset-0 offset-xl-4 offset-md-3 offset-sm-2 pb-5">
				<?php
				if(  (!isset($_SESSION["loggedin"]))   ||   ($_SESSION["loggedin"]=="f")){
					if($_SERVER['REQUEST_METHOD']=='POST'){
						$mysqli = new mysqli('localhost', 'root', '','mess') or die("Connect failed: %s\n". $conn -> error);
						$username = $mysqli->real_escape_string($_POST['username']);
						//$password = md5($_POST['password']);
						$password = $mysqli->real_escape_string($_POST['password']);
						$sql = "SELECT * FROM users WHERE username='".$username."'";
						$result = mysqli_query($mysqli, $sql);
						if (($mysqli->query($sql))){
							if (mysqli_num_rows($result) == 1) {
								$row = mysqli_fetch_assoc($result);
								if ($row == false) die();
								if($row["passwordhash"]==$password){
									$_SESSION["loggedin"]="t";
									$_SESSION["status"]=$row["status"];
									$_SESSION["username"]=$row["username"];
									$_SESSION["name"]=$row["name"];
									$_SESSION["rollno"]=$row["rollno"];
									$_SESSION["mess"]=$row["mess"];
									$_SESSION["password"]=$row["passwordhash"];
									header('location: ../home.php');
									die();
								} else echo ("Password is incorrect");
							} else 
							{echo("Username is incorrect");}
							//mysqli_close($mysqli);
						} 
					}
				} else if(  (isset($_SESSION["loggedin"]))   &&   ($_SESSION["loggedin"]=="t")){
					header('Location: ../home.php');
					die();
				}
				?>
					<form action="#" method="POST">
						<div class="form-group">
							<label for="uname">Username:</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control" id="username" placeholder="Enter username"
									name="username" required>
								<div class="input-group-append bg-dark"> <span
										class="input-group-text">@iitg.ac.in</span> </div>
							</div>
						</div>
						<div class="form-group">
							<label for="pwd">Password:</label>
							<div class="input-group mb-3">
								<input type="password" class="form-control hide" id="password"
									placeholder="Enter password" name="password" required>
								<div id="password-toggle" class="input-group-append"><span
										class="fas input-group-text fa-eye-slash"></span></div>
							</div>
						</div>
						<div class="row text-center">
							<button type="submit" class="mx-auto px-5 mt-3 btn btn-primary">Submit</button>
						</div>
					</form>
					<br>
					<div class="container-fluid text-center"> <a href="/signup.php" class="mb-5">Don't have an account?
							Register Here</a> </div>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer text-center">
		<hr> <span class="text-center mx-auto my-0 py-0"><i class="fas fa-copyright"></i> Avneet Singh, Naveen Gupta -
			Systems Programming Lab, 2019</span>
	</footer>
	<script src="/static/js/login.js" crossorigin="anonymous"></script>
</body>

</html>