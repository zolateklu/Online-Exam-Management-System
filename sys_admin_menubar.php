<?php
session_start();
include 'header.php'; 
?>
<!DOCTYPE html>
<html>
<body>
<div class="container-fluid">
		<nav class="navbar navbar-inverse"style="background-color: #04057B">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#Admin">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<p class="navbar-text" style="color: #1ED660;font-style: italic;font-weight: bold;">Admin Profile</p>
			</div>
			<div class="collapse navbar-collapse" id="Admin">
				<ul class="nav navbar-nav">
					<li><a href="welcomesys_admin.php"> Home</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Adding Form <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="adddepartment.php">Add Department</a></li>
							</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Update Form <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="updatedepartment.php">Update Department</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Delete Form <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="deletedepartment.php">Delete Department</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Viewing Form <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="viewdepartment.php">View Department</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Searching <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="search-by-tables">Search Tables</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<p class="navbar-text" style="color: #1ED660;font-weight: bold;font-style: italic;">
						Hello..<?php echo " ".$_SESSION['adminname']; ?></p>
					<li><a href="log-out"> Sign-Out</a></li>
				</ul>
			</div>
		</nav>
	</div>
</body>
</html>