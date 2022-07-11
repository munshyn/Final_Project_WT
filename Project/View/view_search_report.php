<?php
session_start(); 

if ($_SESSION["Login"] != "YES") 
header("Location: ../Start/index.php");

?>

<html>
<head><title>View Report</title><HEAD>
<link rel="stylesheet" href="../style-main.css">
<body>
<div class="container-main">
    <div class="header">
    	<ul>
			<li><a href="../Form/search_report_form.php" class="btn">search</a>    </li>
			<li style="float:right"><a href="../Start/logout.php" class="btn">LOGOUT</a></li>
			<li style="float:right"><a href="../Start/main.php" class="btn">Sass back home</a></li>
	  	</ul>
	</div>
    <div class="middle-form"></div>
  	<div class="footer"></div><!-- footer here -->

	<?php
        require ('../Database/config.php');
        $find = $_POST["id"];
		$sql = "SELECT * FROM Student WHERE id LIKE '%$find%'";
        $result = mysqli_query($conn, $sql);
        $rows=mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)==1) 
        {  
    ?>
    <!-- Print table heading -->
    <div class="view-table">
	<h3>Students' Report:</h3>
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
		 <?php 
	 		} else
			 echo "<p>No record found</p>" ;
		  
          mysqli_close($conn);
          ?>
</div>
</body>
</html>