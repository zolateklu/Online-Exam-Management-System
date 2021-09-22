<?php
// include 'header.php';
include 'dep_menubar.php';
if (!isset($_SESSION['adminid']))
{
	header('location:http://localhost/OES_BS/deplogin.php');
	exit(0);
}
$con=mysqli_connect("localhost","root","","online_examination_system");
$rescourse=mysqli_query($con,"select name from course where dep_id='".$_SESSION['adminname']."'");
$con=mysqli_connect('localhost','root','','online_examination_system');
$query2="select * from department where name='".$_SESSION['adminname']."'";
$result3=mysqli_query($con,$query2);
$num1=mysqli_num_rows($result3);

// mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="eng">
<head>
		<script type="text/javascript" src="JavaScript/regisvalidation.js"></script>
		<script type="text/javascript" src="JavaScript/StudentIdValidation.js"></script>
		<script type="text/javascript" src="JavaScript/Ins_mobile_validation.js"></script>
		<script type="text/javascript" src="JavaScript/Ins_email_validation.js"></script>
		<script type="text/javascript">
	function CallPassword1()
	{
		var x=document.getElementById("password1");
		if(x.type==="password")
		{
			x.type="text";
		}
		else
		{
			x.type="password";
		}
	}
	function CallPassword2()
	{
		var x=document.getElementById("password2");
		if(x.type==="password")
		{
			x.type="text";
		}
		else
		{
			x.type="password";
		}
	}
</script>
<style type="text/css">
	.container
	{
		width: 50%;
		margin: auto;
	}
</style>
	</head>
	<body>
		<div class="container">
			<?php 
			date_default_timezone_set('Africa/Addis_Ababa');
			
			if(isset($_COOKIE['error']))
				echo $_COOKIE['error'];

			if(isset($_POST['submit']))
			{

					$name=strtolower(FilterData($_POST['name']));
					$course_name=FilterData($_POST['course_name']);
					$phone=FilterData(strtolower($_POST['mobile']));
					$password1=FilterData($_POST['password1']);
					$password2=FilterData($_POST['password2']);
					$email=strtolower(FilterData($_POST['email']));
					$cont=strtolower(FilterData($_POST['cont']));
					$gender=FilterData($_POST['gender']);
					$ins_id=substr(str_shuffle(time().$phone),6,10);
					$depname=$_SESSION['adminname'];
					$con=mysqli_connect('localhost','root');
					mysqli_select_db($con,'online_examination_system');
					$sql="INSERT INTO instructor (ins_id,name,phone,password,email,country,gender,course_name,dep_name) VALUES ($ins_id,'$name','$phone','$password1','$email','$cont','$gender','$course_name','$depname')";
					$resinsert=mysqli_query($con,$sql);
					// echo mysqli_error($con);
					if(mysqli_affected_rows($con)>0)
					{ 
						if(1){
							echo "<p class='alert alert-success text-center'><strong>Account Has been Created Successfully";
							// header('Location:addinstructor.php');
								}	
							else
								{
									echo "<p class='alert alert-danger text-center'>
											<strong>Account Not Created</strong></p>";
									// header('Location:addinstructor.php');
								}
					}
					else
					{
						echo "<p class='alert alert-warning text-center'><strong>This Email Id ".$email." or Mobile Number ".$phone." has been registerd fo another instructor.</strong></p>";
						// header('Location:addinstructor.php');
					}
					mysqli_close($con);
				}
		
		?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return RegistrationValidation()">
<fieldset>
<legend align="center"><h2>Instructor Registration</h2></legend>

			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="text" name="name" id="name" placeholder="Full Name" class="form-control" required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
				<input type="number" name="mobile" id="mobile" value="2519" 
				onfocusout="fetchmobile2(this.value)" class="form-control"required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input type="password" name="password1" id="password1" placeholder="Password" class="form-control"required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input type="password" name="password2" id="password2" placeholder="Confirm Password" class="form-control"required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				<input type="email" name="email" id="email" placeholder="Example@something.com" 
				onfocusout="fetchemail(this.value)" class="form-control"required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
				<input type="text" name="cont" id="cont" placeholder="Nationality" class="form-control"required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				&nbsp;<label class="radio-inline"><input type="radio" name="gender" value="Male"required>Male</label>
				<label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
			</div>
			<br>
			<div class="form-group align">
				<div class="col-sm-6 ">
					<select name="course_name" id="course_name" class="form-control"required>
							<option value="">--Select Course--</option>
							<?php
								if(mysqli_num_rows($rescourse)>0)
								{
									while($row=mysqli_fetch_array($rescourse)) 
									{
										?>
										<option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?>
											</option>
										<?php
									}
								}
								else
								{
									echo "<p class='alert alert-danger text-center'><strong>Sorry! No Course Found.</strong></p>";
								}

							?>
						</select>
				</div></div>
			<br>
			<br>
			<div class="input-group">
				<div class="input-group-btn">
					<div class="row">
						<div class="col-sm-6">
							<button type="submit" class="btn btn-success btn-block" name="submit" style="background-color: #35AF60; border-color: #35AF60">Submit
							</button>
						</div>
						<div class="col-sm-6">
							<button type="reset" class="btn btn-danger btn-block" style="background-color: #35AF60; border-color: #35AF60">Reset
							</button>
						</div>
					</div>	
				</div>
			</div>
			<br>
</fieldset>
</form>
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
	<?php include 'footer.php'; ?>
	</body>
</html>