<?php
session_start();

if (isset($_SESSION["userId"])) {
    if ($_SESSION["level"] != 3) {
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
                    <a class="navbar-brand" href="profile.php"><?php echo $_SESSION["name"] ?></a>

                    <!-- to change the nav depending on the user level -->
                    <?php
                    if ($_SESSION["level"] == 1) {
                    ?>
                        <ul class="nav-item d-flex align-items-end">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="viewUsers.php" class="ms-4">Users</a></li>
                            <li><a href="#" class="ms-4">Application</a></li>
                            <li><a href="view_colleges.php" class="ms-4">College</a></li>
                        </ul>
                    <?php
                    } else {
                    ?>
                        <ul class="nav-item d-flex align-items-end">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="viewStudents.php" class="ms-4">Students</a></li>
                            <li><a href="#" class="ms-4">Manage Application</a></li>
                            <li><a href="view_colleges.php" class="ms-4">College</a></li>
                        </ul>
                    <?php
                    }
                    ?>
                    <div class="nav-login btn btn-primary"><a href="logout.php">Logout</a></div>
                </nav>
                <!-- main content -->
                <div class="container w-75">
                    <div class="mb-5 d-flex justify-content-start">
                        <h1>List of Applications</h1>
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

                    let level = <?php echo $_SESSION['level'] ?>;
                    $.get('http://localhost/final_project_wt/api/collegeapps', function(data, status) {
                        
                        console.log(data)
                        let content = '';
                        if (data.collegeapp.length == 0) {
                            content += '<h3>No Record Found</h3>';
                            $('#no-record').html(content);
                        } else {
                            if(level == 2){
                                let headcontent = '<tr><th scope="col">No.</th><th scope="col">Email</th><th scope="col">Gender</th><th scope="col">College Name</th><th scope="col">Room Type</th><th scope="col">Status</th><th scope="col"></th></tr>';
                                for (let i = 0; i < data.collegeapp.length; i++) {
                                    content += "<tr><th scope='row'>" + (i + 1) + "</th><td>" + data.collegeapp[i].email + "</td><td>" + data.collegeapp[i].gender + "</td><td>" + data.collegeapp[i].collegeName + "</td><td>" + data.collegeapp[i].roomType + "</td><td>" + data.collegeapp[i].appStatus + "</td>";
                                    if(data.collegeapp[i].appStatus == 'PENDING'){
                                        content += "<td><button type='button' class='btn btn-success mx-3' onclick='approveFunction(" + data.collegeapp[i].appId + ")'>Approve</button><button type='button' class='btn btn-danger' onclick='rejectFunction(" + data.collegeapp[i].appId + ")'>Reject</button></td></tr>";
                                    } else {
                                        content += "<td></td></tr>";
                                    }
                                }
                                $('#the-head').html(headcontent);
                                $('#the-body').html(content);
                            } else {
                                let headcontent = '<tr><th scope="col">No.</th><th scope="col">Email</th><th scope="col">Gender</th><th scope="col">College Name</th><th scope="col">Room Type</th><th scope="col">Status</th></tr>';
                                for (let i = 0; i < data.collegeapp.length; i++) {
                                    content += "<tr><th scope='row'>" + (i + 1) + "</th><td>" + data.collegeapp[i].email + "</td><td>" + data.collegeapp[i].gender + "</td><td>" + data.collegeapp[i].collegeName + "</td><td>" + data.collegeapp[i].roomType + "</td><td>" + data.collegeapp[i].appStatus + "</td></tr>";
                                }
                                $('#the-head').html(headcontent);
                                $('#the-body').html(content);
                            }
                        }
                    });
                });

                function approveFunction(appId) {
                    let formData = {appStatus:'APPROVED'};
                    $.ajax({
                        type: "put",
                        url: "http://localhost/final_project_wt/api/collegeapps/" + appId,
                        data: formData,

                        success: function(data, status, xhr) {
                            if (data.status == 'success') {
                                alert('Approved Successfully');
                                window.location.href = 'manage_apps.php';
                            } else {
                                alert(data.message);
                                window.location.href = 'index.php';
                            }
                        },
                    });
                };

                function rejectFunction(appId) {
                    let formData = {appStatus:'REJECTED'};
                    $.ajax({
                        type: "put",
                        url: "http://localhost/final_project_wt/api/collegeapps/" + appId,
                        data: formData,
                        
                        success: function(data, status, xhr) {
                            if (data.status == 'success') {
                                alert('Rejected Successfully');
                                window.location.href = 'manage_apps.php';
                            } else {
                                alert(data.message);
                                window.location.href = 'index.php';
                            }
                        },
                    });
                };
                </script>
            </body>
            
            </html>

            <?php
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}
?>