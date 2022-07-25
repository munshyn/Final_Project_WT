<?php
session_start();

?>

<html>

<head>
	<title>View All Students</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../static/main.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

	<head>
			<body class="mt-4">
    <div class="flex-wrapper">
        <!-- navigation bar -->
        <nav class="nav-bar d-flex justify-content-between align-items-end">
            <!-- to change the title of website if user manage to login -->
            <?php
            if (isset($_SESSION['userId'])) {
                echo '<a class="navbar-brand" href="profile.php">' . $_SESSION["name"] . '</a>';
            } else {
                echo '<a class="navbar-brand" href="index.php">ParkerPanzu</a>';
            }
            ?>
            <!-- to change the nav depending on the user level -->
            <?php
            if (isset($_SESSION['userId'])) {
                if ($_SESSION["level"] == 1) {
            ?>
                    <ul class="nav-item d-flex align-items-end">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#" class="ms-4">Users</a></li>
                        <li><a href="#" class="ms-4">Application</a></li>
                        <li><a href="#" class="ms-4">College</a></li>
                    </ul>
                <?php
                } else if ($_SESSION["level"] == 2) {
                ?>
                    <ul class="nav-item d-flex align-items-end">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#" class="ms-4">Students</a></li>
                        <li><a href="#" class="ms-4">Manage Application</a></li>
                        <li><a href="#" class="ms-4">College</a></li>
                    </ul>
                <?php
                } else if ($_SESSION["level"] == 3) {
                ?>
                    <ul class="nav-item d-flex align-items-end">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#home" class="ms-4">Apply College</a></li>
                        <li><a href="#how-work" class="ms-4">Status</a></li>
                        <li><a href="#company" class="ms-4">College</a></li>
                    </ul>
                <?php
                }
            } else {
                ?>
                <ul class="nav-item d-flex align-items-end">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#home" class="ms-4">About</a></li>
                    <li><a href="#how-work" class="ms-4">How it work</a></li>
                    <li><a href="#company" class="ms-4">Company</a></li>
                </ul>
            <?php
            }
            ?>
            <!-- to change the login button to logout if the user successfuly login -->
            <?php
            if (isset($_SESSION['userId'])) {
                echo '<div class="nav-login btn btn-primary"><a href="logout.php">Logout</a></div>';
            } else {
                echo '<div class="nav-login btn btn-primary"><a href="login.php">Login</a></div>';
            }
            ?>
        </nav>
        <!-- main content -->
        <div class="main">
            <!-- home or about -->
            <div class="section section-home" id="home">
				<div class="container-fluid">
					<table class="table table-striped">
				<thead style="background-color: #B0DDE4;">
					<tr>
						<th scope="col">No</th>
						<th scope="col">Email</th>
						<th scope="col">Name</th>
						<th scope="col">Level</th>
					</tr>
				</thead>
				<tbody>
					<tr>
				<tbody id="item"></tbody>
				</tr>
				</tbody>
			</table>
			<br>
			<div class="row justify-content-center">
				<a href="index.php"><button type="" class="btn btn-primary">Back</button></a>
			  </div>
			</div>
		</div>
            </div>
        </div>
        <footer class="footer d-flex justify-content-between align-items-center">
            <a href="#">ParkerPanzu</a>
            <div class="footer-item d-flex justify-content-evenly">
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">How it work</a>
                <a href="#">Company</a>
            </div>
            <div class="footer-social d-flex justify-content-evenly">
                <a href="https://www.facebook.com" target="_blank"><i class="uil uil-facebook-f"></i></a>
                <a href="https://twitter.com/home?lang=en" target="_blank"><i class="uil uil-twitter"></i></a>
                <a href="https://www.instagram.com/?hl=en" target="_blank"><i class="uil uil-instagram"></i></a>
            </div>
        </footer>
    </div>

</body>

</html>

<script>
	document.addEventListener("DOMContentLoaded", function () {
		event.preventDefault();

		//step 1
		var xhttp = new XMLHttpRequest();
		//step 2
		xhttp.open("GET", "http://localhost/final_project_wt/api/students", true);
		//step 3
		xhttp.send();
		//step 4 - do the process upon receiving the response with status 200
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && xhttp.status == 200) {
				//alert(this.responseText);
				console.log(this.responseText);
				console.log(JSON.parse(this.responseText));
				//display the users in table
				var item = JSON.parse(this.responseText);
				
				var content = '';
				for (let i = 0; i < item.length; i++) {
					content += "<tr><td>" + (i + 1) + "</td><td>" + item[i].email + "</td><td>" + item[i].name + "</td><td>" + item[i].level + "</td></tr>";
					console.log("test")
				}
				document.getElementById("item").innerHTML = content;
			}
			// when step 4, with status == 404
			else if (this.readyState == 4 && xhttp.status == 404) {
				alert(this.status + ' </br> resos not found');
			}
		};
	});
</script>