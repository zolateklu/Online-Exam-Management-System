<?php
include 'dep_menubar.php';
if (!isset($_SESSION['adminid']))
{
	header('location:http://localhost/OES_BS/deplogin.php');
	exit(0);
}

$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'online_examination_system');
$query="select * from alreadyloggedin";
$result=mysqli_query($con,$query);
$num=mysqli_num_rows($result);
mysqli_close($con);

?>

<!DOCTYPE html>
<html>
<head>
	<!--<link rel="stylesheet" type="text/css" href="CSS/viewrecords.css">-->

</head>
<body>
	<?php
		if ($num>0) {
			
	?>
	<div class="container-fluid">
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr class="success">
						<th colspan="15" class="text-center text-primary"><h2>Students Already Logged Records</h2></th>
					</tr>
					<tr class="danger text-success">
						<th>First Name</th>
						<th>Last Name</th>
						<th>Student Id</th>
						<th>Course</th>
						<th>Enrolling Year</th>
						<th>Semister</th>
						<th>Exam Type</th>
						<th>Mobile Number</th>
						<th>Email Address</th>
						<th>Date & Time</th>
					</tr>
				</thead>
				<tbody>
					<?php
						for($i=1;$i<=$num;$i++)
						{ 
							$rows=mysqli_fetch_array($result);

					?>
					
						<tr>
							<td><?php echo $rows['fname'];  ?></td>
							<td><?php echo $rows['lname'];  ?></td>
							<td><?php echo $rows['student_id'];  ?></td>
							<td><?php echo $rows['course'];  ?></td>
							<td><?php echo $rows['year'];  ?></td>
							<td><?php echo $rows['semister'];  ?></td>
							<td><?php echo $rows['type'];  ?></td>
							<td><?php echo $rows['phone'];  ?></td>
							<td><?php echo $rows['email'];  ?></td>
							<td><?php echo $rows['datetime'];  ?></td>
						</tr>


					<?php		

						}
					?>
					<tr>
						<th colspan="15">
							<a href="welcomedep.php" class="btn btn-info btn-block">&#8810; Go Back</a>
						</th>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<?php include 'footer.php'; ?>
<div>
	<?php
	}else{
		echo "<p class='alert alert-danger text-center'><strong>Sorry! No Records Found.</strong></p>";
		?>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<?php
	 include 'footer.php';
	}
	?>
	
</body>
</html>