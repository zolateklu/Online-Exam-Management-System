<?php
include 'dep_menubar.php';
if (!isset($_SESSION['adminid'])) 
{
	header('location:http://localhost/OES_BS/deplogin.php');
}
date_default_timezone_set('Africa/Addis_Ababa');

$con=mysqli_connect('localhost','root','','online_examination_system');
$query="select * from instructor where dep_name='".$_SESSION['adminname']."'";
$result=mysqli_query($con,$query);
$num=mysqli_num_rows($result);
mysqli_close($con);

?>


<!DOCTYPE html>
<html>
<head>
		<style type="text/css">
		div#veiwrecords
		{
			width: 40%;
			margin: auto;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div id="viewrecords" class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr class="success">
						<th colspan="16" class="text-center text-success"><h2>Instructor Records</h2></th>
					</tr>
					<tr class="info text-muted">
						<th>Instructor Id</th>
						<th>Full Name</th>
						<th>Mobile Number</th>
						<th>Password</th>
						<th>Email Address</th>
						<th>Country</th>
						<th>Gender</th>
						<th>Course Name</th>
					</tr>
				</thead>
				<tbody>
					<?php
						for($i=1;$i<=$num;$i++)
						{ 
							$rows=mysqli_fetch_array($result);

					?>
					
						<tr>
							<td><?php echo $rows['ins_id'];  ?></td>
							<td><?php echo $rows['name'];  ?></td>
							<td><?php echo $rows['phone'];  ?></td>
							<td><?php echo $rows['password'];  ?></td>
							<td><?php echo $rows['email'];  ?></td>
							<td><?php echo $rows['country'];  ?></td>
							<td><?php echo $rows['gender'];  ?></td>
							<td><?php echo $rows['course_name'];  ?></td>
						</tr>


					<?php		

						}
					?>
					<tr>
						<th colspan="16">
							<a href="welcomedep.php" class="btn btn-info btn-block">&#8810; Go Back</a>
						</th>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<?php include 'footer.php'; ?>
</body>
</html>