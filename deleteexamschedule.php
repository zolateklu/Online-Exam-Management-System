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
// echo mysqli_error($con1);
$row21=mysqli_num_rows($result21);

$sql1="select * from examschedule where dep_name='".$_SESSION['adminname']."'";
$result1=mysqli_query($con1,$sql1);
$num=mysqli_num_rows($result1);

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
				$id=$_POST['id'];
				$con=mysqli_connect('localhost','root','','online_examination_system');
				$query="delete from examschedule where id=$id";
				$result=mysqli_query($con,$query);
				echo mysqli_error($con);
				if(mysqli_affected_rows($con)>0)
				{
					echo "<p class='alert alert-success text-center'>$result. Exam Schedule Deleted Successfully.</p>";
							// header('refresh:3;url=deleteexamschedule.php');
				}
				else
				{
					echo "<p class='alert alert-warning text-center'>Sorry! Exam Schedule not Deleted.</p>";
				}
				mysqli_close($con);
			}
		?>
		<div align="center">
			<div style = "width:250px; height: 350px; " align = "center">
				<div class="align text-left" style = "background-color:#fff;width:300px; padding:1px;"><h3><i>Delete Exam Schedule</i></h3>
				</div>
				<div style = "margin:10px">
	 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
	 	<fieldset>
	 		<div class="form-group">
	 			<select name="id" id="id" class="form-control" required>
	 				<?php
	 				$i=1; 
	 				while($i<=$num) 
	 					{
	 				    		$rown=mysqli_fetch_array($result1);
	 					?>
	 				<option value="<?php echo $rown['id']; ?>"><?php echo $rown['id']; ?></option>
	 				<?php
						$i++;
 						}?> 
 				</select>
	 		</div>
					<div class="row">
						<div class="col-md-6">
							<input type="submit" name="submit" value="Submit" class="btn btn-success btn-block"style="background-color: #35AF60; border-color: #35AF60">
						</div>
						<div class="col-sm-6">
							<a href="welcomedep.php" class="btn btn-block btn-info" style="background-color: #35AF60; border-color: #35AF60">&#8810; Go Back</a>
						</div>
					</div>
	 	</fieldset>
	 </form>
	</div>
</div>
</div>
</div>
	</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<?php include 'footer.php'; ?>
</body>
</html>