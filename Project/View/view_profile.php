<?php
session_start();

if ($_SESSION["Login"] != "YES") 
header("Location: ../Start/index.php");

require ("../Database/config.php");
$ID=$_SESSION["ID"];

// ADMIN
if ($_SESSION["LEVEL"] == 1) {
?>	
<html>
	<head><title>Profile Page</title><head>
    <link rel="stylesheet" href="../style-main.css">
	<body>
    <div class="container-main">
        <div class="header">
            <ul>
                <li>Your Profile</li>
                <li style="float:right"><a href="../Start/logout.php" class="btn">LOGOUT</a></li>
                <li style="float:right"><a href="../Start/main.php" class="btn">home</a> </li>
            </ul> 
        </div>
		<?php
	        $sql = "SELECT * FROM Adming WHERE id='$ID'";
            $result = mysqli_query($conn, $sql);
            $rows=mysqli_fetch_assoc($result);
            if(mysqli_num_rows($result)==1) 
            { 
        ?>
        <div class="middle-profile"></div>
        <div class="footer"></div><!-- footer here -->
        
        <div class="profile-pic"></div>
        <div class="profile-content">
		    <table class="profile">
		    <tr>
                <td>ID:</td>
                <td><?php echo $rows['id']; ?></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><?php echo $rows['username']; ?></td>
            </tr>
		    <tr>
                <td>Name:</td>
                <td><?php echo $rows['name']; ?></td>
            </tr>
            </table>
            <a href="../Update/update_admin_form.php" class="btn">Update</a>
        </div>
    </div>  
    </body>
</html>
	<?php 
	} else {
		echo "<h3>There are no records to show</h3>";
    }

// MANAGER
    } else if ($_SESSION["LEVEL"] == 2) {
        ?>
<html>
	<head><title>Profile Page</title><head>
    <link rel="stylesheet" href="../style-main.css">
	<body>
    <div class="container-main">
        <div class="header">
            <ul>
                <li>Your Profile</li>
                <li style="float:right"><a href="../Start/logout.php" class="btn">LOGOUT</a></li>
                <li style="float:right"><a href="../Start/main.php" class="btn">home</a> </li>
            </ul> 
        </div>
		<?php
	        $sql = "SELECT * FROM Manager WHERE id='$ID'";
            $result = mysqli_query($conn, $sql);
            $rows=mysqli_fetch_assoc($result);
            if(mysqli_num_rows($result)==1) 
            { 
        ?>
        <div class="middle-profile"></div>
        <div class="footer"></div><!-- footer here -->
        
        <div class="profile-pic"></div>
        <div class="profile-content">
		    <table class="profile">
		    <tr>
                <td>ID:</td>
                <td><?php echo $rows['id']; ?></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><?php echo $rows['username']; ?></td>
            </tr>
		    <tr>
                <td>Name:</td>
                <td><?php echo $rows['name']; ?></td>
            </tr>
            </table>
            <a href="../Update/update_manager_form.php" class="btn">Update</a>
        </div>
    </div>  
    </body>
</html>      
    <?php 
    } else {
        echo "<h3>There are no records to show</h3>";
    }

// STUDENT
    }else if ($_SESSION["LEVEL"] == 3) {
     ?>
<html>
	<head><title>Profile Page</title><head>
    <link rel="stylesheet" href="../style-main.css">
	<body>
    <div class="container-main">
        <div class="header">
            <ul>
                <li>Your Profile</li>
                <li style="float:right"><a href="../Start/logout.php" class="btn">LOGOUT</a></li>
                <li style="float:right"><a href="../Start/main.php" class="btn">home</a> </li>
            </ul> 
        </div>
		<?php
	        $sql = "SELECT * FROM Student WHERE id='$ID'";
            $result = mysqli_query($conn, $sql);
            $rows=mysqli_fetch_assoc($result);
            if(mysqli_num_rows($result)==1) 
            { 
        ?>
        <div class="middle-profile"></div>
        <div class="footer"></div><!-- footer here -->
        
        <div class="profile-pic"></div>
        <div class="profile-content">
		    <table class="profile">
		    <tr>
                <td>ID:</td>
                <td><?php echo $rows['id']; ?></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><?php echo $rows['username']; ?></td>
            </tr>
		    <tr>
                <td>Name:</td>
                <td><?php echo $rows['name']; ?></td>
            </tr>
            </table>
            <a href="../Update/update_student_form.php" class="btn">Update</a>
        </div>
    </div>  
    </body>
</html>                       
 	<?php } 
	else {
	
	echo "<p>Wrong User Level! You are not authorized to view this page</p>";

	echo "<p><a href='../Start/logout.php'>LOGOUT</a></p>";
    mysqli_close($conn);
	}
}
  	?>