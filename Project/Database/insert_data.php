<?php
 
require ("config.php");

$User1 = "INSERT INTO Adming(id, username, password, level, name) VALUES ('A12','mamu','mamu1',1, 'Mahmud')";
$User2 = "INSERT INTO Manager(id, username, password, level, name) VALUES ('M12','luqman','luqman2',2, 'Luqman')";
$User7 = "INSERT INTO Manager(id, username, password, level, name) VALUES ('M14','mejak','mejak2',2, 'Amjad')";
$User3 = "INSERT INTO Student(id, username, password, level, name) VALUES ('S12','mirwanwan','mirwanwan3',3, 'Amir')";
$User8 = "INSERT INTO Student(id, username, password, level, name) VALUES ('S14','syedmirin','syedmirin3',3, 'Syed')";
$User4 = "INSERT INTO College(collegeName, occupied, availability) VALUES ('Kolej Tun Dr Ismail',66,34)";
$User5 = "INSERT INTO College(collegeName, occupied, availability) VALUES ('Kolej Tuanku Canselor',55,45)";
$User6 = "INSERT INTO College(collegeName, occupied, availability) VALUES ('Kolej Tunku Fatimah',36,64)";

if (mysqli_query($conn, $User1)) {
  echo "<h3>New admin created successfully</h3>";
} else {
  echo "Error: " . $User1 . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $User7)) {
  echo "<h3>New manager1 created successfully</h3>";
} else {
  echo "Error: " . $User2 . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $User2)) {
  echo "<h3>New manager2 created successfully</h3>";
} else {
  echo "Error: " . $User2 . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $User8)) {
  echo "<h3>New student1 created successfully</h3>";
} else {
  echo "Error: " . $User3 . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $User3)) {
  echo "<h3>New student2 created successfully</h3>";
} else {
  echo "Error: " . $User3 . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $User4)) {
  echo "<h3>New college created successfully</h3>";
} else {
  echo "Error: " . $User4 . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $User5)) {
  echo "<h3>New college created successfully</h3>";
} else {
  echo "Error: " . $User5 . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $User6)) {
  echo "<h3>New college created successfully</h3>";
} else {
  echo "Error: " . $User6 . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
 
?> 