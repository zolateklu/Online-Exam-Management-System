 <?php
include 'admin_menubar.php';
if (!isset($_SESSION['adminid'])) 
{
	header('location:http://localhost/OnlineExamination1/admin-login');
}
$con=mysqli_connect('localhost','root','','online_examination_system');

$sqlq="select course_name from instructor where ins_id='".$_SESSION['adminid']."'";
$qlsq=mysqli_query($con,$sqlq);
$rowr=mysqli_fetch_array($qlsq);

$queryq="SELECT question_id from questions where course_id='".$rowr['course_name']."'";
$resultq=mysqli_query($con,$queryq);
echo mysqli_error($con);	 
$numq=mysqli_num_rows($resultq);
// $rowres=mysqli_fetch_array($resultq);
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
	<!--<link rel="stylesheet" type="text/CSS" href="CSS/addquestion.css">-->
	<script type="text/javascript" src="JavaScript/addquestion.js"></script>
	<style type="text/css">
		div#addcourse
		{
			width: 73%;
			margin: auto;
		}
	</style>
</head>
<body>
	<div class="container">
		<div id="addcourse">
		
		<?php
				
			if(isset($_POST['submit']))
			{	
				$id=$_POST['id'];

				$con=mysqli_connect('localhost','root','','online_examination_system');
				$sql="delete from questions where question_id=$id";; 
				$result1=mysqli_query($con,$sql);	//Accociative Array represented by Result
				echo mysqli_error($con);
				if(mysqli_affected_rows($con)>0)
				{
					echo "<p class='alert alert-success text-center'>$result1. Question Deleted Successfully.</p>";
							header('refresh:3;url=deletequestion.php');
				}
				else
				{
					echo "<p class='alert alert-warning text-center'>Sorry! Question not Deleted.</p>";
				}
				mysqli_close($con);
			}	
		?>
		
	 <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return AddQuestion()">
	 	<fieldset>
	 		<legend align="center"><h2>Delete Questions</h2></legend>
	 			<div class="form-group">
	 				<label class="control-label col-sm-2">Question ID :</label>
	 				<div class="col-sm-10">
	 					<select name="id" id="id" class="form-control">
								<?php

								for($j=1;$j<=$numq;$j++)
								{
									$rowres=mysqli_fetch_array($resultq);
								?>

								<option value="<?php echo $rowres['question_id']; ?>" selected><?php echo $rowres['question_id']; ?></option>

								<?php
								}

								?>
						</select>
	 				</div>
	 			</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="row">
							<div class="col-sm-4">
								<input type="submit" name="submit" value="Submit" class="btn btn-success btn-block" style="background-color: #35AF60; border-color: #35AF60">
							</div>
							<div class="col-sm-4">
								<a href="admin-dashboard" class="btn btn-block btn-info" style="background-color: #35AF60; border-color: #35AF60">&#8810; Go Back</a>
							</div>
						</div>
					</div>
				</div>
	 	</fieldset>
	 </form>
</div>
	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<?php include 'footer.php'; ?>
</body>
</html>