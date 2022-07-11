<?php
session_start(); 

if ($_SESSION["Login"] != "YES") 
header("Location: ../Start/index.php");   
 
if ($_SESSION["LEVEL"] == 1){
	
		$oldID = $_SESSION["oldID"];
		$adminID = $_POST["id"];
		$adminUsername = $_POST["username"];
  		$adminPassword = $_POST["password"];
  		$adminName = $_POST["name"];
 		 
	     require ("../Database/config.php");

	     $sql = "UPDATE Adming SET id = '$adminID', username = '$adminUsername', password = '$adminPassword', name = '$adminName' WHERE id = '$oldID'" ;

		 $_SESSION["ID"] = $adminID;
		 $_SESSION["NAME"] = $adminName;

	     if (mysqli_query($conn, $sql)) 
		echo '<script>alert("Updated successful");
			window.location.href="update_admin_form.php";
			</script>';

		 else 
		echo '<script>alert("Update unsuccessful");
				window.location.href="update_admin_form.php";
				</script>';
          mysqli_close($conn);
		  
} else  {
	
  echo "<p>Wrong User Level! You are not authorized to view this page</p>";
  
  echo "<p><a href='../Start/logout.php'>LOGOUT</a></p>";
 
   }
 
  ?>