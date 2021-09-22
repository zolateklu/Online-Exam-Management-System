<?php
include 'student_menubar.php';
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

					$password=FilterData($_POST['password']);
					$stuid=$_SESSION['studentid'];
					$con=mysqli_connect('localhost','root');
					mysqli_select_db($con,'online_examination_system');
					$quer="update students set password='$password' where stuid=$stuid";
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
	<div style = "width:250px; height: 550px; " align = "center">
		<div class="align text-left" style = "background-color:#fff;width:300px; padding:1px;"><h3><i>Update Password</i></h3>
				</div>
<div style = "margin:5px">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return RegistrationValidation()">
<fieldset>		
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input type="password" name="password" id="password" class="form-control"required>
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