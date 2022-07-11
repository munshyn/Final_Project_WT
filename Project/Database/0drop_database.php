<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "DROP DATABASE PankerZuDatabase";
if (mysqli_query($conn, $sql)) {
  echo "Database dropped successfully";
  require ("create_database.php");
  require ("create_table.php");
  require ("insert_data.php");
} else {
  echo "Error drop database: " . mysqli_error($conn);
}

?>