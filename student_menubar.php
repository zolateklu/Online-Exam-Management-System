<?php
session_start();
include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<div class="container-fluid">
		<nav class="navbar navbar-inverse" style="background-color: #04057B">
			<div class="navbar-header">
				<button class="navbar-toggle" data-toggle="collapse" data-target="#Profiles" type="button">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<p class="navbar-text" style="color: #35AF60;font-weight: bold;">Student Profiles</p>
			</div>
			<div class="collapse navbar-collapse" id="Profiles">
				<ul class="nav navbar-nav">
					<li><a href="pg-dashboard"> Home</a></li>
					<li><a href="final-result">Check Your Result</a></li>
					<li><a href="student-pg-info">Check Your Details</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Update Form <span class="caret"></span></a>
						<ul class="dropdown-menu">
						<li><a href="updatepass.php">Update Password</a></li></ul>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<p class="navbar-text" style="color: #35AF60;font-weight: bold;font-style: italic;">Hello.. 
						<?php echo ucwords("$_SESSION[fname] $_SESSION[lname]");  ?></p>
					<li><a href="student-sign-out">Sign Out</a></li>
				</ul>
			</div>
		</nav>
	</div>
</body>
</html>