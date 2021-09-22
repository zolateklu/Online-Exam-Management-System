<?php
// include 'header.php';
include 'dep_menubar.php';
if (!isset($_SESSION['adminid']))
{
	header('location:http://localhost/OES_BS/deplogin.php');
}
$con=mysqli_connect('localhost','root','','online_examination_system');
$query="select * from examschedule where dep_name='".$_SESSION['adminname']."' and exam_date>=curdate()";
$result=mysqli_query($con,$query);
$row=mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html>
<head>
	<!--<link rel="stylesheet" type="text/CSS" href="CSS/ExamSchedule.css">-->
	<style type="text/css">
		div#ExamSchedule
		{
			width: 70%;
			margin: auto;
		}
	</style>
</head>
<body>
	<div>
	</div>
	<div class="container">
		<div id="ExamSchedule">
<table class="table table-bordered">
	<thead>
		<tr>
			<th colspan="8" class="text-center text-primary" style="font-size: 18px;font-style: italic;color: #35AF60">Examination Informations</th>
		</tr>
	</thead>
	<tbody>
		<tr class="text-success success">
			<th>ID</th>
			<th>Course Name</th>
			<th>Instructor Name</th>
			<th>Exam Type</th>
			<th>Exam Dates</th>
			<th>Exam Timings</th>
			<th>Exam Durations</th>
		</tr>
			<?php
				while ($rec=mysqli_fetch_array($result)) 
				{
					
			?>
			<tr class="btech">
				<?php
				$sql="select name from instructor where course_name='".$rec['course_name']."' and dep_name='".$rec['dep_name']."'";
				$rql=mysqli_query($con,$sql);
				$res=mysqli_fetch_array($rql);
				?>
				<th><?php echo $rec['id']; ?></th>
				<th><?php echo $rec['course_name']; ?></th>
				<th><?php echo $res['name']; ?></th>
				<th><?php echo $rec['type']; ?></th>
				<th><?php echo $rec['exam_date']; ?></th>
				<th><?php echo $rec['exam_time']; ?></th>
				<th><?php echo $rec['exam_duration']; ?></th>
			</tr>	
			<?php

				}
			?>
	</tbody>
	

</table>
</div>
	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<?php include 'footer.php'; ?>
</body>
</html>