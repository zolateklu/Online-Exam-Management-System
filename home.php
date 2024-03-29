<?php
ob_start();
session_start();
include 'header.php';
include 'menubar.php';
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="JavaScript/studentlogin.js"></script>
<style type="text/css">
div.middle{
	max-height: 450px;
	max-width: 500px;
	overflow-y: scroll;
}
	div.left p > a{
		color: blue;
		font-style: italic;
		text-decoration: none;
	}
	div.left p > a:hover{
		color: red;
		font-style: italic;
		text-decoration: underline;
	}
	div.left p > a:active{
		color: green;
		font-style: italic;
	}
	body {
  background-image: url('images/gage.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
a:link {
  color: white;
  background-color: transparent;
  text-decoration: none;
}

a:visited {
  color: lightblue;
  background-color: transparent;
  text-decoration: none;
}

a:hover {
  color: lightgreen;
  background-color: transparent;
  text-decoration: underline;
}

a:active {
  color: red;
  background-color: transparent;
  text-decoration: underline;
</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div><h3 class="text-center text-info" style="font-weight: bold;color: white">EXAMINATION NEWS</h3>
				<p style="font-weight: bold; font-size: 15px">  1. <a href="examscheduleall.php">Examination Informations</a></p>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="right">
<h3 class="text-center text-info" style="font-weight: bold;color: white">EXAMINATION  INSTRSTRUCTIONS</h3>
<h4 class="text-center text-success" style="font-weight: bold; color: white;">Please Read These Instructions Carefully:-</h4>
	<p style="font-weight: bold; color: white;"><span style="color: red;font-size: 18px;font-weight: bold;">Note:-</span> A candidate who breaches any of the Examination Regulations will be liable to disciplinary action including (but not limited to) suspension or expulsion from the University.</p>
<dl>
	<dt style="font-weight: bold; color:white;">Timings:-</dt>
	<dd>
		<ul type="1" style="font-weight: bold; color:white;">
			<li>Examinations will be conducted during the allocated times shown in the examination timetable.</li>
			<li>The examination hall will be open for admission <span style="font-weight: bold;">15 minutes</span> before the time scheduled for the commencement of the examination.</li>
			<li><span style="font-weight: bold;">Don't Login until the invigilator said to login.</span></li>
			<li>You will not be admitted for the examination after <span style="font-weight: bold;">ONE HOUR</span> of the commencement of the examination.</li>
		</ul>
	</dd>
	<dt style="font-weight: bold; color:white;">Personal Belongings:-</dt>
	<dd>
		<ul type="1" style="font-weight: bold; color:white;">
			<li> All your personal belongings (such as bags, pouches, ear/headphones, laptops etc.) 
            must be placed at the designated area outside the examination hall. Please do not bring any 
            valuable belongings  except the essential materials required for the examinations.</li>
            <li>The University will not be responsible for the loss or damage of any belongings in or outside the 
            examination hall.</li>
		</ul>
	</dd>
	<dt style="font-weight: bold; color:white;">Items not Permitted in the Examination Hall:-</dt>
	<dd>
		<ul type="1" style="font-weight: bold; color:white; ">
			<li>Any unauthorised materials, such as books, paper, documents, pictures and electronic devices with communication and/or storage capabilities such as tablet PC, laptop, smart watch, portable audio/video/gaming devices etc. are not to be brought into the examination hall.</li>
			<li><span style="font-weight: bold; color:white; ">Handphones brought into the examination hall must be switched off at ALL times.</span> If your handphone is found to be switched on in the examination hall, the handphone will be confiscated and retained for investigation of possible violation of regulations.</li>
			<li>No food or drink, other than water, is to be brought into the examination hall.</li>
			<li>Photography is NOT allowed in the examination hall at ALL times.</li>
		</ul>
	</dd>
	<dt style="font-weight: bold; color:white;">During Examination:-</dt>
	<dd>
		<ul type="1" style="font-weight: bold; color:white;">
			<li>You are not allowed to communicate by word of mouth or otherwise with other candidates (this includes the time when answer scripts are being collected).</li>
			<li>Please raise your hand if you wish to communicate with an invigilator.</li>
			<li>Unless granted permission by an invigilator, you are not allowed to leave your seat.</li>
			<li>Don't use Mobile Phones For Calculations.</li>
			<li>Once you have entered the examination hall, you will not be allowed to leave the hall until one hour
				after the examination has commenced. </li>
            <li>Use Pens or Pencil for Rough work.</li>
            <li>Don't do any other activity during examinations.</li>
            <li>After Login(seeing questions), don't Submit before completion of exam.</li>
            <li>During Examination, don't Close the <span style="font-weight: bold; color:white; ">Browser Window.</span></li>
			<li>During Examination, don't <span style="font-weight: bold;color:red;">Refresh</span>
				the <span style="font-weight: bold; color:white; ">Browser Window.</span></li>
		</ul>
	</dd>
	<dt style="font-weight: bold; color:white;">At the End of the Examination:-</dt>
	<dd>
		<ul type="1" style="font-weight: bold; color:white;">
			<li>You are to stay in the examination hall until the Chief Invigilator has given the permission to leave. Do <span style="font-weight: bold; color:white;">NOT</span> talk until you are outside of the examination hall.</li>
			<li>Once dismissed, you should leave the examination hall quickly and quietly. Remember to take your <span style="font-weight: bold; color:white; ">personal belongings</span>
			 with you. </li>
			 <li>Wait for Results....</li>
		</ul>
	</dd>
</dl>
</div>
			</div>
			<div class="col-sm-4">
				<div class="right">
	
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
			</div>

		</div>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>