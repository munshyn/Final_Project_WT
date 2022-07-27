<?php
session_start(); 

// if the user is logged in, unset the session 
if (isset($_SESSION['userId'])) { 
	unset($_SESSION['userId']); 
}
if (isset($_SESSION['name'])) { 
	unset($_SESSION['name']); 
} 
if (isset($_SESSION['level'])) { 
	unset($_SESSION['level']); 
} 
if (isset($_SESSION['email'])) { 
	unset($_SESSION['email']); 
} 

session_destroy(); //destroy the session


// go to login page 
header('Location: index.php'); 
exit; 
?>