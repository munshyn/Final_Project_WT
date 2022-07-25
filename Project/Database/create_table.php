<?php
 
require_once ("config.php");

$studentT = "CREATE TABLE Student(
	id VARCHAR(10) PRIMARY KEY,
	username VARCHAR(15),
	password VARCHAR(20),
	level int(1),
	name VARCHAR(30),
	email VARCHAR(40),
	gender VARCHAR(6),
	collegeName VARCHAR(30),
	roomType VARCHAR(6),
	status VARCHAR(8))";
	
$managerT = "CREATE TABLE Manager(
	id VARCHAR(10) PRIMARY KEY,
	username VARCHAR(15),
	password VARCHAR(20),
	level int(1),
	name VARCHAR(30))";

$adminT = "CREATE TABLE Adming(
	id VARCHAR(10) PRIMARY KEY,
	username VARCHAR(15),
	password varchar(20),
	level int(1),
	name VARCHAR(30))";

$collegeT = "CREATE TABLE College(
	collegeName VARCHAR(30) PRIMARY KEY,
	occupied int(2),
	availability int(2))";

if (mysqli_query($conn, $studentT)) {
  echo "<br>Table student created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

if (mysqli_query($conn, $managerT)) {
	echo "<br>Table manager created successfully";
  } else {
	echo "Error creating table: " . mysqli_error($conn);
  }

if (mysqli_query($conn, $adminT)) {
	echo "<br>Table admin created successfully";
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