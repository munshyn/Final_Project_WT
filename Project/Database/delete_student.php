<?php

session_start();

if ($_SESSION["Login"] != "YES") 
header("Location: ../Start/index.php");
 
if ($_SESSION["LEVEL"] == 1) { 

		 $ID = $_GET["id"];
 
	     require ("config.php"); 

	     $sql = "DELETE FROM Student WHERE id = '$ID'" ;

	     $result = mysqli_query($conn, $sql);

	      if (mysqli_query($conn, $sql)) 
		  echo '<script>alert("Deleted successfully");
            window.location.href="../View/view_student.php";
            </script>';
		 else 
		 echo '<script>alert("Delete unsuccessful");
		 window.location.href="../View/view_student.php";
		 </script>';
          mysqli_close($conn);
		  
} else {
	
  echo "<p>Wrong User Level! You are not authorized to view this page</p>";
  
  echo "<p><a href='../Start/logout.php'>LOGOUT</a></p>";
 
	}
?>