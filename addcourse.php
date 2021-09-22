 <?php
include 'dep_menubar.php';
if (!isset($_SESSION['adminid'])) 
{
	header('location:http://localhost/OES_BS/deplogin.php');
	exit(0);
}
$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'online_examination_system');
$query="select * from course_category order by cname asc";
$result=mysqli_query($con,$query);

$row=mysqli_num_rows($result);
$query2="select * from department where name='".$_SESSION['adminname']."'";
$result2=mysqli_query($con,$query2);
$num=mysqli_num_rows($result2);
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
	<!--<link rel="stylesheet" type="text/CSS" href="CSS/addcourse.css">-->
	<script type="text/javascript" src="JavaScript/addcourse.js"></script>
	<style type="text/css">
		div#addcourse
		{
			width: 55%;
			margin: auto;
		}
	</style>
</head>
<body>
	<div class="container">
		<div id="addcourse">

		<?php
			if (isset($_POST['submit']))
			{
				$cc=$_POST['course_catagory'];
				$course=$_POST['course'];
				$dep=$_SESSION['adminname'];
				$year=$_POST['year'];
				$semister=$_POST['semister'];
				$con=mysqli_connect('localhost','root','','online_examination_system');
				$query="INSERT into course(c_c_id,name,dep_id,year,semister) values($cc,'$course','$dep',$year,$semister)";
				$result1=mysqli_query($con,$query);
				// echo mysqli_error($con);
				if(mysqli_affected_rows($con)>0)
				{
					echo "<p class='alert alert-success text-center'>$result1. Course is Inserted Successfully. Now to Add Instructor for the course <a href='addinstructor.php'>Click here</a></p>";
							// header('refresh:3;url=add-course');
				}
				else
				{
					echo "<p class='alert alert-warning text-center'>Sorry! Course is not Inserted. or may be duplicate</p>";
				}
				mysqli_close($con);
			}
		
		?>
				<div align="center">
			<div style = "width:250px; height: 350px; " align = "center">
				<div style = "background-color:#fff; padding:1px;"><h3><i>Add Course</i></h3>
				</div>
				<div style = "margin:10px">
	 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	 	<fieldset>
	 				<div class="form-group">
	 					<select name="course_catagory" id="course_catagory" class="form-control" required>
	 						<option value="" required>Select Course Category</option>
	 						<?php
	 						$i=1; 
	 						while($i<=$row) 
	 						{
	 							$rec=mysqli_fetch_array($result);
	 						?>
	 							<option value="<?php echo $rec['category_id']; ?>"><?php echo $rec['cname']; ?></option>
 							<?php

 								$i++;
 							}

 							?>
	 						
	 					</select>
	 				</div>
	 				<div class="form-group">
	 					<input type="text" name="course" id="course" placeholder="Enter Course Name" class="form-control" required>
	 				</div>
	 				
				<div class="form-group">
	 					<select name="year" id="year" class="form-control" required>
	 						<option value="" required>Select enrolling year</option>
	 						
	 							<option value="1">1st year</option>
	 							<option value="2">2nd year</option>
	 							<option value="3">3rd year</option>
	 							<option value="4">4th year</option>
	 							<option value="5">5th year</option>
	 					</select>
	 				</div>
			
				<div class="form-group">
	 					<select name="semister" id="semister" class="form-control" required>
	 						<option value="" required>Select current semister</option>
	 						<option value="1">1</option>
	 						<option value="2">2</option>
	 						<option value="3">3</option>
	 					</select>
	 				</div>
	 				
	 				<div class="row">
	 					<div class="col-md-6">
	 						<input type="submit" name="submit" value="Submit" class="btn btn-success btn-block" style="background-color: #35AF60; border-color: #35AF60">
	 					</div>
	 					<div class="col-md-6">
	 						<a href="admin-dashboard" class="btn btn-info btn-block" style="background-color: #35AF60; border-color: #35AF60">&#8810; Go Back</a>
	 					</div>
	 				</div>
	 	</fieldset>
	 </form>
	</div>
</div>
</div>

</div>
	</div><br><br><br><br><br><br><br><br><br><br>
	<?php include 'footer.php'; ?>
</body>
</html>