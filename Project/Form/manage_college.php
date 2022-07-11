<?php
session_start();

if ($_SESSION["Login"] != "YES") 
header("Location: ../Start/index.php");

?>

<html>
	<head><title>Manage College</title></head>
	<link rel="stylesheet" href="../style-main.css">
	
	<body>

	<div class="container-main">
	<div class="header">
		<ul>
			<li><a href="../View/view_profile.php" class="btn"><?php echo $_SESSION["NAME"]; ?></a></li>
			<li style="float:right"><a href="../Start/main.php" class="btn">Home</a></li>
		</ul>
	</div>
	
	<div class="middle"></div><!--background image here -->
		
	<div class="welcome-text tracking-in-expand">
		<p id="p1">COLLEGE</p>
		<p id="p2">INFORMATION</p>
	</div>

	<div class="footer"></div><!-- footer here -->
	
	<a href="../View/view_college.php" class="box" id="box-2">
		<img src="../image/view.png" alt="view college" class="icon">
		<p>View College</p> 
	</a>
	<a href="../View/view_report.php" class="box" id="box-3">
		<img src="../image/view2.png" alt="view all report" class="icon"> 
		<p>View Students' Report</p> 
	</a>
	
	</div><!-- container end -->
	</body>
</html>