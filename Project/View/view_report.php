<?php
session_start(); 

if ($_SESSION["Login"] != "YES") 
header("Location: ../Start/index.php");

?>

<html>
<head><title>View Report</title><head>
<link rel="stylesheet" href="../style-main.css">
<body>
<div class="container-main">
	<div class="header">
    	<ul>
			<li>Student College Application</li>
			<li style="float:right"><a href="../Start/logout.php" class="btn">LOGOUT</a></li>
			<li style="float:right"><a href="../Start/main.php" class="btn">home</a></li>
	  	</ul>
	</div>
	<div class="middle-form"></div>
  	<div class="footer"></div><!-- footer here -->

	<?php
	    require ("../Database/config.php"); 
        if ($_SESSION["LEVEL"] == 3) {
			$ID=$_SESSION["ID"];
         	$sql = "SELECT * FROM Student WHERE id = '$ID' ";
		 	$result = mysqli_query($conn, $sql);
		 	$rows = mysqli_fetch_assoc($result);
		 	if($rows['status']=='PENDING')
		 		echo '<script>alert("Your report has not been approve yet");
            	window.location.href="../Start/main.php";
            	</script>';
			else if($rows['status']=='')
				echo '<script>alert("Your did not apply any college!");
				window.location.href="../Start/main.php";
				</script>';
	   		else {
	?>
	<!-- Start table -->		
	<div class="view-table">
	<h3>Your Report:</h3>
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
		else if ($_SESSION["LEVEL"] !=3 ) {
        	$sql = "SELECT * FROM Student  WHERE status NOT LIKE '%PENDING%' ORDER BY name ASC";
		 	$result = mysqli_query($conn, $sql); ?>

	<div class="view-table">
		<h3>Overall Students' Report:</h3>
		<?php 
			if (mysqli_num_rows($result) > 0) { ?>
			<a href="../Form/search_report_form.php" class="btn">search</a>

			<?php
				 while($rows = mysqli_fetch_assoc($result)){
			?>
		<!-- Print table heading -->
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
	
			 <br/><br/>
		 <?php }
	 		} else
			 echo "<p>No record found</p>" ;
		 }
			 mysqli_close($conn);
		  ?>
		  </div>
</div>
</body>
</html>