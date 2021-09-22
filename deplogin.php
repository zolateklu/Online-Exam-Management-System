<?php
session_start(); 
include 'header.php';
include 'menubar.php';
if (isset($_SESSION['adminid'])) 
{
	header('location:http://localhost/OES_BS/welcomedep.php');
}


?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/CSS" href="CSS/adminlogin.css">
	<script type="text/javascript" src="JavaScript/adminlogin.js"></script>
	<style type="text/css">
		div#loginpage
		{
			width: 50%;
			margin: auto;
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
		<div id="loginpage">

		<?php
		if(isset($_COOKIE['error']))
			echo $_COOKIE['error'];
		
			if(isset($_POST['submit']))
			{
				$id = FilterData($_POST['adminid']);
				$pass = FilterData($_POST['pass']);
				$con = mysqli_connect('localhost','root');
				mysqli_select_db($con,'online_examination_system');
				$query = "SELECT * FROM department WHERE dep_id='$id' AND password='$pass'";
				$result = mysqli_query($con,$query);
				$row = mysqli_fetch_array($result);
				$num = mysqli_num_rows($result);
				mysqli_close($con);
				if ($num == 1) 
				{
					
						$_SESSION['adminid'] = $id;
						$_SESSION['role'] = $row['role'];
						header('location:http://localhost/OES_BS/welcomedep.php');
					}
					
				else
				{
					setcookie('error',"<p class='alert alert-danger text-center'>Login Id or Password May be Incorrect.</p>",time()+3);
					header('Location:deplogin.php');
				}
			}
		
		?>
	<div align="center">
			<div style = "width:250px; height: 408px; " align = "center">
				<div style = "padding:4.5px;"><h3 style="font-weight: bold;color: white"><i> Department Login </i></h3>
				</div>
				<div style = "margin:10px">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return AdminValidation()">

		<fieldset>
					
					<div class="input-group">
						<input type="text" name="adminid" id="adminid" placeholder="Enter Dep. Id" class="form-control" required/>
					</div>
					<br>
					<div class="input-group">
					<input type="Password" name="pass" id="pass" placeholder="Enter Dep. Password" class="form-control" required/>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-6">
							<input type="submit" name="submit" value="Login" class="btn btn-success btn-block" style="background-color: #35AF60; border-color: #35AF60"/>
						</div>
						<div class="col-sm-6">
							<input type="reset" name="reset" value="Clear All" class="btn btn-danger btn-block" style="background-color: #35AF60; border-color: #35AF60"/>
						</div>
					</div><br><br><br><br><br>
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
	<br><br><br><br><br><br><br>
	<?php include 'footer.php'; ?>
</body>
</html>