 <?php
include 'dep_menubar.php';
if (!isset($_SESSION['adminid'])) 
{
	header('location:http://localhost/OES_BS/deplogin.php');
	exit(0);
}
$con=mysqli_connect('localhost','root','','online_examination_system');
$query="select * from course where dep_id='".$_SESSION['adminname']."'";
$result=mysqli_query($con,$query);
$num=mysqli_num_rows($result);

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
				$course_id=$_POST['course_id'];
				$con=mysqli_connect('localhost','root','','online_examination_system');
				$query1="delete from course where course_id=$course_id";
				$result1=mysqli_query($con,$query1);
				echo mysqli_error($con);
				if(mysqli_affected_rows($con)>0)
				{
					echo "<p class='alert alert-success text-center'>$result1. Course Deleted Successfully.</p>";
				}
				else
				{
					echo "<p class='alert alert-warning text-center'>Sorry! Course not Deleted.</p>";
				}
				mysqli_close($con);
			}
		
		?>
				<div align="center">
			<div style = "width:250px; height: 350px; " align = "center">
				<div style = "background-color:#fff; padding:1px;"><h3><i>Update Course</i></h3>
				</div>
				<div style = "margin:10px">
	 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	 	<fieldset>
	 		<div class="form-group">
	 					<select name="course_id" id="course_id" class="form-control" required>
	 							<?php
	 					$i=1; 
	 					while($i<=$num) 
	 						{
	 							$row=mysqli_fetch_array($result);
	 						?>
	 							<option value="<?php echo $row['course_id']; ?>"><?php echo $row['course_id']; ?></option>
 							<?php

 								$i++;
 							}

 							?>
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