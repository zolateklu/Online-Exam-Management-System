 <?php 
include 'admin_menubar.php';
if(!isset($_SESSION['adminid']))
{
	header('location:http://localhost/OES_BS/adminlogin.php');
	exit(0);
}

$con=mysqli_connect('localhost','root','','online_examination_system');
$query="SELECT * FROM `results` WHERE course='Discrete Maths' ";
$result=mysqli_query($con,$query);
$row=mysqli_num_rows($result);
echo mysqli_error($con);


?>
<!DOCTYPE html>
<html>
<head>
	<!--<link rel="stylesheet" type="text/css" href="CSS/FinalResult.css">-->
	<style type="text/css">
		div#FinalResult{
	width: 750px;
	height: auto;
	margin: auto;
	padding: 5px;
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
	<?php
	if($row>0){

		for($i=0;$i<$row;$i++){
		$rec=mysqli_fetch_array($result);
			
		?>
	
	<div class="container">
		<div id="FinalResult">
	<table class="table table-bordered table-striped">
	
	<thead>
		<tr>
			<td colspan="6" class="text-center">
				<img src="images/gege college logo.jpg" id="home" class="img-rounded" />
				<h1 style="color: #35AF60">ONLINE EXAM MANAGEMENT SYSTEM</h1>
			</td>
		</tr>
		<tr class="warning">
			<th colspan="4" style="font-size: 18px;" class="text-center">Student Final Result</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th>First Name :</th>
			<td><?php echo ucfirst("$rec[fname]");  ?></td>
			<th>Last Name :</th>
			<td><?php echo ucfirst("$rec[lname]");  ?></td>
		</tr>
		<tr>
			<th>Gender :</th>
			<td><?php echo $rec['gender'];  ?></td>
			<th>Course Name :</th>
			<td><?php echo $rec['course'];  ?></td>
		</tr>
		<tr>
			<th>Enrolling Year :</th>
			<td><?php echo $rec['year'];  ?></td>
			<th>Semister :</th>
			<td><?php echo $rec['semister'];  ?></td>
		</tr>
		<tr>
			<th>No. of Questions :</th>
			<th><?php echo $rec['no_of_questions'];  ?></th>
			<th>Marks % :</th>
			<th><?php echo $rec['percentage']." %";  ?></th>
		</tr>
		<?php
}?>
		<tr id="last_row">
			<th colspan="4" class="text-center">
				<button type="button" name="AdmitCard" onclick="AdmitCard()" id="admit" class="btn btn-success"><span class="glyphicon glyphicon-print"></span> Print</button>
			</th>
		</tr>
	</tbody>
</table>
</div>
</div>	
<br><br><br><br>
<?php

}

else	
{

?>
<br><br><br><br><br><br><br> 
<div class="alert text-center">
	<h2>Sorry! Result not Found.</h2>
	</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
}
 include 'footer.php';
?>