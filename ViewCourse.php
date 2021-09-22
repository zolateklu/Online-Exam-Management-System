 <?php
include 'dep_menubar.php';
if (!isset($_SESSION['adminid']))
{
	header('location:http://localhost/OES_BS/deplogin.php');
}

$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'online_examination_system');
$query="SELECT * FROM course where dep_id='".$_SESSION['adminname']."'";
$result=mysqli_query($con,$query);	//Associative Array 
$num=mysqli_num_rows($result);
mysqli_close($con);

?>

<!DOCTYPE html>
<html>
<head>
	<!--<link rel="stylesheet" type="text/css" href="CSS/viewrecords.css">-->
	<style type="text/css">
		div#veiwcourse
		{
			width: 70%;
			margin: auto;
		}
		th,td{
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="container">
		<div id="veiwcourse" class="table-responsive">
			<?php if(isset($_COOKIE['error']))
				echo $_COOKIE['error'];
			?>
		<table class="table table-bordered">
			<thead>
				<tr class="success">
					<th colspan="6"><h2 class="text-center text-primary">Courses</h2></th>
				</tr>
				<tr class="active text-success">
					<th>No.</th>
					<th>Course ID</th>
					<th>Course Name</th>
					<th>Enrolling Year</th>
					<th>Semister</th>
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
						<td><?php echo $rows['name'];  ?></td>
						<td><?php echo $rows['year'];  ?></td>
						<td><?php echo $rows['semister'];  ?></td>
					</tr>

				<?php
					$i++;		

					}
				?>
				<tr>
					<th colspan="6">
						<a href="welcomedep.php" class="btn btn-info btn-block">&#8810; Go Back</a>
					</th>
				</tr>
			</tbody>
		</table>
		</div>
	</div><br><br><br><br><br><br><br><br><br><br><br>
	<?php include 'footer.php'; ?>
	</body>
</html>