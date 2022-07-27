<?php
session_start();
if (!(isset($_SESSION['userId'])))
    header("Location: index.php");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <link rel="stylesheet" href="../static/main.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Profile</title>
</head>

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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="viewUsers.php" class="ms-4">Users</a></li>
                        <li><a href="manage_apps.php" class="ms-4">Application</a></li>
                        <li><a href="view_colleges.php" class="ms-4">College</a></li>
                    </ul>
                <?php
                } else if ($_SESSION["level"] == 2) {
                ?>
                    <ul class="nav-item d-flex align-items-end">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="viewStudents.php" class="ms-4">Students</a></li>
                        <li><a href="manage_apps.php" class="ms-4">Manage Application</a></li>
                        <li><a href="view_colleges.php" class="ms-4">College</a></li>
                    </ul>
                <?php
                } else if ($_SESSION["level"] == 3) {
                ?>
                    <ul class="nav-item d-flex align-items-end">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="app_form.php" class="ms-4">Apply College</a></li>
                        <li><a href="view_app.php" class="ms-4">Application Status</a></li>
                        <li><a href="view_colleges.php" class="ms-4">Colleges</a></li>
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
        <div class="container-md">
            <h1>Personal details information</h1>
            <table class="table-patient table mt-5">
                <tbody class="table-body">
                    <!-- to be insert by script -->
                </tbody>
            </table>
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
    <script>
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "http://localhost/final_project_wt/api/users/" + <?php echo $_SESSION['userId']; ?>,
                dataType: "json",
                success: function(data, status, xhr) {
                    // var obj = JSON.parse(data);
                    console.log(data);
                    var html = "";
                    if (xhr.status == 200) {
                        console.log(data);
                        html += "<tr>";
                        html += "<th scope='col'>ID</th>";
                        html += "<td scope='row'>" + data.userId + "</td>";
                        html += "</tr><tr>";
                        html += "<th scope='col'>Name</th>";
                        html += "<td>" + data.name + "</td>";
                        html += "</tr><tr>";
                        html += "<th scope='col'>Email</th>";
                        html += "<td>" + data.email + "</td>";
                        html += "</tr><tr>";
                        html += "<th scope='col'>Password</th>";
                        html += "<td>" + data.password + "</td>";
                        html += "</tr><tr>";
                        html += "<th scope='col'>Level</th>";
                        html += "<td>" + data.level + "</td>";
                        html += "</tr>";
                    } else {
                        html += "<tr>";
                        html += "<td scope='row'>No data</td>";
                        html += "</tr>";
                    }
                    $(".table-body").html(html);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                },
            });
        });
    </script>
</body>

</html>