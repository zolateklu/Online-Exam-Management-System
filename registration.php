 <?php
// include 'header.php';
include 'dep_menubar.php';
// session_start();
$con=mysqli_connect('localhost','root','','online_examination_system');
$query="select * from course_category order by cname asc";
$result=mysqli_query($con,$query);
$row=mysqli_num_rows($result);

$query2="select * from department where name='".$_SESSION['adminname']."'";
$result3=mysqli_query($con,$query2);
$num1=mysqli_num_rows($result3);
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="eng">
<head>
		<script type="text/javascript" src="JavaScript/regisvalidation.js"></script>
		<script type="text/javascript" src="JavaScript/StudentIdValidation.js"></script>
		<script type="text/javascript" src="JavaScript/MobileValidation.js"></script>
		<script type="text/javascript" src="JavaScript/EmailValidation.js"></script>
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

					$fname=strtolower(FilterData($_POST['fname']));
					$lname=strtolower(FilterData($_POST['lname']));
					$phone=FilterData(strtolower($_POST['mobile']));
					$password1=FilterData($_POST['password1']);
					$password2=FilterData($_POST['password2']);
					$email=strtolower(FilterData($_POST['email']));
					$cont=strtolower(FilterData($_POST['cont']));
					$gender=FilterData($_POST['gender']);
					$stuid=substr(str_shuffle(time().$phone),6,10);
					$department=$_SESSION['adminname'];
					$year=FilterData($_POST['year']);
					$semister=FilterData($_POST['semister']);
					$c_c_id=FilterData($_POST['course_catagory']);
					$con=mysqli_connect('localhost','root');
					mysqli_select_db($con,'online_examination_system');
					$quer="INSERT INTO students (fname,lname,stuid,phone,password,email,country,gender,dep_name,c_c_id,year,semister) VALUES ('$fname','$lname',$stuid,
						'$phone','$password1','$email','$cont','$gender','$department',$c_c_id,$year,$semister)";
					$resinsert=mysqli_query($con,$quer);
					echo mysqli_error($con);
					if(mysqli_affected_rows($con)>0)
					{
							echo "<p class='alert alert-success text-center'><strong>Account Has been Created
									Successfully.</strong></p>";
						}	
					elseif(mysqli_affected_rows($con)==0)
						{
							echo "<p class='alert alert-danger text-center'>
									<strong>Database server failed, contact your system admin</strong></p>";
						}
					else
					{
						echo "<p class='alert alert-warning text-center'><strong>This Email Id ".$email." or Mobile Number ".$phone." can't be same.</strong></p>";
			
					}
					mysqli_close($con);
				}
		
		?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return RegistrationValidation()">
<fieldset>
<legend align="center"><h2>Student Registraton</h2></legend>

			<div class="input-group">
				<span class="input-group-addon">
					<i class="glyphicon glyphicon-user"></i></span>
				<input type="text" name="fname" id="fname" placeholder="First Name" class="form-control"required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="text" name="lname" id="lname" placeholder="Last Name" class="form-control"required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
				<input type="number" name="mobile" id="mobile" value="2519" 
				onfocusout="fetchmobile(this.value)" class="form-control"required>
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
	 			<div class="form-group">
	 				<select name="course_catagory" id="course_catagory" class="form-control"required>
	 					<option value="">Select Course Category</option>
							<?php
	 						$i=1; 
	 						while($i<=$row) 
	 						{
	 							$rec=mysqli_fetch_array($result);
	 						?>
	 							<option value="<?php echo $rec['category_id']; ?>"><?php echo $rec['cname']; ?></option>
 							<?php

 								$i++;
 							}

 							?>
	 						
	 				</select>
				</div>
				<div class="form-group">
	 					<select name="year" id="year" class="form-control">
	 						<option value="" required>Select enrolling year</option>
	 						
	 							<option value="1">1st year</option>
	 							<option value="2">2nd year</option>
	 							<option value="3">3rd year</option>
	 							<option value="4">4th year</option>
	 							<option value="5">5th year</option>
	 					</select>
	 				</div>
				<div class="form-group">
	 					<select name="semister" id="semister" class="form-control">
	 						<option value="" required>Select current semister</option>
	 						<option value="1">1</option>
	 						<option value="2">2</option>
	 						<option value="3">3</option>
	 					</select>
	 				</div>
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