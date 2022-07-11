<?php
session_start(); ?>

	<HTML>
	<HEAD>
	<TITLE>Delete Application</TITLE></HEAD>
	<BODY>

	  <?php		
		require_once ("config.php");

		$studentID = $_SESSION["ID"];

        $studentT = "UPDATE Student SET collegeName = '', status = '', roomType ='' WHERE id = '$studentID'" ;
		
		if (mysqli_query($conn, $studentT)) 
		echo '<script>alert("Canceled successfully");
            window.location.href="../Start/main.php";
            </script>';
		else 
		 echo '<script>alert("Cancel unsuccessful");
			window.location.href="../Start/main.php";
			</script>';

        ?>
    </BODY>
</HTML>