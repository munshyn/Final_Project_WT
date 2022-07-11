<?php 
session_start();
 
require ('../Database/config.php');

$myusername=$_POST["username"];
$mypassword=$_POST["password"];

$sql="SELECT * FROM Adming WHERE username='$myusername' and password='$mypassword'";

$result = mysqli_query($conn, $sql);

$rows=mysqli_fetch_assoc($result);

$count=mysqli_num_rows($result);

if($count==1){

$_SESSION["Login"] = "YES";
$_SESSION["ID"] = $rows["id"];
$_SESSION["USER"] = $rows["username"];
$_SESSION["LEVEL"] =$rows["level"];
$_SESSION["NAME"] =$rows["name"];

header("Location: main.php");

} else {
    $sql="SELECT * FROM Manager WHERE username='$myusername' and password='$mypassword'";

    $result = mysqli_query($conn, $sql);

    $rows=mysqli_fetch_assoc($result);

    $count=mysqli_num_rows($result);

    if($count==1){

    $_SESSION["Login"] = "YES";
    $_SESSION["ID"] = $rows["id"];
    $_SESSION["USER"] = $rows["username"];
    $_SESSION["LEVEL"] =$rows["level"];
    $_SESSION["NAME"] =$rows["name"];

    header("Location: main.php");

    } else {
        $sql="SELECT * FROM Student WHERE username='$myusername' and password='$mypassword'";
    
        $result = mysqli_query($conn, $sql);
    
        $rows=mysqli_fetch_assoc($result);
    
        $count=mysqli_num_rows($result);
    
        if($count==1){
    
        $_SESSION["Login"] = "YES";
        $_SESSION["ID"] = $rows["id"];
        $_SESSION["USER"] = $rows["username"];
        $_SESSION["LEVEL"] =$rows["level"];
        $_SESSION["NAME"] =$rows["name"];

        header("Location: main.php");

        } else{
        
        $_SESSION["Login"] = "NO";
        header("Location: index.php");
        }
    }
}

mysqli_close($conn);

?>