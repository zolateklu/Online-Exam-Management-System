 <?php
// include 'header.php';
include 'sys_admin_menubar.php';
if (!isset($_SESSION['adminid']))
{
	header('location:http://localhost/OES_BS/sys_adminlogin.php');
	exit(0);
}
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

					$name=strtolower(FilterData($_POST['name']));
					$password1=FilterData($_POST['password1']);
					$password2=FilterData($_POST['password2']);
					$con=mysqli_connect('localhost','root','','online_examination_system');
					$sql="INSERT INTO department (name,password) VALUES ('$name','$password1')";
					$resinsert=mysqli_query($con,$sql);
					echo mysqli_error($con);
					if(mysqli_affected_rows($con)>0)
					{
							setcookie('error',"<p class='alert alert-success text-center'><strong>Account Has been Created Successfully<br>THANKS.</strong></p>",time()+3);
							header('Location:adddepartment.php');
						}	
					
					else
					{
						setcookie('error',"<p class='alert alert-warning text-center'><strong>Unsuccessful, Try again.</strong></p>",time()+3);
						header('Location:adddepartment.php');
					}
					mysqli_close($con);
				}
		?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return RegistrationValidation()">
<fieldset>
<legend align="center"><h2>Sign-Up Form</h2></legend>

			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="text" name="name" id="name" placeholder="Department Name" class="form-control">
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input type="password" name="password1" id="password1" placeholder="Password" class="form-control">
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input type="password" name="password2" id="password2" placeholder="Confirm Password" class="form-control">
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
	<br><br><br><br><br><br><br><br><br><br><br><br><br>
	<?php include 'footer.php'; ?>
	</body>
</html>