<?php
session_start(); 

if ($_SESSION["Login"] != "YES") 
header("Location: ../Start/index.php");

?>
<html>
<head><title>Viewing College Data</title><head>
<link rel="stylesheet" href="../style-main.css">
<body>
<div class="container-main">
	<div class="header">
    	<ul>
			<li>View College Data</li>
			<li style="float:right"><a href="../Start/logout.php" class="btn">LOGOUT</a></li>
			<li style="float:right"><a href="../Start/main.php" class="btn">home</a></li>
	  	</ul>
	</div>
	<div class="middle-form"></div>
  	<div class="footer"></div><!-- footer here -->
	
	<?php
	    require("../Database/config.php");
	    $sql = "SELECT * FROM College";
		$result = mysqli_query($conn, $sql);
	    if (!$result) die("SQL query error encountered :".mysqli_error($conn) );
		if (mysqli_num_rows($result) > 0) { 
	?>
					
	<div class="view-table">				 
		<!-- Start table tag -->
	<table class="table">
		 
		<!-- Print table heading -->
		<tr>
			<th>College Name</th>
			<th>Occupied</th>
			<th>Availability</th>
	 	</tr>

		<?php			
					
		// output data of each row
		while($rows = mysqli_fetch_assoc($result)) {
		 
		?>
		
	     <tr>
			<td><?php echo $rows['collegeName']; ?></td>
			<td><?php echo $rows['occupied']; ?></td>
			<td><?php echo $rows['availability']; ?></td>
		</tr>

			
	<?php }
		
			}
		else {
			echo "<h3>There are no records to show</h3>";
			}

	     mysqli_close($conn);
	   ?>
	    
	</table>
	</div>
</div>
</body>
</head>
