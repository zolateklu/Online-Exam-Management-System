<?php
include 'dep_menubar.php';

$con=mysqli_connect('localhost','root','','online_examination_system');
$sql="select * from students where dep_name='".$_SESSION['adminname']."'";
$result=mysqli_query($con,$sql);
$num=mysqli_num_rows($result);

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

					$stuid=FilterData($_POST['id']);
					$con=mysqli_connect('localhost','root');
					mysqli_select_db($con,'online_examination_system');
					$quer="delete from students where stuid=$stuid";
					$resinsert=mysqli_query($con,$quer);
					echo mysqli_error($con);
					if(mysqli_affected_rows($con)>0)
						{
							echo "<p class='alert alert-success text-center'><strong>Account Has been deleted Successfully.</strong></p>";
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
		<div class="align text-left" style = "background-color:#fff;width:300px; padding:1px;"><h3><i>Delete Student Registraton</i></h3>
				</div>
<div style = "margin:5px">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return RegistrationValidation()">
<fieldset>
				 		<div class="form-group">
	 					<select name="id" id="id" class="form-control" required>
	 							<?php
	 					$i=1; 
	 					while($i<=$num) 
	 						{
	 				    		$row=mysqli_fetch_array($result);
	 						?>
	 						<option value="<?php echo $row['stuid']; ?>"><?php echo $row['stuid']; ?></option>
	 							<?php

 							$i++;
 						}
 					?>
 					</select>
	 		</div>
			<div class="input-group">
				<div class="input-group-btn">
					<div class="row">
						<div class="col-sm-6">
							<button type="submit" class="btn btn-success btn-block" name="submit" style="background-color: #35AF60; border-color: #35AF60">Submit
							</button>
						</div>
						<div class="col-sm-6">
							<a href="admin-dashboard" class="btn btn-info btn-block" style="background-color: #35AF60; border-color: #35AF60">&#8810; Go Back</a>
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