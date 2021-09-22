<?php
include 'dep_menubar.php';
$con=mysqli_connect('localhost','root','','online_examination_system');
$query="select * from course_category order by cname asc";
$result=mysqli_query($con,$query);
$row=mysqli_num_rows($result);

$query2="select * from department where name='".$_SESSION['adminname']."'";
$result3=mysqli_query($con,$query2);
echo mysqli_error($con);
$num1=mysqli_num_rows($result3);

$sql2="select * from students where dep_name='".$_SESSION['adminname']."'";
$result12=mysqli_query($con,$sql2);
$num12=mysqli_num_rows($result12);

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
					$stuid=FilterData($_POST['id']);
					$department=$_SESSION['adminname'];
					$year=FilterData($_POST['year']);
					$semister=FilterData($_POST['semister']);
					$c_c_id=FilterData($_POST['course_catagory']);
					$con=mysqli_connect('localhost','root');
					mysqli_select_db($con,'online_examination_system');
					$quer="update students set fname='$fname',lname='$lname',stuid=$stuid,phone='$phone',password='$password1',email='$email',country='$cont',gender='$gender',dep_name='$department',c_c_id=$c_c_id,year=$year,semister=$semister where stuid=$stuid";
					$resinsert=mysqli_query($con,$quer);
					echo mysqli_error($con);
					if(mysqli_affected_rows($con)>0)
						{
							echo "<p class='alert alert-success text-center'><strong>Account Has been updated Successfully.</strong></p>";
							}

					else
						{
							echo "<p class='alert alert-danger text-center'>
									<strong>Database server failed, contact your admin</strong></p>";
						
						}
					mysqli_close($con);
				}
		
		?>
<div align="center">
	<div style = "width:450px; height: 770px; " align = "center">
		<div class="align text-left" style = "background-color:#fff;width:300px; padding:1px;"><h3><i>Update Student Registraton</i></h3>
				</div>
<div style = "margin:5px">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return RegistrationValidation()">
<fieldset>
<!-- <legend align="center"><h2>Update Student Registraton</h2></legend> -->
			
				 		<div class="form-group">
	 					<select name="id" id="id" class="form-control" required>
	 							<?php
	 					$i=1; 
	 					while($i<=$num12) 
	 						{
	 				    		$rown=mysqli_fetch_array($result12);
	 						?>
	 						<option value="<?php echo $rown['stuid']; ?>"><?php echo $rown['stuid']; ?></option>
	 							<?php

 							$i++;
 						}
 					?>
 					</select>
	 		</div>		
 				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="text" name="fname" id="fname"  class="form-control"required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="text" name="lname" id="lname" class="form-control"required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
				<input type="text" name="mobile" id="mobile" class="form-control"required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input type="password" name="password1" id="password1" class="form-control"required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input type="password" name="password2" id="password2" class="form-control"required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				<input type="email" name="email" id="email" class="form-control"required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
				<input type="text" name="cont" id="cont" class="form-control"required>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user" ></i></span>
				&nbsp;<label class="radio-inline"><input type="radio" name="gender" value="Male"required>Male</label>
				<label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
			</div>
			<br>
	 			<div class="form-group">
	 				<select name="course_catagory" id="course_catagory" class="form-control" required>
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
	 					<select name="year" id="year" class="form-control" >
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
	<!-- <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> -->
	<?php include 'footer.php'; ?>
	</body>
</html>