<?php
session_start(); 

if ($_SESSION["Login"] != "YES") 
header("Location: ../Start/index.php");

if ($_SESSION["LEVEL"] != 2){
		$oldID = $_SESSION["oldID"];

		require ("../Database/config.php");

	if ($_SESSION["LEVEL"] == 1) { 
		$studentID = $_POST["id"];
		$studentUsername = $_POST["username"];
  		$studentPassword = $_POST["password"];
  		$studentName = $_POST["name"];
 		 
	     $sql = "UPDATE Student SET id = '$studentID', username = '$studentUsername', password = '$studentPassword', name = '$studentName' WHERE id = '$oldID'" ; 	
		 
		if (mysqli_query($conn, $sql)) 
		echo '<script>alert("Updated successful");
		   window.location.href="../Form/manage_user.php";
		   </script>';
		else 
		echo '<script>alert("Update unsuccessful");
		   window.location.href="../Form/manage_user.php";
		   </script>';
	} else {
		$studentUsername = $_POST["username"];
  		$studentPassword = $_POST["password"];
  		$studentName = $_POST["name"];

	     $sql = "UPDATE Student SET username = '$studentUsername', password = '$studentPassword', name = '$studentName' WHERE id = '$oldID'" ;
		 
		 $_SESSION["NAME"] = $studentName;

		if (mysqli_query($conn, $sql)) 
		echo '<script>alert("Updated successful");
		   window.location.href="update_student_form.php";
		   </script>';
		else 
		echo '<script>alert("Update unsuccessful");
		   window.location.href="update_student_form.php";
		   </script>';
	}
		 mysqli_close($conn);
	  
} else if ($_SESSION["LEVEL"] == 2) { 
	$studentID = $_GET["id"];
	$STATUS = $_GET["status"];
	$collegeName = $_GET["collegeName"];

	require ("../Database/config.php");

	if($STATUS=='APPROVED')
		$sql1 = "UPDATE College SET availability=availability-1, occupied=occupied+1 WHERE collegeName = '$collegeName' ";
	else
		$sql1 = "UPDATE College SET availability=availability+1, occupied=occupied-1 WHERE collegeName = '$collegeName' ";
	  
	 $sql = "UPDATE Student SET status = '$STATUS' WHERE id = '$studentID'" ;
	 
	 if (mysqli_query($conn, $sql)) {
			if (mysqli_query($conn, $sql1)) 
			echo '<script>alert("Updated successful");
			   window.location.href="../View/view_application.php";
			   </script>';
			else 
			echo '<script>alert("Unsuccessful");
			   window.location.href="../View/view_application.php";
			   </script>';
			  
	  
	} else 
	echo '<script>alert("Unsuccessful");
			   window.location.href="../View/view_application.php";
			   </script>';

	mysqli_close($conn);

  
} else {
	
  echo "<p>Wrong User Level! You are not authorized to view this page</p>";
	 
  echo "<p><a href='../Start/main.php'>Go back to main page</a></p>";
  
  echo "<p><a href='../Start/logout.php'>LOGOUT</a></p>";
 
   } ?>