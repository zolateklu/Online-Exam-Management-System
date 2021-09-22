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
				<p class="navbar-text" style="color: #1ED660;font-style: italic;font-weight: bold;">Department Profile</p>
			</div>
			<div class="collapse navbar-collapse" id="Admin">
				<ul class="nav navbar-nav">
					<li><a href="welcomedep.php"> Home</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Adding Form <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="add-course">Add Course</a></li>
							<li><a href="sign-up">Add Student</a></li>
							<li><a href="addinstructor.php">Add Instructor</a></li>
							<li><a href="addexamschedule.php">Add Exam Schedule</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Update Form <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="updatecourse.php">Update Course</a></li>
							<li><a href="updatestudent.php">Update Student</a></li>
							<li><a href="updateinstructor.php">Update Instructor</a></li>
							<li><a href="updateexamschedule.php">Update Exam Schedule</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Delete Form <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="deletecourse.php">Delete Course</a></li>
							<li><a href="deletestudent.php">Delete Student</a></li>
							<li><a href="deleteinstructor.php">Delete Instructor</a></li>
							<li><a href="deleteexamschedule.php">Delete Exam Schedule</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Viewing Form <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="view-course">View Courses</a></li>
							<li><a href="viewinstructor.php">View Instructor</a></li>
							<li><a href="student-registrations">View Student</a></li>
							<li><a href="dep_viewquestion.php">View question</a></li>
							<li><a href="ExamSchedule.php">View exam Schedule</a></li>
							<li><a href="attended-exam">Exam Given</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Searching <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<!-- <li><a href="exam-results">Selected/Waiting</a></li> -->
							<li><a href="search-by-courses">Search Students</a></li>
							<!-- <li><a href="search-by-tables">Search Tables</a></li> -->
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<p class="navbar-text" style="color: #1ED660;font-weight: bold;font-style: italic;">
						<?php echo " ".$_SESSION['adminname']; ?></p>
					<li><a href="log-out"> Sign-Out</a></li>
				</ul>
			</div>
		</nav>
	</div>
</body>
</html>