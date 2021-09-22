 <?php
include 'sys_admin_menubar.php';
if (!isset($_SESSION['adminid'])) 
{
	header('location:http://localhost/OES_BS/sys_adminlogin.php');
}
date_default_timezone_set('Africa/Addis_Ababa');

$con=mysqli_connect('localhost','root','','online_examination_system');
$query="select * from department";
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
	<div class="container">
		<div id="viewrecords" class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr class="success">
						<th colspan="15" class="text-center text-success"><h2>Department</h2></th>
					</tr>
					<tr class="info text-muted">
						<th>Department Name</th>
						<th>Password</th>
						</tr>
				</thead>
				<tbody>
					<?php
						for($i=1;$i<=$num;$i++)
						{ 
							$rows=mysqli_fetch_array($result);

					?>
					
						<tr>
							<td><?php echo $rows['name'];  ?></td>
							<td><?php echo $rows['password'];  ?></td>
							</tr>


					<?php		

						}
					?>
					<tr>
						<th colspan="15">
							<a href="welcomesys_admin.php" class="btn btn-info btn-block">&#8810; Go Back</a>
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