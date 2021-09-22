<?php
// include 'student_menubar.php';
session_start();
include 'header.php';
include 'menubar.php';
if (isset($_SESSION['welcomeToExam'])) 
{
	header('location:http://localhost/OES_BS/welcome-to-exam');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="JavaScript/studentlogin.js"></script>
	<style type="text/css">
		div.loginpage
		{
			margin: auto;
			width: 55%;
		}
			body {
  background-image: url('images/best.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
	</style>
</head>
<body>
	<div class="container">
		<div class="loginpage">
			<?php
			if(isset($_COOKIE['error']))
				echo $_COOKIE['error'];

			if(isset($_POST['submit']))
			{
				date_default_timezone_set('Africa/Addis_Ababa');
				$studentid=$_POST['stuid'];
				$password=$_POST['pass'];
				$con=mysqli_connect('localhost','root');
				mysqli_select_db($con,'online_examination_system');
				$query="SELECT * FROM students WHERE stuid='$studentid' AND password='$password'";
				$result=mysqli_query($con,$query);
				$num=mysqli_num_rows($result);
				echo mysqli_error($con);
				$row=mysqli_fetch_array($result);
				if($num==1)
				{		
						if($row['status']==1)
						{
							
							$query1="SELECT * FROM alreadyloggedin WHERE student_id='$studentid'";
							$result1=mysqli_query($con,$query1);
							$num1=mysqli_num_rows($result1);
							$row1=mysqli_fetch_array($result1);

							if ($row['stuid']!=$row1['student_id']) 
							{	
								mysqli_close($con);	
																		
								$_SESSION['studentid']=$studentid;
								$_SESSION['fname']=$row['fname'];
								$_SESSION['lname']=$row['lname'];
								// $_SESSION['course']=$row['course'];
								$_SESSION['gender']=$row['gender'];
								// $_SESSION['center']=$row['center'];
								$_SESSION['dep_name']=$row['dep_name'];
								$_SESSION['phone']=$row['phone'];
								$_SESSION['email']=$row['email'];
							
								$_SESSION['welcomeToExam']='welcomeToExam';
								header('location:http://localhost/OES_BS/welcome-to-exam');
							}
							else
							{	
								setcookie('error',"<p class='alert alert-warning text-center'><strong>You have Already Attend Exam, Now You have to Wait for the Result.</strong><a href='final-result'>Click Here</a></p>",time()+3);
								header('Location:exam-login');
							}
						}
						else
						{
							setcookie('error',"<p class='alert alert-warning text-center'><strong>First, Activate Your Account From Your Email Link.</strong></p>",time()+3);
							header('Location:exam-login');
						}
					
				}
				else
				{
					setcookie('error',"<p class='alert alert-danger text-center'><strong>
						Login ID or Password may be Incorrect.</strong></p>",time()+3);
					header('Location:exam-login');
				}
			}
		
		?>
		<div style = "padding:1px"><h3 align="center" style="font-weight: bold;color: white"><i>Exam Login Form</i></h3>
			</div>
		<div class="alert alert-warning">
			<p style="color: red"><strong class="text-success">Note:-</strong>  Please, Read The Exam Instruction Before Going to Login, otherwise You will be Responsible For Any Mistake, and you will see only questions not any kind of instructions regarding exammination.</p>
					<a href="exam-instruction" class="alert-link" style="color: blue">Instruction is Here.</a>
		</div>
	<div align="center">
		<div style = "width:250px; height: 280px; " align = "center">
			<div style = "margin:10px">
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" onsubmit="return StudentValidation()">

		<fieldset>
		<div class="form-group">
			<input type="text" name="stuid" id="stuid" placeholder="Enter Student Id" class="form-control" required/>
		</div>
		<div class="form-group">
			<input type="Password" name="pass" id="pass" placeholder="Enter Password" class="form-control" required/>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-6">
				<input type="submit" name="submit" value="Login" class="btn btn-success btn-block" style="background-color: #35AF60; border-color: #35AF60"/>
			</div>
			<div class="col-sm-6">
				<input type="reset" name="reset" value="Clear All" class="btn btn-danger btn-block" style="background-color: #35AF60; border-color: #35AF60"/>

			</div>
		</div>
		</fieldset>
	</form>
</div>
</div>
</div>

	<?php
		function FilterData($data)
		{
			$data=trim($data);
			$data=addslashes($data);
			$data=strip_tags($data);
			return $data;
		}

	?>
		</div>
	</div>
	<br><br><br><br>
	<?php include 'footer.php'; ?>
</body>
</html>