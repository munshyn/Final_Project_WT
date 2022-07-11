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

<title>Inserting Student Data</title></head>
<link rel="stylesheet" href="../style-main.css">
<body>

<div class="container-main">
  <div class="header">
    <ul>
		  <li><a href="../View/view_profile.php" class="btn"><?php echo $_SESSION["NAME"]; ?></a></li>
		  <li style="float:right"><a href="manage_user.php" class="btn">BACK</a></li>
	  </ul>
  </div>
  
  <div class="middle-form"></div>
  <div class="footer"></div><!-- footer here -->

  <div id="form-title">
    <p id="p2">Student Data Form<p><br>
  </div>

  <div id="form-content">
    <p id="p1">Please fill in the following information:</p>
    <form name="form1" method="POST" action="../Database/insert_student.php" onsubmit="return validate()">
    <table class="form">
	  <tr>
      <td class="form-text">Student's ID</td>
      <td><input type="text" name="id" class="form-box"></td>
    </tr>
	  <tr>
      <td class="form-text">Student's Username</td>
      <td><input type="text" name="username" class="form-box"></td>
    </tr>
    <tr>
      <td class="form-text">Student's Password</td>
      <td><input type="text" name="password" class="form-box"></td>
  	</tr>
    <tr>
      <td class="form-text"> Student's name</td>
      <td><input type="text" name="studentName" class="form-box"></td>
	  </tr>
    </table>
    <br><br>
    <input type="submit" name="button1" value="Submit" class="btn"></td>
    </form>
  </div>
</div>
</body>
</html>


<?php 
} else {
	
  echo "<p>Wrong User Level! You are not authorized to view this page</p>";
  
  echo "<p><a href='../Start/logout.php'>LOGOUT</a></p>";
} ?>