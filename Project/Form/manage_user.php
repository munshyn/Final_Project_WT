<?php
session_start();

if ($_SESSION["Login"] != "YES") 
header("Location: ../Start/index.php");

?>

<html>
	<head><title>Add new User</title></head>
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
		<p id="p1">USER MANAGEMENT</p>
		<p id="p2">MANAGE USER HERE</p>
	</div>

	<div class="footer"></div><!-- footer here -->
	
	<a href="student_form.php" class="box" id="box-1">
		<img src="../image/update_user.png" alt="add student" class="icon">
		<p>add new student</p>
	</a>
	<a href="manager_form.php" class="box" id="box-2">
		<img src="../image/view.png" alt="add manager" class="icon">
		<p>add new manager</p> 
	</a>
	<a href="../View/view_student.php" class="box" id="box-3">
		<img src="../image/view2.png" alt="view all user" class="icon"> 
		<p>View all Students</p> 
	</a>
	<a href="../View/view_manager.php" class="box" id="box-4">
		<img src="../image/search_subject.png" alt="all manager" class="icon">
		<p>View all Managers</p> 
	</a>
	
	</div><!-- container end -->
	</body>
</html>