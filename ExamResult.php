<?php
session_start();
include 'header.php';
include 'menubar.php';
date_default_timezone_set('Africa/Addis_Ababa');
if(!isset($_SESSION['fname']))
{
	header('location:http://localhost/OES_BS/student-course-login');
	exit(0);
}

$con=mysqli_connect('localhost','root','','online_examination_system');
$query="select course_id,correct_option FROM questions WHERE course_id='".$_SESSION['name']."'";
$result=mysqli_query($con,$query);
$row=mysqli_num_rows($result);
$i=1;
$correct=0;
$incorrect=0;
$unAttemp=0;

while($i<=$row) 
{
	if(isset($_POST['ques'.$i])) 
	{
		$ans=mysqli_fetch_array($result);
		if($_POST['ques'.$i]==$ans['correct_option'])
		{
			$correct++;
		}
		else
		{
			$incorrect++;
		}
	}
	else
	{
		$unAttemp++;
	}
	$i++;
}
$percentage=($correct*100)/$row;
if($percentage<50)
{
	$status="Not good";
}
else
{
	$status="Nice";
}
$sql="select course_id,type,year,semister from questions where course_id='".$_SESSION['name']."'";
$reql=mysqli_query($con,$sql);
$roql=mysqli_fetch_array($reql);
$lqs="select year,semister from students where stuid='$_SESSION[studentid]'";
$lqer=mysqli_query($con,$lqs);
$lqor=mysqli_fetch_array($lqer);
$year=$lqor['year'];
$semister=$lqor['semister'];
$query1="insert into results (student_id,fname,lname,phone,email,gender,course,type,year,semister,no_of_questions,marks,percentage) values($_SESSION[studentid],'$_SESSION[fname]','$_SESSION[lname]','$_SESSION[phone]','$_SESSION[email]','$_SESSION[gender]','$roql[course_id]','$roql[type]',$year,$semister,$row,$correct,$percentage)";
$execute=mysqli_query($con,$query1);
echo mysqli_error($con);
$query27="INSERT INTO alreadyloggedin (SELECT fname,lname,student_id,course,type,year,semister,phone,email,gender,Now() FROM results WHERE student_id=$_SESSION[studentid])";
$result27=mysqli_query($con,$query27);

mysqli_close($con);
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<!--<link rel="stylesheet" type="text/CSS" href="CSS/welcometoexam.css">-->
<style type="text/css">
div#ExamResult
{
	width: 60%;
	margin: auto;
}
table{
	background-color: #fff;
}
th.result{
	font-size: 20px;
	color: red;
	font-family: Arial;
	font-style: italic;
	background-color: linen;
}
</style>

</head>
<body>
<div class="container">
	<div id="ExamResult">
	<table class="table table-bordered">
		<thead>
			<tr class="success">
				<th colspan="4" class="result text-center text-primary">Student Result</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>First Name:</th>
				<td><?php echo ucfirst("$_SESSION[fname]");  ?></td>
				<th>Last Name:</th>
				<td><?php echo ucfirst("$_SESSION[lname]");  ?></td>
			</tr>
			<tr>
				<th>Course Name:</th>
				<td><?php echo $roql['course_id'];  ?></td>
				<th>Gender:</th>
				<td><?php echo $_SESSION['gender'];  ?></td>
			</tr>
			<tr>
				<th>Attemped Question(s):</th>
				<th><?php echo $correct+$incorrect;  ?></th>
				<th>Unattemped Question(s):</th>
				<th><?php echo $unAttemp;  ?></th>
			</tr>
			<tr>
				<th>Correct Answer(s):</th>
				<th><?php echo $correct; ?></th>
				<th>Incorrect Answer:</th>
				<th><?php echo $incorrect; ?></th>
			</tr>
			<tr>
				<th colspan="2">Total Marks:</th>
				<th colspan="2"><?php echo $correct; ?></th>
			</tr>
		</tbody>
		</table>
</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<?php include 'footer.php'; ?>
</body>
</html>