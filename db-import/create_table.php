<?php
 
require_once ("config.php");

$adminT = "CREATE TABLE users(
	userId INT PRIMARY KEY AUTO_INCREMENT,
	email VARCHAR(40),
	password varchar(20),
	level int(1),
	name VARCHAR(30))";

$studentT = "CREATE TABLE collegeapp(
	appId INT PRIMARY KEY AUTO_INCREMENT,
	userId INT,
	email VARCHAR(40),
	gender VARCHAR(6),
	collegeName VARCHAR(30),
	roomType VARCHAR(6),
	appStatus VARCHAR(8),
	FOREIGN KEY (userId) REFERENCES users(userId))";

$collegeT = "CREATE TABLE College(
	collegeId int PRIMARY KEY AUTO_INCREMENT,
	collegeName VARCHAR(30),
	occupied int(2),
	availability int(2))";

if (mysqli_query($conn, $adminT)) {
	echo "<br>Table users created successfully";
  } else {
	echo "Error creating table: " . mysqli_error($conn);
  }

if (mysqli_query($conn, $studentT)) {
  echo "<br>Table collegeapp created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

if (mysqli_query($conn, $collegeT)) {
	echo "<br>Table college created successfully";
  } else {
	echo "Error creating table: " . mysqli_error($conn);
  }

mysqli_close($conn);
?>