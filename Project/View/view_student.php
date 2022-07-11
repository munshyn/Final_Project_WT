<?php
session_start(); 

if ($_SESSION["Login"] != "YES") 
header("Location: ../Start/index.php");

if ($_SESSION["LEVEL"] != 3) {   
?>
	 	
<html>
<head><title>Viewing Student Data</title><head>
<link rel="stylesheet" href="../style-main.css">
<body>
<div class="container-main">
	<div class="header">
    	<ul>
			<li>View Student Details</li>
			<li style="float:right"><a href="../Start/logout.php" class="btn">LOGOUT</a></li>
			<?php if($_SESSION["LEVEL"]==2){ ?>
			<li style="float:right"><a href="../Start/main.php" class="btn">home</a></li>
			<?php } else { ?>
			<li style="float:right"><a href="../Form/manage_user.php" class="btn">back</a></li>
			<?php } ?>
	  	</ul>
	</div>
	<div class="middle-form"></div>
  	<div class="footer"></div><!-- footer here -->

	<?php
	    require ("../Database/config.php"); 
	    $sql = "SELECT * FROM Student";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) { 	
	?>
	<div class="view-table">		 
		<!-- Start table tag -->
	<table class="table">
		 
		<!-- Print table heading -->
		<tr>
			<th>ID</th>
			<th>username</th>
			<th>Name</th>
		
		<?php if ($_SESSION["LEVEL"] == 1) {?>
			<th>Password</th>
			<th>Update</th>
			<th>Delete</th>
			
		<?php } ?>

		</tr> 
		<?php
			// output data of each row
			while($rows = mysqli_fetch_assoc($result)) {
		?>
		
	     <tr>
		 	<td><?php echo $rows['id']; ?></td>
			<td><?php echo $rows['username']; ?></td>
			<td><?php echo $rows['name']; ?></td>
			
		<?php if ($_SESSION["LEVEL"] == 1) {?> 
			<!--only user with access level 1 can view update and delete button-->
			<td><?php echo $rows['password']; ?></td>
			<td><a class="btn_green" href="../Update/update_student_form.php?id=<?php echo $rows['id']; ?>">Update</a></td>
			<td><a class="btn_red" href="../Database/delete_student.php?id=<?php echo $rows['id']; ?>">Delete</a></td>
		</tr> 
		
		<?php }
		
			}
		} else {
			echo "<h3>There are no records to show</h3>";
			}

	     mysqli_close($conn);
	   ?>
	    
	</table>
	</div>
	</div>
	</body>
</html> 
 
 	<?php } // If the user is not correct level
	else {
	
	echo "<p>Wrong User Level! You are not authorized to view this page</p>";

	echo "<p><a href='../Start/logout.php'>LOGOUT</a></p>";

	}
  	?>