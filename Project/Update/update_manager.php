<?php
session_start();

if ($_SESSION["Login"] != "YES") 
header("Location: ../Start/index.php");  
 
if ($_SESSION["LEVEL"] != 3){
		$oldID = $_SESSION["oldID"];
		require ("../Database/config.php");

	if ($_SESSION["LEVEL"] == 1) {
		$managerID = $_POST["id"];
		$managerUsername = $_POST["username"];
  		$managerPassword = $_POST["password"];
  		$managerName = $_POST["name"];
		
		$sql = "UPDATE Manager SET id = '$managerID', username = '$managerUsername', password = '$managerPassword', name = '$managerName' WHERE id = '$oldID'" ;

		if (mysqli_query($conn, $sql)) 
		echo '<script>alert("Updated successful");
				window.location.href="../Form/manage_user.php";
				</script>';
		 else 
			echo '<script>alert("Update unsuccessful");
			window.location.href="../Form/manage_user.php";
			</script>';
	} else {
		$managerUsername = $_POST["username"];
  		$managerPassword = $_POST["password"];
  		$managerName = $_POST["name"];

		$sql = "UPDATE Manager SET username = '$managerUsername', password = '$managerPassword', name = '$managerName' WHERE id = '$oldID'" ;
		
		$_SESSION["NAME"] = $managerName;
		
		if (mysqli_query($conn, $sql))
			echo '<script>alert("Updated successful");
			window.location.href="update_manager_form.php";
			</script>';
		else 
			echo '<script>alert("Update unsuccessful");
			window.location.href="update_manager_form.php";
			</script>';
		}
		 mysqli_close($conn);
	  
} else {
	
  echo "<p>Wrong User Level! You are not authorized to view this page</p>";
  
  echo "<p><a href='../Start/logout.php'>LOGOUT</a></p>";
 
   }
 
  ?>