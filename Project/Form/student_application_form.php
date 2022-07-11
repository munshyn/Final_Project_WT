<?php
session_start(); 

if ($_SESSION["Login"] != "YES") 
header("Location: ../Start/index.php");

$name=$_SESSION["NAME"];
$id=$_SESSION["ID"];

if ($_SESSION["LEVEL"] == 3) { 
  require ("../Database/config.php");
  $sql = "SELECT * FROM Student WHERE id='$id'";
  $result = mysqli_query($conn, $sql);
  $rows=mysqli_fetch_assoc($result);

  if(($rows["status"]=='')||($rows["status"]=='REJECTED')){
?>

<html>
<head>

<?php
echo '<script type="text/javascript" src="../validation.js">';
echo '</script>';
?>

<title>College Application Form</title></head>
<link rel="stylesheet" href="../style-main.css">
<body onload="disableSubmit()">

<div class="container-main">
  <div class="header">
    	<ul>
			  <li>College Application form</li>
			  <li style="float:right"><a href="../Start/logout.php" class="btn">LOGOUT</a></li>
			  <li style="float:right"><a href="../Start/main.php" class="btn">Home</a></li>
	  	</ul>
	</div>
  <div class="middle-form"></div>
  <div class="footer"></div><!-- footer here -->
  
  <div id="form-title">
    <p id="p2">College Form<p><br>
  </div>

<div id="form-content">
  <p id="p1">Please fill in the following information:</p>
<form name="myForm" onsubmit="return validateApp()" action="../Database/insert_application.php" method="post">
  <table class="form">
    <tr>
      <td class="form-text">ID</td>
      <td class="form-box"><?php echo $id; ?></td>
    </tr>
    <tr>
      <td class="form-text">Name</td>
      <td><input type="text"  class="form-box" name="name" value="<?php echo $name; ?>"/></td>
    </tr>
    <tr>
      <td class="form-text">Gender</td>
      <td>
        <input type="radio" name="gender" value="Male" checked>Male</input>
        <input type="radio" name="gender" value="Female">Female</input>
      </td>
    </tr>
    <tr>
      <td class="form-text">E-Mail</td>
      <td><input type="text" class="form-box" name="email" /></td>
    </tr>
    <tr>
      <td class="form-text">College</td>
      <td class="form-box">
        <select name="collegeName">
        <option value="-1" selected>[choose yours]</option>
        <option value="Kolej Tun Dr Ismail">Kolej Tun Dr Ismail</option>
        <option value="Kolej Tuanku Canselor">Kolej Tuanku Canselor</option>
        <option value="Kolej Tunku Fatimah">Kolej Tunku Fatimah</option>
        </select>
      </td>
    </tr>
    <tr>
      <td class="form-text">Room type</td>
      <td  class="form-box">
        <input type="radio" name="roomType" value="Single" checked>Single</input>
        <input type="radio" name="roomType" value="Double">Double</input>
      </td>
    </tr>
  </table> 
<br><br>
 <!-- dom here -->
 <input type="checkbox" id="agree" onchange="activateButton(this)">I agree that all information is true.</input></br></br>
 <input type="submit" value="Submit" id="submitButton" />

</form>
</div>
</div>
</body>
</html>
<?php } else if($rows["status"]=='PENDING')
        echo '<script>alert("You have applied, wait for approval!");
        window.location.href="../Start/main.php";
        </script>';

        else
        echo '<script>alert("Your Application has been Approved!");
        window.location.href="../Start/main.php";
        </script>';
  
        mysqli_close($conn);
      }
 ?>