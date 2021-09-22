<?php
include 'dep_menubar.php';
if (!isset($_SESSION['adminid'])) 
{
	header('location:http://localhost/OES_BS/deplogin.php');
	exit(0);
}
$con1=mysqli_connect('localhost','root','','online_examination_system');

$sql22="select name from course where dep_id='".$_SESSION['adminname']."'";
$result22=mysqli_query($con1,$sql22);
$row22=mysqli_fetch_array($result22);

$sql="select distinct course_id from questions where course_id='".$row22['name']."'";
$result21=mysqli_query($con1,$sql);
$row21=mysqli_num_rows($result21);

$sql5="select distinct year, semister from questions where course_id='".$row22['name']."'";
$result5=mysqli_query($con1,$sql5);
$row5=mysqli_fetch_array($result5);

?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		div#addexamschedule
		{
			width: 55%;
			margin: auto;
		}
	</style>
</head>
<body>
	<div class="container">
		<div id="addexamschedule">

		<?php
			if(isset($_POST['submit']))
			{
				$dep_name=$_SESSION['adminname'];
				$course_name=$_POST['course_name'];
				$type=$_POST['type'];
				$exam_date=$_POST['date'];
				$exam_time=$_POST['time'];
				$year=$row5['year'];
				$semister=$row5['semister'];
				$exam_duration=$_POST['duration'];
				$con=mysqli_connect('localhost','root','','online_examination_system');
				$query="insert into examschedule (dep_name,course_name,type,year,semester,exam_date,exam_time,exam_duration) values ('$dep_name','$course_name','$type','$year','$semister','$exam_date','$exam_time','$exam_duration')";
				$result=mysqli_query($con,$query);
				echo mysqli_error($con);
				if(mysqli_affected_rows($con)>0)
				{
					echo "<p class='alert alert-success text-center'>$result. Exam Schedule is Inserted Successfully.</p>";
							// header('refresh:3;url=addexamschedule.php');
				}
				else
				{
					echo "<p class='alert alert-warning text-center'>Sorry! Exam Schedule is not Inserted.</p>";
				}
				mysqli_close($con);
			}
		?>
		<div align="center">
			<div style = "width:250px; height: 350px; " align = "center">
				<div style = "background-color:#fff; padding:1px;"><h3><i>Add Exam Schedule</i></h3>
				</div>
				<div style = "margin:10px">
	 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
	 	<fieldset>
	 		<div class="form-group">
	 			<select name="course_name" id="course_name" class="form-control" required>
	 				<option value="" required>Select Course</option>
	 				<?php
	 				$i=1; 
	 				while($i<=$row21) 
	 					{
	 						$rec=mysqli_fetch_array($result21);
	 				?>
	 						<option value="<?php echo $rec['course_id']; ?>"><?php echo $rec['course_id']; ?></option>
 					<?php

 							$i++;
 						}

 					?>
	 						
	 					</select>
	 				</div>
	 				<div class="form-group">
					<!-- <label class="control-label">Exam Type :</label> -->
	 					<select name="type" id="type" class="form-control"  required>
	 							<option value="quiz">Quiz</option>
	 							<option value="mid-exam">Mid Exam</option>
	 							<option value="final-exam">Final Exam</option>
	 					</select>
	 				</div>
	 				<div class="form-group">
	 					<!-- <label>Exam Date :</label> -->
	 					<input type="date" placeholder="Enter Exam Date" id="date" name="date" class="form-control" required>
	 				</div>
	 					<div class="form-group">
	 					<!-- <label>Exam time :</label> -->
	 					<input type="time" placeholder="Enter Exam Time" id="time" name="time" class="form-control" required>
	 				</div>
	 					<div class="form-group">
	 					<!-- <label>Exam Duration :</label> -->
	 					<input type="text" placeholder="Enter Exam Duration" id="duration" name="duration" class="form-control" required>
	 				</div>
					<div class="row">
						<div class="col-md-6">
							<input type="submit" name="submit" value="Submit" class="btn btn-success btn-block"style="background-color: #35AF60; border-color: #35AF60">
						</div>
						<div class="col-md-6">
							<input type="reset" name="reset" value="Reset" class="btn btn-block btn-danger" style="background-color: #35AF60; border-color: #35AF60">
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