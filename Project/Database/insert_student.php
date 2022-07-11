	<HTML>
	<HEAD><TITLE>Insert Student</TITLE></HEAD>
	<BODY>

	  <?php
	  	 $studentID = $_POST["id"];
	  	 $studentUsername = $_POST["username"];
		 $studentPassword = $_POST["password"];
	     $studentName = $_POST["studentName"];

	     require_once ("config.php");

	     $studentT = "INSERT INTO Student(id, username, password, level, name) VALUES ('$studentID', '$studentUsername','$studentPassword', 3, '$studentName')";

		if (mysqli_query($conn, $studentT)) 
		echo '<script>alert("Added successfully");
            window.location.href="../Form/student_form.php";
            </script>';
		 else 
		 echo '<script>alert("Add unsuccessful");
            window.location.href="../Form/student_form.php";
            </script>';

	     mysqli_close($conn);
	   ?>

	</BODY>
	</HTML>