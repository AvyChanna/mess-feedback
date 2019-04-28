<?php session_start(); ?>
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
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button> 
			<div class="collapse navbar-collapse"> 
				<ul class="navbar-nav mr-auto"> 
					<li class="nav-item"> <a class="nav-link" href="/manager.php">Home</a> </li> 
					<li class="nav-item active"> <a class="nav-link" href="#">View Notices<span class="sr-only">(current)</span></a> </li>
				</ul> 
		<!-- TODO Logged in already? Display Logout  -->
		<button id="logoutbutton" class="btn btn-primary my-2 my-sm-0">Logout</button> 
			</div> 
	</nav>
</div>
<div class="container-fluid main page">
	<div class="text-light pt-5 pb-5 pb-md-0">
		<h1 class="text-center display-5 pt-2">Mess Management Login</h1>
        <div class="col-12 col-sm-10 col-md-8 col-xl-6 offset-0 offset-xl-3 offset-md-2 offset-sm-1 pb-5"><hr></div>
		<div class="col-12 col-sm-8 col-md-6 col-xl-4 offset-0 offset-xl-4 offset-md-3 offset-sm-2 pb-5"> 
			<!-- TODO add signup api uri -->
			<form action="#" method="POST">
	</div>
</div>
<div class="footer">
	<nav class="navbar navbar-bottom navbar-expand my-0 pt-2 pb-2 navbar-dark bg-dark text-center border-bottom-0 border-left-0 border-right-0 border-primary">
		<span class="navbar-text text-center mx-auto my-0 pt-2 pb-2 text-decoration-none"><i class="fas fa-copyright"></i> Avneet Singh, Naveen Gupta - Systems Programming Lab, 2019</span>
	</nav>
</div>
<!-- <script defer src="/static/js/clipboard.js" crossorigin="anonymous"></script> --> 
<script src="/static/js/customuser.js" crossorigin="anonymous"></script>
<script src="/static/js/custom.js" crossorigin="anonymous"></script>
</body>
</html>