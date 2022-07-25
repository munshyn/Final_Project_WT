<?php
session_start(); ?>

	<HTML>
	<HEAD>
	<TITLE>Insert Application</TITLE></HEAD>
	<BODY>

	  <?php		
		require_once ("config.php");
		$studentID = $_SESSION["ID"];
	  	 $studentName = $_POST["name"];
		 $studentEmail = $_POST["email"];
	     $studentGender = $_POST["gender"];
		 $collegeName = $_POST["collegeName"];
		 $roomType = $_POST["roomType"];

	    //  $studentMatric = strtoupper($studentMatric); 

		$studentT = "UPDATE Student SET name = '$studentName', email = '$studentEmail', gender = '$studentGender', collegeName = '$collegeName', status = 'PENDING', roomType ='$roomType' WHERE id = '$studentID'" ;
		
		if (mysqli_query($conn, $studentT)) 
		echo '<script>alert("Applied successfully");
            window.location.href="../Start/main.php";
            </script>';
		else 
		 echo '<script>alert("Application unsuccessful");
			window.location.href="../Start/main.php";
			</script>';

		mysqli_close($conn);
		
	   ?>

	</BODY>
	</HTML>