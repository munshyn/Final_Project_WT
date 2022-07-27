<?php
session_start();

if (isset($_SESSION["userId"])) {

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Colleges</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../static/main.css">
  </head>

  <body class="mt-4">
    <div class="flex-wrapper">
      <!-- navigation bar -->
      <nav class="nav-bar d-flex justify-content-between align-items-end">
        <!-- to change the title of website if user manage to login -->
        <a class="navbar-brand" href="profile.php"><?php echo $_SESSION["name"]; ?></a>
        <!-- to change the nav depending on the user level -->
        <?php
        if ($_SESSION["level"] == 1) {
        ?>
          <ul class="nav-item d-flex align-items-end">
            <li><a href="index.php">Home</a></li>
            <li><a href="#" class="ms-4">Users</a></li>
            <li><a href="#" class="ms-4">Application</a></li>
            <li><a href="#" class="ms-4">College</a></li>
          </ul>
        <?php
        } else if ($_SESSION["level"] == 2) {
        ?>
          <ul class="nav-item d-flex align-items-end">
            <li><a href="index.php">Home</a></li>
            <li><a href="#" class="ms-4">Students</a></li>
            <li><a href="#" class="ms-4">Manage Application</a></li>
            <li><a href="#" class="ms-4">College</a></li>
          </ul>
        <?php
        } else if ($_SESSION["level"] == 3) {
        ?>
          <ul class="nav-item d-flex align-items-end">
            <li><a href="index.php">Home</a></li>
            <li><a href="app_form.php" class="ms-4">Apply College</a></li>
            <li><a href="view_app.php" class="ms-4">Application Status</a></li>
            <li><a href="#company" class="ms-4">Colleges</a></li>
          </ul>
        <?php
        }
        ?>
        <div class="nav-login btn btn-primary"><a href="logout.php">Logout</a></div>
      </nav>
      <!-- main content -->
      <div class="container w-50">
        <div class="mb-5 d-flex justify-content-center">
          <h1>List of Students</h1>
        </div>
        <table class="table table-bordered table-hover">
          <thead class="table-primary">
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Student Name</th>
              <th scope="col">Email</th>
            </tr>
          </thead>
          <tbody id="item">
          </tbody>
        </table>

      </div>
      <footer class="footer d-flex justify-content-between align-items-center">
        <a href="#">ParkerPanzu</a>
        <div class="footer-item d-flex justify-content-evenly">
          <a href="index.php">Home</a>
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


    <script>
      document.addEventListener("DOMContentLoaded", function () {
		event.preventDefault();

		var xhttp = new XMLHttpRequest();
		xhttp.open("GET", "http://localhost/final_project_wt/api/students", true);
		xhttp.send();

		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && xhttp.status == 200) {
				console.log(this.responseText);
				console.log(JSON.parse(this.responseText));

				var item = JSON.parse(this.responseText);
				
				var content = '';
				for (let i = 0; i < item.length; i++) {
					content += "<tr><td>" + (i + 1) + "</td><td>" + item[i].email + "</td><td>" + item[i].name + "</td></tr>";
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
  </body>

  </html>

<?php
} else {
  header("Location: index.php");
}
?>