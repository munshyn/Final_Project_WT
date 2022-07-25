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
                <ul class="nav-item d-flex align-items-end">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="app_form.php" class="ms-4">Apply College</a></li>
                    <li><a href="#viewapp" class="ms-4">Application Status</a></li>
                    <li><a href="view_colleges.php" class="ms-4">Colleges</a></li>
                </ul>
                <div class="nav-login btn btn-primary"><a href="logout.php">Logout</a></div>
            </nav>
            <!-- main content -->
            <div class="container w-50">
                <div class="mb-5 d-flex justify-content-center">
                    <h1>Application Status</h1>
                </div>
                <table class="table table-bordered border-dark table-hover">
                    <thead></thead>
                    <tbody id="the-body">
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
                $.get('http://localhost/final_project_wt/api/collegeapps/' + <?php echo $_SESSION['userId']; ?>, function(data, status) {

                    let content = '';
                    content += "<tr><th class='table-bordered border-dark table-primary' scope='row'>Email</th><td>" + data.collegeapp[0].email + "</td></tr>";
                    content += "<tr><th class='table-bordered border-dark table-primary' scope='row'>Gender</th><td>" + data.collegeapp[0].gender + "</td></tr>";
                    content += "<tr><th class='table-bordered border-dark table-primary' scope='row'>College Name</th><td>" + data.collegeapp[0].collegeName + "</td></tr>";
                    content += "<tr><th class='table-bordered border-dark table-primary' scope='row'>Room Type</th><td>" + data.collegeapp[0].roomType + "</td></tr>";
                    content += "<tr><th class='table-bordered border-dark table-primary' scope='row'>Status</th><td>" + data.collegeapp[0].appStatus + "</td></tr>";
                    $('#the-body').html(content);
                });
            });
        </script>
    </body>

    </html>

<?php
} else {
    header("Location: index.php");
}
?>