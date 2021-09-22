<?php
include 'dep_menubar.php';
if (!isset($_SESSION['adminid']))
{
	header('location:http://localhost/OES_BS/deplogin.php');
	exit(0);
}
$con=mysqli_connect("localhost","root","","online_examination_system");
$result=mysqli_query($con,"select name from course");

?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		div#search{
			width: 50%;
			margin: auto;
		}
		th,td
		{
			text-align: center;
		}
	</style>
	<script type="text/javascript">
		function validateRefid()
		{
			var c=document.getElementById('reg_id').value;
			if(c=="")
			{
				alert('Please Enter a Valid Registered ID !');
				document.getElementById('reg_id').focus();
				return false;
			}
		}
	</script>
</head>
<body>
	<div id="search">
		<form class="form-horizontal" action="" method="post">
			<div class="text-center text-primary">
				<h4>Search Registered Students With The Student ID</h4>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-4">Search Students By:</label>
				<div class="col-sm-6">
					<input type="number" name="reg_id" id="reg_id" placeholder="Registered ID" class="form-control">
				</div>
				<div class="col-sm-2">
					<button type="submit" name="search_by_id" onclick="return validateRefid()" class="btn btn-success">
						<span class="glyphicon glyphicon-search"></span> Search
					</button>
				</div>
			</div>
		</form>
		<?php
			if(isset($_POST['search_by_id']))
			{
				$reg_id=$_POST['reg_id'];
				$resid=mysqli_query($con,"select * from students where stuid=$reg_id and dep_name='".$_SESSION['adminname']."'");
				echo mysqli_error($con);
				if(mysqli_num_rows($resid)>0)
				{
					$resrec=mysqli_fetch_array($resid);
					?>
						<div class="table-responsive">
							<table class="table table-bordered">
							<tr class="info text-warning">
								<th>First Name</th>
								<th>Last Name</th>
								<!-- <th>Course</th> -->
								<th>Phone Number</th>
								<th>Email Address</th>
								<th>Gender</th>
								<th >Student ID</th>
								<th>Country</th>
								
							</tr>
							<tr>
								<td><?php echo ucfirst($resrec['fname']); ?></td>
								<td><?php echo ucfirst($resrec['lname']); ?></td>
								<td><?php echo $resrec['phone']; ?></td>
								<td><?php echo $resrec['email']; ?></td>
								<td><?php echo $resrec['gender']; ?></td>
								<td ><?php echo $resrec['stuid']; ?></th>
								<td><?php echo $resrec['country']; ?></td>
							</tr>
							<tr>
								<th colspan="7">
									<a href="welcomedep.php" class="btn btn-info btn-block">&#8810; Go Back</a>
								</th>
							</tr>
							</table>
						</div>
					<?php
				}
				else
				{
					echo "<p class='alert alert-danger text-center'><strong>Sorry! No Records Found.</strong></p>";
				}
			}

		?>
	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<?php include 'footer.php'; ?>
</body>
</html>