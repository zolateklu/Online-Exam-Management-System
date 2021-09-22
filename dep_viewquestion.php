<?php
include 'dep_menubar.php';
if (!isset($_SESSION['adminid']))
{
	header('location:http://localhost/OES_BS/admin-login');
}

$con = mysqli_connect('localhost','root','','online_examination_system');

$query2="SELECT name from course where dep_id='".$_SESSION['adminname']."'";
$result2=mysqli_query($con,$query2);
$row2=mysqli_fetch_array($result2);

$query21="SELECT distinct course_id from questions where course_id='".$row2['name']."'";
$result21=mysqli_query($con,$query21);	 
$num21=mysqli_num_rows($result21); 

$query = "SELECT * from questions where course_id='".$row2['name']."'";
$result = mysqli_query($con,$query);	
$num = mysqli_num_rows($result);
mysqli_close($con);

?>

<!DOCTYPE html>
<html>
<head>
	<!--<link rel="stylesheet" type="text/css" href="CSS/viewrecords.css">-->
	<style type="text/css">
		th,td
		{
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div id="viewquestion" class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th colspan="12">
							<form class="form-inline" action="view-questions" method="post">
							  <div class="form-group">
							    <label for="course_id">Course:</label>
							    <select class="form-control" name="course_id">
							    <?php

								for($j=1;$j<=$num21;$j++)
								{
									$row=mysqli_fetch_array($result21);
								?>

								<option value="<?php echo $row['course_id']; ?>" selected><?php echo $row['course_id']; ?></option>

								<?php
								}

								?>
							    </select>
							  </div>
							</form>
						</th>
					</tr>
					<tr class="info">
						<th colspan="12" class="text-center text-success"><h2>All Questions <span style="color: red;">[<?php echo $num; ?>]</span></h2></th>
					</tr>
					<tr class="warning text-primary">
						<th>No.</th>
						<th>Course Name</th>
						<th>Enrolling Year</th>
						<th>Semister</th>
						<th>Exam Type</th>
						<th>Question Name</th>
						<th>Option A</th>
						<th>Option B</th>
						<th>Option C</th>
						<th>Option D</th>
						<th>Correct Option</th>
						<th>Created Datetime</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$i=1;
						$counter = 1;
						while($i<=$num)
						{ 
							$rows=mysqli_fetch_array($result);

					?>
					
						<tr>
							<td><?php echo $counter++;  ?></td>
							<td><?php echo $rows['course_id'];  ?></td>
							<td><?php echo $rows['year'];  ?></td>
							<td><?php echo $rows['semister'];  ?></td>
							<td><?php echo $rows['type'];  ?></td>
							<td><?php echo $rows['name'];  ?></td>
							<td><?php echo $rows['optionA'];  ?></td>
							<td><?php echo $rows['optionB'];  ?></td>
							<td><?php echo $rows['optionC'];  ?></td>
							<td><?php echo $rows['optionD'];  ?></td>
							<td><?php echo $rows['correct_option'];  ?></td>
							<td><?php echo $rows['datetime'];  ?></td>
						</tr>


					<?php
						$i++;		

						}
					?>
					<tr>
						<th colspan="12">
							<a href="welcomedep.php" class="btn btn-info btn-block">&#8810; Go Back</a>
						</th>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<br><br><br><br><br><br><br><br><br>
	<?php include 'footer.php'; ?>
</body>
</html>