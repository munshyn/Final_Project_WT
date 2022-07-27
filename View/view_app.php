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
        <title>Applications Status</title>
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
                    <li><a href="#viewapp" class="ms-4">Applications Status</a></li>
                    <li><a href="view_colleges.php" class="ms-4">Colleges</a></li>
                </ul>
                <div class="nav-login btn btn-primary"><a href="logout.php">Logout</a></div>
            </nav>
            <!-- main content -->
            <div class="container w-50">
                <div class="mb-5 d-flex justify-content-center">
                    <h1>Applications Status</h1>
                </div>
                <div class="mb-3 d-flex justify-content-center" id="no-record">
                </div>
                <table class="table table-bordered border-dark table-hover">
                    <thead class="table-primary table-bordered border-dark" id="the-head">
                    </thead>
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
                    if (data.collegeapp.length == 0) {
                        content += '<h3>No Record Found</h3>';
                        $('#no-record').html(content);
                    } else {
                        let headcontent = '<tr><th scope="col">No.</th><th scope="col">College Name</th><th scope="col">Room Type</th><th scope="col">Status</th><th scope="col"></th></tr>';
                        for (let i = 0; i < data.collegeapp.length; i++) {
                            content += "<tr><th scope='row'>" + (i + 1) + "</th><td>" + data.collegeapp[i].collegeName + "</td><td>" + data.collegeapp[i].roomType + "</td><td>" + data.collegeapp[i].appStatus + "</td><td><button type='button' id='cancel-app' class='btn btn-danger' onclick='cancelFunction(" + data.collegeapp[i].appId + ")'>Cancel</button></td></tr>";
                        }
                        $('#the-head').html(headcontent);
                        $('#the-body').html(content);
                    }
                });
            });

            function cancelFunction(appId) {
                $.ajax({
                    type: "delete",
                    url: "http://localhost/final_project_wt/api/collegeapps/" + appId,

                    success: function(data, status, xhr) {
                        if (data.status == 'success') {
                            alert('Cancelled Successfully');
                            window.location.href = 'view_app.php';
                        } else {
                            alert(data.message);
                            window.location.href = 'view_app.php';
                        }
                    },
                });
            }
        </script>
    </body>

    </html>

<?php
} else {
    header("Location: index.php");
}
?>