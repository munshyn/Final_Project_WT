	<HTML>
	<HEAD><TITLE>Insert Manager</TITLE></HEAD>
	<BODY>

	  <?php
	  	 $managerID = $_POST["id"];
	  	 $managerUsername = $_POST["username"];
		 $managerPassword = $_POST["password"];
	     $managerName = $_POST["managerName"];

	    //  $studentMatric = strtoupper($studentMatric);  // convert matric to uppercase

	     require_once ("config.php");

	     $manager = "INSERT INTO Manager(id, username, password, level, name) VALUES ('$managerID', '$managerUsername','$managerPassword', 2, '$managerName')";

		if (mysqli_query($conn, $manager)) 
			echo '<script>alert("Added successfully");
			window.location.href="../Form/manager_form.php";
			</script>';
		else 
			echo '<script>alert("Add unsuccessful");
			window.location.href="../Form/manager_form.php";
			</script>';

	     mysqli_close($conn);
	   ?>

	</BODY>
	</HTML>

	 