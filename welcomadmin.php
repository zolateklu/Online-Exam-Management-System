<?php
session_start();
include 'header.php';
if (!isset($_SESSION['adminid'])) 
{
	header('location:http://localhost/OES_BS/admin-login');
}
else
{
	$con=mysqli_connect('localhost','root');
	mysqli_select_db($con,'online_examination_system');
	$query="select name from instructor where ins_id='$_SESSION[adminid]'";
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_array($result);
	$_SESSION['adminname']=$row['name'];
	mysqli_close($con);
}

?>

<!DOCTYPE html>
<html>
<body>
	<div class="container-fluid">
		<nav class="navbar navbar-inverse"  style="background-color: #04057B">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#Admin">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<p class="navbar-text" style="color: #35AF60;font-style: italic;font-weight: bold;">Instructor Profile</p>
			</div>
			<div class="collapse navbar-collapse" id="Admin">
				<ul class="nav navbar-nav">
					<li><a href="admin-dashboard"> Home</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Adding Form <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="add-question">Add Question</a></li>
							
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Update Form<span class="caret"></span></a>
						<ul class="dropdown-menu">
						<li><a href="update_ins_pass.php">Update Password</a></li>
						<li><a href="updatequestion.php">Update Questions</a></li>	
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Delete Form<span class="caret"></span></a>
						<ul class="dropdown-menu">
						<li><a href="deletequestion.php">Delete Questions</a></li>	
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Viewing Form <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<!-- <li><a href="view-course">View Courses</a></li> -->
							<!-- <li><a href="view-center">View Centers</a></li> -->
							<li><a href="view-questions">View Questions</a></li>
							<li><a href="result.php">Student Results</a></li>
							<!-- <li><a href="attended-exam">Exam Given</a></li> -->
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<p class="navbar-text" style="color: #35AF60;font-weight: bold;font-style: italic;">
						Hello..<?php echo " ".$row['name']; ?></p>
					<li><a href="log-out"> Sign-Out</a></li>
				</ul>
			</div>
		</nav>
	</div>
<div class="container">
	<div id="menu">
		<h2 class="text-center text-primary text-success">Welcome To Instructor Dashboard</h2>
		<h3 class="text-center text-success" style="font-style: italic;">Hi,<?php echo " ".$row['name']; ?></h3>
	</div>
</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include 'footer.php'; ?>
</body>
</html>