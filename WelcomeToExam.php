<?php
session_start();
include 'header.php';
date_default_timezone_set('Africa/Addis_Ababa');

if (!isset($_SESSION['welcomeToExam'])) 
{
	header('location:http://localhost/OES_BS/student-course-login');
}
date_default_timezone_set("Africa/Addis_Ababa");
$con=mysqli_connect('localhost','root','','online_examination_system');
$q="select name from course where dep_id='$_SESSION[dep_name]'";
$result=mysqli_query($con,$q);
echo mysqli_error($con);
$c_id=mysqli_fetch_array($result);

// $curTime=date("h:i:sa");
$query="select q.question_id,q.name,q.optionA,q.optionB,q.optionC,q.optionD, e.exam_duration from questions q, examschedule e,students s where q.course_id=e.course_name and e.dep_name=s.dep_name  and e.exam_date=curdate() and e.exam_time<=curtime() and q.year=s.year";
$result1=mysqli_query($con,$query);
echo mysqli_error($con);
$row=mysqli_num_rows($result1);

$result2=mysqli_query($con,"select * from exam where stuid='".$_SESSION['studentid']."'");


?>
<!DOCTYPE html>
<html>
<head>
	<!--<link rel="stylesheet" type="text/CSS" href="CSS/welcometoexam.css">-->
	<link rel="stylesheet" type="text/css" href="CSS/calc.css">
	<script type="text/javascript" src="JavaScript/jquery.js"></script>
	<!-- <script src="javaScript/calc.js"></script> -->
	<script type = "text/javascript" >
	   function preventBack(){window.history.forward();}
	    setTimeout("preventBack()", 0);
	    window.onunload=function(){null};
	</script>
	<script type="text/javascript">
		window.addEventListener("keydown",disable);
		function disable()
		{
			document.onkeydown = function (e) 
			{
				return false;
			}
		}
	</script>

<script type="text/javascript">
function ShowRemainingTime()
{
			var t=localStorage.getItem("curTime");
			var hours=Math.floor(t/3600);
			var minutes=Math.floor((t-(hours*3600))/60);
			var seconds=t%60;
			var hrs=check(hours);
			var mint=check(minutes);
			var sec=check(seconds);
			if(t<=0)
			{
				clearTimeout(tm);
				localStorage.removeItem("curTime");
				document.getElementById("form1").submit();
			}
			else
			{
				document.getElementById("countdowntimer").innerHTML ="Remaining Time:- "+hrs+"h "+mint+"m "+sec+"s";
			}
			t--;
			var t=localStorage.setItem("curTime",t--);
			var tm= setTimeout(function(){ShowRemainingTime()},1000);
}
function check(sms)
{
	if(sms<10)
	{
		sms="0"+sms;
	}
		return sms;
}

</script>
<script type="text/javascript">
	var myVar = setInterval(myTimer,1000);
	function myTimer() 
	{
		var d =new Date();
		document.getElementById("currenttime").innerHTML ="The Current Time:- "+d.toLocaleTimeString();
	}
</script>

	<script type="text/javascript">
		
		function SignOut()
		{
			var a=confirm("Have You Finished Your Examination ?");
			if(!a)
			{
				return false;
			}
			else
			{
				var b=confirm("Do You Want To Sign Out/Submit ?");
				if(!b)
				{
					return false;
				}
				else
				{
					return true;
				}
			}
		}
	</script>
<script>
			
	function validate(str,id)
	{
		var req=new XMLHttpRequest();
		req.open("get","http://localhost/OES_BS/request.php?ans="+str+"&id="+id,true);
		req.send();
	}
		
</script>
	<style type="text/css">
		
		div.main{
			display: none;
			width: 300px;
		}
	div#examStart{
	background-color: lightgray;
	border-radius: 5px;
	width: 60%;
	margin: auto;
	max-height: 450px;
	overflow-y: scroll;
}
h4{
	background-color: #fff;
	border: 2px solid purple;
	border-radius: 5px;
	padding: 5px;
}
	</style>

</head>
<body onload="ShowRemainingTime()" oncontextmenu="return false;">
	<script type="text/javascript">
		var timer=40*60;
		if(!localStorage.getItem("curTime"))
		{
			localStorage.setItem("curTime",timer);	
		}
	</script>
	<?php
	if($row>=1){
		
			?>
	
	<div class="container-fluid">
			<nav class="navbar navbar-inverse"style="background-color: #04057B">
				<div class="row">
					<div class="col-md-3">
						<p style="color: #35AF60;font-size: 15px;" id="currenttime" class="navbar-text"></p>
					</div>
					<div class="col-md-3">
						<p style="font-size: 15px;color: red;" id="countdowntimer" class="navbar-text"></p>
					</div>
					<div class="col-md-3">
						<p class="navbar-text" style="color: yellow;font-weight: bold;font-size: 15px;">
							Hello.. <?php echo ucwords("$_SESSION[fname] $_SESSION[lname]");  ?></p>
					</div>
				</div>
			<!-- </nav> -->
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-9">
				<div id="examStart">
	<form action="ExamResult.php" method="post" id="form1">
		<?php
		if(mysqli_num_rows($result2)>0)
		{
			$i=1;
			while ( $i<=$row) 
			{	
				$record=mysqli_fetch_array($result1);
				$record1=mysqli_fetch_array($result2);

			?>
					<h4>Question-<?php echo $i; ?>. 
						<?php echo $record['name']; ?></h4>
					<span style="margin-left: 30px;">A. <input type="radio" name="ques<?php echo $i;?>" value="<?php echo $record['optionA'];?>" onclick="validate(this.value,<?php echo $record['question_id']; ?>)"
						<?php if($record['optionA']==$record1['chooseoption']) echo "checked"; ?>>&nbsp;
						<?php echo $record['optionA'];?>
					</span><br>
					<span style="margin-left: 30px;">B. <input type="radio" name="ques<?php echo $i;?>" value="<?php echo $record['optionB'];?>" onclick="validate(this.value,<?php echo $record['question_id']; ?>)"
						<?php if($record['optionB']==$record1['chooseoption']) echo "checked"; ?>>&nbsp;
						<?php echo $record['optionB'];?>
					</span><br>
					<span style="margin-left: 30px;">C. <input type="radio" name="ques<?php echo $i;?>" value="<?php echo $record['optionC'];?>" onclick="validate(this.value,<?php echo $record['question_id']; ?>)"
						<?php if($record['optionC']==$record1['chooseoption']) echo "checked"; ?>>&nbsp;
						<?php echo $record['optionC'];?>
					</span><br>
					<span style="margin-left: 30px;">D. <input type="radio" name="ques<?php echo $i;?>" value="<?php echo $record['optionD'];?>" onclick="validate(this.value,<?php echo $record['question_id']; ?>)"
						<?php if($record['optionD']==$record1['chooseoption']) echo "checked"; ?>>&nbsp;
						<?php echo $record['optionD'];?></span>

			<?php
					$i++;
				}

			?>
				

		<?php

		}
		else 
		{
			$i=1;
			while ( $i<=$row) 
			{	
				$record=mysqli_fetch_array($result1);
				// $record1=mysqli_fetch_array($result2);
				
				mysqli_query($con,"insert into exam (stuid,Ques_id) values('$_SESSION[studentid]','$record[question_id]')");

			?>
					<h4>Question-<?php echo $i; ?>. 
						<?php echo $record['name']; ?></h4>
					<span style="margin-left: 30px;">A. <input type="radio" name="ques<?php echo $i;?>" value="<?php echo $record['optionA'];?>" onclick="validate(this.value,<?php echo $record['question_id']; ?>)">&nbsp;
						<?php echo $record['optionA'];?>
					</span><br>
					<span style="margin-left: 30px;">B. <input type="radio" name="ques<?php echo $i;?>" value="<?php echo $record['optionB'];?>" onclick="validate(this.value,<?php echo $record['question_id']; ?>)">&nbsp;
						<?php echo $record['optionB'];?>
					</span><br>
					<span style="margin-left: 30px;">C. <input type="radio" name="ques<?php echo $i;?>" value="<?php echo $record['optionC'];?>" onclick="validate(this.value,<?php echo $record['question_id']; ?>)">&nbsp;
						<?php echo $record['optionC'];?>
					</span><br>
					<span style="margin-left: 30px;">D. <input type="radio" name="ques<?php echo $i;?>" value="<?php echo $record['optionD'];?>" onclick="validate(this.value,<?php echo $record['question_id']; ?>)">&nbsp;
						<?php echo $record['optionD'];?></span>

			<?php
					$i++;
				}
			?>
		
				
		<?php
		}


		$_SESSION['name']=$c_id['name'];

	?>
	<br>
	<div class="text-right" style="margin-bottom: 0px;">
		<input type="submit" value="FinishExam" onclick="return SignOut()" class="btn btn-success">
	</div>
	</form>
</div>
			</div>
		</div>
	</div><br><br><br>
	<?php
}
else
{?>
	<div class="alert text-center">
	<h2>Sorry! no available exam.</h2>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	</div>
<?php
}
	?>
	<br><br>
	<?php include 'footer.php'; ?>
</body>
</html>