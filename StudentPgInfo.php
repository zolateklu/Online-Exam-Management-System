<?php
include 'student_menubar.php';
if(!isset($_SESSION['successPG']))
{
	header('location:http://localhost/OES_BS/student-sign-out');
	exit();
}

$con=mysqli_connect("localhost","root","","online_examination_system");
$res=mysqli_query($con,"select * from students where stuid='$_SESSION[studentid]'");
mysqli_close($con);
$rec=mysqli_fetch_array($res);
    ?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		div#info{
			width: 750px;
			margin: auto;
			padding: 4px;
		}
	</style>
	<script type="text/javascript">
		function AdmitCard() 
		{
			document.getElementsByClassName('row')[0].style.display="none";
			document.getElementById('last_row').style.display="none";
			document.getElementsByTagName('footer')[0].style.display="none";
			document.getElementsByTagName('nav')[0].style.display="none";
			window.print();
		}
	</script>
</head>
<body>
<div id="info">
	<table class="table table-bordered table-striped" style="background-color: #fff">
		<tr>
			<td colspan="8" class="text-center">
				<img src="images/gege college logo.jpg" id="home" class="img-rounded" />
				<h1 style="color: #35AF60">ONLINE EXAM MANAGEMENT SYSTEM</h1>
			</td>
		</tr>
		<tr class="warning">
			<th colspan="8" style="font-size: 20px;font-style: italic;background-color: #fff" class="text-center text-primary">Personal Details</th>
		</tr>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Student ID</th>
			<th>Password</th>
			<th>Phone Number</th>
			<th>Gender</th>
			<th>Email Address</th>
			<th>Department Name</th>
			
		</tr>
		<tr>
			<td><?php echo ucfirst($rec['fname']); ?></td>
			<td><?php echo ucfirst($rec['lname']); ?></td>
			<td><?php echo $rec['stuid']; ?></td>
			<td><?php echo $rec['password']; ?></td>
			<td><?php echo $rec['phone']; ?></td>
			<td><?php echo $rec['gender']; ?></td>
			<td><?php echo $rec['email']; ?></td>
			<td><?php echo $rec['dep_name']; ?></td>
			</tr>
		<tr id="last_row">
			<th colspan="8" class="text-center">
				<button type="button" name="AdmitCard" onclick="AdmitCard()" id="admit" class="btn btn-success"><span class="glyphicon glyphicon-print"></span> Print</button></th>
		</tr>
	</table>

</div>
<br><br><br><br><br>
<?php include 'footer.php'; ?>
</body>
</html>
