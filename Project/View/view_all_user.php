<?php
session_start();

if ($_SESSION["Login"] != "YES")
header("Location: ../Start/index.php");

if ($_SESSION["LEVEL"] == 1) {

?> 	
<html>
<head><title>Viewing User's Data</title><head>
<link rel="stylesheet" href="../style-main.css">
<body>
	<div class="container-main">
	<div class="header">
    	<ul>
			<li>View All Users Details</li>
			<li style="float:right"><a href="../Start/logout.php" class="btn">LOGOUT</a></li>
			<li style="float:right"><a href="../Start/main.php" class="btn">home</a></li>
	  	</ul>
	</div>
	<div class="middle-form"></div>
  	<div class="footer"></div><!-- footer here -->

	
	<?php
	    require ("../Database/config.php"); 
	    $sql = "SELECT * FROM Adming";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) { 	
	?>

	<div class="view-table">
	<table class="table">
		<tr>
			<th>Username</th>
			<th>Password</th>
        	<th>Level</th>
		</tr> 
		
	<?php
		while($rows = mysqli_fetch_assoc($result)) {
	?>

	    <tr>
			<td><?php echo $rows['username']; ?></td>
			<td><?php echo $rows['password']; ?></td>
            <td><?php echo $rows['level']; ?></td>
		</tr> 

	<?php }
		$sql = "SELECT * FROM Manager";
		$result = mysqli_query($conn, $sql);
		while($rows = mysqli_fetch_assoc($result)) {
	?>
		<tr>
			<td><?php echo $rows['username']; ?></td>
			<td><?php echo $rows['password']; ?></td>
			<td><?php echo $rows['level']; ?></td>
		</tr>
	<?php }
		$sql = "SELECT * FROM Student";
		$result = mysqli_query($conn, $sql);
		while($rows = mysqli_fetch_assoc($result)) {
	?>
		<tr>
			<td><?php echo $rows['username']; ?></td>
			<td><?php echo $rows['password']; ?></td>
			<td><?php echo $rows['level']; ?></td>
		</tr>
	<?php }
		} else {
			echo "<h3>There are no records to show</h3>";
			}
	     mysqli_close($conn);
	?>
	    
	</table>
 	<?php } // If the user is not correct level
	else {
	
	echo "<p>Wrong User Level! You are not authorized to view this page</p>";

	echo "<p><a href='../Start/logout.php'>LOGOUT</a></p>";
 
	}
	?>
	</div>
	</div>
</body>
</html>