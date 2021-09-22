<?php
// include 'header.php';
include 'sys_admin_menubar.php';
if (!isset($_SESSION['adminid']))
{
	header('location:http://localhost/OES_BS/sys_adminlogin.php');
	exit(0);
}
$con=mysqli_connect("localhost","root","","online_examination_system");

$sql="select dep_id from department";
$result=mysqli_query($con,$sql);
echo mysqli_error($con);
$num=mysqli_num_rows($result);
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="eng">
<head></head>
	<body>
		<div class="container">
			<?php 
			date_default_timezone_set('Africa/Addis_Ababa');
			
			if(isset($_COOKIE['error']))
				echo $_COOKIE['error'];

			if(isset($_POST['submit']))
			{

					$id=$_POST['id'];
					$dep_name=$_POST['name'];
					$password1=$_POST['password1'];
					$con=mysqli_connect('localhost','root','','online_examination_system');
					$sql1="update department set dep_id=$id, name='$dep_name', password='$password1' where dep_id=$id";
					$resinsert=mysqli_query($con,$sql1);
					echo mysqli_error($con);
					if(mysqli_affected_rows($con)>0)
					{ 
						
						echo "<p class='alert alert-success text-center'><strong>Department Has been Updated Successfully";
							// header('Location:addinstructor.php');
					}				
					else
						{
							echo "<p class='alert alert-danger text-center'>
									<strong>Department Not Updated</strong></p>";
									// header('Location:addinstructor.php');
						}
					
					
					mysqli_close($con);
				}
		
		?>
<div align="center">
	<div style = "width:250px; height: 540px; " align = "center">
		<div class="align text-left" style = "background-color:#fff;width:300px; padding:1px;"><h3><i>Update Department</i></h3>
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
					<option value="<?php echo $row['dep_id']; ?>"><?php echo $row['dep_id']; ?></option>
					<?php
						$i++;
						}
					?>
 				</select>
	 		</div>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="text" name="name" id="name"  class="form-control" required>
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
	<?php include 'footer.php'; ?>
	</body>
</html>