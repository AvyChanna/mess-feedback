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
                        <li class="nav-item"> <a class="nav-link" href="/admin.php">Home</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="/add_mess.php">Add Mess</a> </li>
						<li class="nav-item active"> <a class="nav-link" href="#">Remove Mess<span
									class="sr-only">(current)</span></a> </li>
						<li class="nav-item"> <a class="nav-link" href="/update_mess.php">Update Mess</a> </li>
						<li class="nav-item"> <a class="nav-link" href="/add_students.php">Add Students</a> </li>
						<li class="nav-item"> <a class="nav-link" href="/remove_students.php">Remove Students</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="/add_keywords.php">Add Keywords</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="/add_remove_keywords.php">Remove Keywords</a>
						</li>
						<li class="nav-item"> <a class="nav-link" href="/admin_change_password.php">Change Password</a>
						</li>
					</ul>
					<!-- TODO Logged in already? Display Logout  -->
					<button id="logoutbutton" class="btn btn-primary my-2 my-sm-0">Logout</button>
				</div>
			</nav>
		</div>
		<div class="container-fluid main page">
			<div class="text-light pt-5 pb-5 pb-md-0">
				<h1 class="text-center display-5 pt-2">Mess Management Login</h1>
				<div class="col-12 col-sm-10 col-md-8 col-xl-6 offset-0 offset-xl-3 offset-md-2 offset-sm-1 pb-5">
					<hr>
				</div>
				<div class="col-12 col-sm-8 col-md-6 col-xl-4 offset-0 offset-xl-4 offset-md-3 offset-sm-2 pb-5">
					<!-- TODO add signup api uri -->
					<div class="form-group">
						<div class="input-group">
							<input type="text" name="search_text" id="search_text"
								placeholder="Search by Student Details" class="form-control" />
							<div class="input-group-append bg-dark"> <span class="input-group-text">Search</span> </div>
						</div>
					</div>
				</div>
				<div id="result"></div>
			</div>
		</div>
	</div>
	<footer class="footer text-center">
		<hr> <span class="text-center mx-auto my-0 py-0"><i class="fas fa-copyright"></i> Avneet Singh, Naveen
			Gupta - Systems Programming Lab, 2019</span>
	</footer>
	<!-- <script defer src="/static/js/clipboard.js" crossorigin="anonymous"></script> -->
	<script src="/static/js/logout_button.js" crossorigin="anonymous"></script>
	<script>
		$(function () {
			function load_data(query) {
				$.ajax({
					url: "/remove_mess.php",
					method: "POST",
					data: {
						query: query
					},
					success: function (data) {
						$('#result').html(data);
						$(".btn_delete").click(function (){
							var id = $(this).data("id4");
							console.log("hello");
							if (confirm("Are you sure you want to delete this?")) {
								$.ajax({
									url: "/remove_mess_api.php",
									method: "POST",
									data: {
										id: id
									},
									dataType: "text",
									success: function (data) {
										load_data();
									}
								});
							}
						});
					}
				});
			}
			load_data();
			$('#search_text').keyup(function () {
				var search = $(this).val();
				if (search != '') {
					load_data(search);
				} else {
					load_data();
				}
			});
		});
	</script>
</body>

</html>