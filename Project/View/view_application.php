<?php
session_start(); 

if ($_SESSION["Login"] != "YES") 
header("Location: ../Start/index.php");

?>

<html>
<head><title>View Application</title></head>
<link rel="stylesheet" href="../style-main.css">
<body>
<div class="container-main">
	<div class="header">
    	<ul>
			<li>Student College Application</li>
			<li style="float:right"><a href="../Start/logout.php" class="btn">LOGOUT</a></li>
			<li style="float:right"><a href="../Start/main.php" class="btn">back</a></li>
	  	</ul>
	</div>
	<div class="middle-form"></div>
  	<div class="footer"></div><!-- footer here -->

	<?php
	    require ("../Database/config.php");
// STUDENT 
        if ($_SESSION["LEVEL"] == 3) {
			$ID=$_SESSION["ID"];
        	$sql = "SELECT * FROM Student WHERE id = '$ID'";
			$result = mysqli_query($conn, $sql);
			$rows = mysqli_fetch_assoc($result);
		 	if($rows['status']=='')
		 		echo '<script>alert("You have not applied for any college yet!");
            	window.location.href="../Start/main.php";
            	</script>';

			else if($rows['status']=='PENDING') {
			?>
			
					<!-- Start table -->
				<div class="view-table">
				<h3>Your Application:</h3>
				<a href="../Database/delete_application.php" class="btn">Cancel Application</a>
				<table class="table">
					<tr>
						<td>ID:</td>
						<td><?php echo $rows['id']; ?></td>
					</tr>
					<tr>
						<td>Name:</td>
						<td><?php echo $rows['name']; ?></td>
					</tr>
					<tr>
						<td>Gender:</td>
						<td><?php echo $rows['gender']; ?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?php echo $rows['email']; ?></td>
					</tr>
					<tr>
						<td>College:</td>
						<td><?php echo $rows['collegeName']; ?></td>
					</tr>
					<tr>
						<td>Room Type:</td>
						<td><?php echo $rows['roomType']; ?></td>
					</tr>
					<tr>
						<td>Status:</td>
						<td><?php echo $rows['status']; ?></td>
					</tr>
					</table>
				</div>

		<?php } else {
			?>
			
					<!-- Start table -->
				<div class="view-table">
				<h3>Your Application:</h3>
				<table class="table">
					<tr>
						<td>ID:</td>
						<td><?php echo $rows['id']; ?></td>
					</tr>
					<tr>
						<td>Name:</td>
						<td><?php echo $rows['name']; ?></td>
					</tr>
					<tr>
						<td>Gender:</td>
						<td><?php echo $rows['gender']; ?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?php echo $rows['email']; ?></td>
					</tr>
					<tr>
						<td>College:</td>
						<td><?php echo $rows['collegeName']; ?></td>
					</tr>
					<tr>
						<td>Room Type:</td>
						<td><?php echo $rows['roomType']; ?></td>
					</tr>
					<tr>
						<td>Status:</td>
						<td><?php echo $rows['status']; ?></td>
					</tr>
					</table>
				</div>

		<?php }
		 
		  } 
//MANAGER OR ADMIN
		else if ($_SESSION["LEVEL"] !=3 ) {
			$sql = "SELECT * FROM College";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
		?>
		
		<div class="view-table">
		<h3>College Availability: </h3> 
		<table class="table">

		<!-- Print table heading -->
		<tr>
			<th>College Name</th>
			<th>Availability</th>
			<th>Occupied</th>
	 	</tr>

		 <?php
		// output data of each row
		 while($rows = mysqli_fetch_assoc($result)) { ?>
	  
		<tr>
			<td><?php echo $rows["collegeName"]; ?></td>
			<td><?php echo $rows["availability"]; ?></td>
			<td><?php echo $rows["occupied"]; ?></td>
	    </tr>
		
	    <?php } 
		 } ?>
		</table>
		<!-- ------------------- -->


		<h3>Student application: </h3> 
		<?php 
        $sql = "SELECT * FROM Student WHERE collegeName LIKE 'KOLEJ%'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
		?>
		
		<table class="table">

		<!-- Print table heading -->
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Gender</th>
       	 	<th>E-Mail</th>
			<th>College</th>
			<th>Room Type</th>
			<th>Status</th>
			<th>Approve</th>
			<th>Reject</th>
	 	</tr>

		 <?php
		// output data of each row
		 while($rows = mysqli_fetch_assoc($result)) { ?>
	  	<?php $temp = $rows["status"];
		if(($temp=='PENDING') && ($_SESSION["LEVEL"]==2)) { ?>
		<tr>
	    <td><?php echo $rows["id"]; ?></td>
			<td><?php echo $rows["name"]; ?></td>
			<td><?php echo $rows["gender"]; ?></td>
			<td><?php echo $rows["email"]; ?></td>
			<td><?php echo $rows["collegeName"];?></td>
			<td><?php echo $rows["roomType"]; ?></td>
			<td><?php echo $temp; ?></td>
			<td><a class="btn_green" href='../Update/update_student.php?id=<?php echo $rows['id']; ?>&status=APPROVED&collegeName=<?php echo $rows["collegeName"]; ?> '>Approve</a></td>
			<td><a class="btn_red" href='../Update/update_student.php?id=<?php echo $rows['id']; ?>&status=REJECTED&collegeName=<?php echo $rows["collegeName"]; ?> '>Reject</a></td>
		<?php } else { ?>
	    	<td><?php echo $rows["id"]; ?></td>
			<td><?php echo $rows["name"]; ?></td>
			<td><?php echo $rows["gender"]; ?></td>
			<td><?php echo $rows["email"]; ?></td>
			<td><?php echo $rows["collegeName"];?></td>
			<td><?php echo $rows["roomType"]; ?></td>
			<td><?php echo $temp; ?></td>
			<td></td>
			<td></td>	
			<?php } ?>
		</tr>
		<?php } ?>
	</table>
	</div>
		<?php } else 
		echo "<p>No record found</p>" ;
		 } 
		 mysqli_close($conn); ?>
	
</div>
</body>
</html>