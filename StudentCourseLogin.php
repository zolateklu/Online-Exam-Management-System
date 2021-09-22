<?php
session_start();
// ob_start();
include 'header.php';
include 'menubar.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="JavaScript/studentlogin.js"></script>
	<style type="text/css">
		div.courselogin{
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
		<div class="courselogin">
			<?php
			if(isset($_COOKIE['error']))
				echo $_COOKIE['error'];

			if(isset($_POST['submit'])) 
			{
				$studentid=FilterData($_POST['stuid']);
				$password=FilterData($_POST['pass']);
				$con=mysqli_connect('localhost','root','','online_examination_system');
				$query="SELECT fname,lname,status,stuid,password,dep_name,year,semister FROM students WHERE stuid='$studentid' 
						AND password='$password'";
				$result=mysqli_query($con,$query);
				$num=mysqli_num_rows($result);
				$row=mysqli_fetch_array($result);
				$query2="SELECT c_c_id FROM course WHERE name='".$row['dep_name']."'";
				$result2=mysqli_query($con,$query2);
				echo mysqli_error($con);
				$rec=mysqli_fetch_array($result2);
				mysqli_close($con);
				if ($num==1)
				{
					
						if($row['status']==1)
						{
							$_SESSION['fname']=$row['fname'];
							$_SESSION['lname']=$row['lname'];
							$_SESSION['dep_name']=$row['dep_name'];
							// $_SESSION['center']=$row['center'];
							$_SESSION['studentid']=$studentid;

							if($rec['c_c_id']==1)
							{
								if($num1==1)
								{
									$_SESSION['successUG']='successUG';
									$_SESSION['admitcard']='AdmitCard';
									header('location:http://localhost/OES_BS/ug-dashboard');
								}
								else
								{
									$_SESSION['ug']='ug';
									header('location:http://localhost/OES_BS/ug-registration');
								}
							}
							else
							{
								if(1)
								{
									$_SESSION['successPG']='successPG';
									$_SESSION['admitcard']='AdmitCard';
									header('location:http://localhost/OES_BS/pg-dashboard');
								}
								else
								{
									$_SESSION['pg']='pg';
									header('location:http://localhost/OES_BS/pg-registration');
								}
							}
						}
						else
						{
							setcookie('error',"<p class='alert alert-warning text-center'><strong>First, Activate Your Account From Your Email Link.</strong></p>",time()+3);
							header('Location:student-course-login');
						}
					
				} // first if closes
				else
				{
					setcookie('error',"<p class='alert alert-danger text-center'><strong>Login Id or Password May be Incorrect. Otherwise contact the college registrar in person</strong></p>",time()+3);
					header('Location:student-course-login');
				}
			}
		?>
		<div align="center">
	 		<div style = "width:250px; height: 350px; " align = "center">
				<div style = "padding:4.5px;"><h3 class="text-center" style="font-weight: bold;color:white;"><i>Student Login</i></h3>
				</div>
				<div style = "margin:10px">

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return StudentValidation()">

		<fieldset>
		<div class="form-group">
			<input type="text" name="stuid" id="stuid" placeholder="Enter Student Id" class="form-control" required/>
		</div>
		<div class="form-group">
			<input type="Password" name="pass" id="pass" placeholder="Enter Password" class="form-control" required />
		</div>
		<div class="row">
			<div class="col-sm-6">
				<input type="submit" name="submit" value="Login" class="btn btn-primary btn-block" style="background-color: #35AF60; border-color: #35AF60"/>
			</div>
			<div class="col-sm-6">
				<input type="reset" name="reset" value="Clear All" class="btn btn-danger btn-block" style="background-color: #35AF60; border-color: #35AF60" />
			</div>
		</div>
		
		<!-- <div>
			<h4 class="text-center"><a href="forget-password-one" class="alert-link" style="color: red" name="forgetpass1">Forget Password?</a></h4>
		</div> -->
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
	<br><br><br><br><br><br><br><br><br><br>
	<?php include 'footer.php'; ?>
</body>
</html>