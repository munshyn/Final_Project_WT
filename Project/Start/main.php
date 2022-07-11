<?php
session_start();

if ($_SESSION["Login"] != "YES") 
header("Location: index.php");

?>

<html>
	<head><title>Main Page</title></head>
	<link rel="stylesheet" href="../style-main.css">
	<body>

	<!-- ADMIN -->
	<?php if ($_SESSION["LEVEL"] == 1) { ?>
	<div class="container-main">
	<div class="header">
		<ul>
			<li><a href="../View/view_profile.php" class="btn"><?php echo $_SESSION["NAME"]; ?></a></li>
			<li style="float:right"><a href="logout.php" class="btn">LOGOUT</a></li>
		</ul>
	</div>
	
	<div class="middle"></div><!--background image here -->
		
	<div class="welcome-text tracking-in-expand">
		<p id="p1">WELCOME TO MAIN PAGE </p>
		<p id="p2">STUDENT COLLEGE ACCOMMODATION SYSTEM</p>
	</div>

	<div class="footer"></div><!-- footer here -->
	
	
	<a href="../Form/manage_user.php" class="box" id="box-1">
		<img src="../image/admin_manage.png" alt="manage user" class="icon">
		<p>Manage users</p>
	</a>
	<a href="../View/view_all_user.php" class="box" id="box-2">
		<img src="../image/view.png" alt="view all user" class="icon">
		<p>View all Users</p> 
	</a>
	<a href="../View/view_application.php" class="box" id="box-3">
		<img src="../image/view2.png" alt="view application" class="icon"> 
		<p>View students' <br> application</p> 
	</a>
	<a href="../Form/manage_college.php" class="box" id="box-4">
		<img src="../image/view3.png" alt="view all users" class="icon">
		<p>Manage College</p> 
	</a>
	
	</div><!-- container end -->
	
	<!-- MANAGER -->
	<?php }else if ($_SESSION["LEVEL"] == 2) { ?>
	<div class="container-main">
	<div class="header">
		<ul>
			<li><a href="../View/view_profile.php" class="btn"><?php echo $_SESSION["NAME"]; ?></a></li>
			<li style="float:right"><a href="logout.php" class="btn">LOGOUT</a></li>
		</ul>
	</div>
	
	<div class="middle"></div><!--background image here -->
		
	<div class="welcome-text tracking-in-expand">
		<p id="p1">WELCOME TO MAIN PAGE </p>
		<p id="p2">STUDENT COLLEGE ACCOMMODATION SYSTEM</p>
	</div>

	<div class="footer"></div><!-- footer here -->
	
	<!-- Manager cannot add new user? -->
	<a href="../View/view_college.php" class="box" id="box-1">
		<img src="../image/college.png" alt="view college" class="icon">
		<p>View College</p>
	</a>
	<a href="../View/view_student.php" class="box" id="box-2">
		<img src="../image/view.png" alt="view all student" class="icon">
		<p>View all Students</p> 
	</a>
	<a href="../View/view_application.php" class="box" id="box-3">
		<img src="../image/view2.png" alt="applicaiton" class="icon"> 
		<p>Manage student's' Application</p> 
	</a>
	<a href="../View/view_report.php" class="box" id="box-4">
		<img src="../image/search_subject.png" alt="report" class="icon">
		<p>View Students' Report</p> 
	</a>
	
	</div><!-- container end -->
	
	<!-- STUDENT -->
	<?php }else if ($_SESSION["LEVEL"] == 3) { ?>
	<div class="container-main">
	<div class="header">
		<ul>
			<li><a href="../View/view_profile.php" class="btn"><?php echo $_SESSION["NAME"]; ?></a></li>
			<li style="float:right"><a href="logout.php" class="btn">LOGOUT</a></li>
		</ul>
	</div>
	
	<div class="middle"></div><!--background image here -->
		
	<div class="welcome-text tracking-in-expand">
		<p id="p1">WELCOME TO MAIN PAGE </p>
		<p id="p2">STUDENT COLLEGE ACCOMMODATION SYSTEM</p>
	</div>

	<div class="footer"></div><!-- footer here -->
	
	
	<a href="../View/view_college.php" class="box" id="box-1">
		<img src="../image/college.png" alt="coollege" class="icon">
		<p>View College</p>
	</a>
	<a href="../Form/student_application_form.php" class="box" id="box-2">
		<img src="../image/view.png" alt="aplication" class="icon">
		<p>Apply for College</p> 
	</a>
	<a href="../View/view_application.php" class="box" id="box-3">
		<img src="../image/view2.png" alt="view statsus" class="icon"> 
		<p>View application status</p> 
	</a>
	<a href="../View/view_report.php" class="box" id="box-4">
		<img src="../image/search_subject.png" alt="report" class="icon">
		<p>View Report</p> 
	</a>
	
	</div><!-- container end -->

	<?php } ?>
	</body>
</html>