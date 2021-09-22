 <?php
include 'admin_menubar.php';
if (!isset($_SESSION['adminid'])) 
{
	header('location:http://localhost/OnlineExamination1/admin-login');
}

$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'online_examination_system');
$query="SELECT course_name from instructor where ins_id='".$_SESSION['adminid']."'";
$result=mysqli_query($con,$query);	 
$num=mysqli_num_rows($result);
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
				$year=$_POST['year'];
				$semister=$_POST['semister'];
				$courseId=$_POST['course'];
				// $dep=$_SESSION['dep_name'];
				$type=$_POST['type'];
				$question=$_POST['question'];
				$optionA=$_POST['optionA'];
				$optionB=$_POST['optionB'];
				$optionC=$_POST['optionC'];
				$optionD=$_POST['optionD'];
				$correctoption=$_POST['correctoption'];

				$con=mysqli_connect('localhost','root','','online_examination_system');
				$sql="insert into questions (course_id, type, name, optionA, optionB, optionC, optionD, correct_option,datetime,year,semister) values ('$courseId','$type','$question','$optionA','$optionB','$optionC','$optionD','$correctoption',NOW(),$year,$semister)"; 
				$result1=mysqli_query($con,$sql);	//Accociative Array represented by Result
				echo mysqli_error($con);
				if(mysqli_affected_rows($con)>0)
				{
					echo "<p class='alert alert-success text-center'>$result1. Question is Inserted Successfully.</p>";
							header('refresh:3;url=add-question');
				}
				else
				{
					echo "<p class='alert alert-warning text-center'>Sorry! Question is not Inserted.</p>";
				}
				mysqli_close($con);
			}	
		?>
		
	 <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return AddQuestion()">
	 	<fieldset>
	 					<legend align="center"><h2>Add Questions</h2></legend>
	 			<div class="form-group">
	 				<label class="control-label col-sm-2">Course :</label>
	 				<div class="col-sm-10">
	 					<select name="course" id="course" class="form-control">
								<?php

								for($j=1;$j<=$num;$j++)
								{
									$row=mysqli_fetch_array($result);
								?>

								<option value="<?php echo $row['course_name']; ?>" selected><?php echo $row['course_name']; ?></option>

								<?php
								}

								?>
						</select>
	 				</div>
	 			</div>
	 			<br>
				<div class="form-group">
					<label class="control-label col-sm-2">Enrolling Year :</label>
					<div class="col-sm-10">
	 					<select name="year" id="year" class="form-control">
	 							<option value="1">1st year</option>
	 							<option value="2">2nd year</option>
	 							<option value="3">3rd year</option>
	 							<option value="4">4th year</option>
	 							<option value="5">5th year</option>
	 					</select>
	 				</div>
	 				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Semister :</label>
					<div class="col-sm-10">
	 					<select name="semister" id="semister" class="form-control text-center">
	 						<option value="1">1</option>
	 						<option value="2">2</option>
	 						<option value="3">3</option>
	 					</select>
	 				</div>
	 			</div>
	 		
	 			<br>
	 		
	 			<div class="form-group">
					<label class="control-label col-sm-2">Exam Type :</label>
					<div class="col-sm-10">
	 					<select name="type" id="type" class="form-control">
	 							<option value="quiz">Quiz</option>
	 							<option value="mid-exam">Mid Exam</option>
	 							<option value="final-exam">Final Exam</option>
	 					</select>
	 				</div>
	 				</div>
	 				<br>
	 			<div class="form-group">
	 				<label class="control-label col-sm-2">Enter Question :</label>
	 				<div class="col-sm-10">
	 					<textarea rows="8" placeholder="Enter Question" id="question" name="question" class="form-control"></textarea>
	 				</div>
	 			</div>
	 			<div class="form-group">
	 				<label class="control-label col-sm-2">Option A :</label>
	 				<div class="col-sm-10">
	 					<input type="text" name="optionA" id="optiona" placeholder="Answer A" class="form-control">
	 				</div>
	 			</div>
	 			<div class="form-group">
	 				<label class="control-label col-sm-2">Option B :</label>
	 				<div class="col-sm-10">
	 					<input type="text" name="optionB" id="optionb" placeholder="Answer B" class="form-control">
	 				</div>
	 			</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Option C :</label>
					<div class="col-sm-10">
						<input type="text" name="optionC" id="optionc" placeholder="Answer C" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Option D :</label>
					<div class="col-sm-10">
						<input type="text" name="optionD" id="optiond" placeholder="Answer D" class="form-control">
					</div>
				</div>
				<div class="form-group">
					
					<label class="control-label col-sm-2">Correct Answer:</label>
					<div class="col-sm-10">
						<input type="text" name="correctoption" id="correctoption" placeholder="Enter Correct Answer" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="row">
							<div class="col-sm-4">
								<input type="submit" name="submit" value="Submit" class="btn btn-success btn-block" style="background-color: #35AF60; border-color: #35AF60">
							</div>
							<div class="col-sm-4">
								<input type="reset" name="reset" value="Reset" class="btn btn-block btn-danger" style="background-color: #35AF60; border-color: #35AF60">
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
	<?php include 'footer.php'; ?>
</body>
</html>