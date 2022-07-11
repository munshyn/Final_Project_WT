<?php
session_start(); 

if ($_SESSION["Login"] != "YES") 
header("Location: ../Start/index.php");   
 
if ($_SESSION["LEVEL"] == 1) { 	

?>
<html>
<head>
<?php
echo '<script type="text/javascript" src="../validation.js">';
echo '</script>';
?>
<title>Updating Admin Data</title><head>
<link rel="stylesheet" href="../style-main.css">
<body>
	<div class="container-main">
		<div class="header">
    		<ul>
				<li><a href="../Start/main.php" class="btn">Home</a></li>
				<li style="float:right"><a href="../Start/logout.php" class="btn">LOGOUT</a></li>
			</ul>
		</div>
		<div class="middle-form"></div>
  		<div class="footer"></div><!-- footer here -->
		
		<div id="form-title">
			<p id="p2">Update Admin Data Form</p>
		</div>

		<?php		 
		require ("../Database/config.php");
		$ID = $_SESSION["ID"];
		$_SESSION["oldID"] = $ID;
		$sql="SELECT * FROM Adming WHERE id='$ID'";
		$result = mysqli_query($conn, $sql);
		$rows=mysqli_fetch_assoc($result);
		?>

		<div id="form-content">
			<p id="p1">Please fill in the following information:</p>
			<form name="form1" method="post" action="update_admin.php" onsubmit="return validate()">
			<table class="form">
			<tr>
				<td class="form-text">Current ID</td>
				<td><b id="oldid"><?php echo $rows['id']; ?></b></td>
			</tr>
				<td class="form-text">New ID</td>
				<td><input name="id" class="form-box" type="text" id="id" value="<?php echo $rows['id']; ?>"></td>
			</tr>
				<td class="form-text">Username</td>
				<td><input name="username" class="form-box" type="text" id="username" value="<?php echo $rows['username']; ?>"></td>
			</tr>
				<td class="form-text">Password</td>
				<td><input name="password" class="form-box" type="text" id="password" value="<?php echo $rows['password']; ?>"></td>
			</tr>
				<td class="form-text">Name</td>
				<td><input name="name" class="form-box" type="text" id="name" value="<?php echo $rows['name']; ?>"></td>
			</tr>
			</table>
			<br><br>
			<input type="submit" name="Submit" value="Update" class="btn">
			</form>
		</div>
	</div>
</body>
</html>

<?php
			 
	mysqli_close($conn);
	    
// If the user is not correct level
} else {
	
  echo "<p>Wrong User Level! You are not authorized to view this page</p>";
  
  echo "<p><a href='../Start/logout.php'>LOGOUT</a></p>";
  }
  
?>