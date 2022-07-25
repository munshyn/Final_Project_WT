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
        <title>Application Form</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../static/main.css">
    </head>

    <body class="mt-4">
        <div class="flex-wrapper">
            <!-- navigation bar -->
            <nav class="nav-bar d-flex justify-content-between align-items-end">
                <a class="navbar-brand" href="profile.php"><?php echo $_SESSION["name"]; ?></a>
                <ul class="nav-item d-flex align-items-end">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#" class="ms-4">Apply College</a></li>
                    <li><a href="view_app.php" class="ms-4">Application Status</a></li>
                    <li><a href="view_colleges.php" class="ms-4">Colleges</a></li>
                </ul>
                <div class="nav-login btn btn-primary"><a href="logout.php">Logout</a></div>
            </nav>
            <div class="container w-50">
                <div class="row">
                    <div class="col-3 app-title">
                        <h2>Apply for</h2>
                        <h2>College</h2>
                    </div>
                    <div class="col">
                        <div class="container app-form">
                            <form id="form-apply">
                                <div class="row justify-content-evenly my-5">
                                    <div class="col">
                                        <input type="number" id="userId" name="userId" value="<?php echo $_SESSION['userId']; ?>" hidden>
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['email']; ?>">
                                    </div>
                                    <div class="col-5">
                                        <label for="gender" class="form-label">Gender</label>
                                        <div class="mb-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input gender" type="radio" name="gender" id="gender" value="Male" checked>
                                                <label class="form-check-label" for="male">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input gender" type="radio" name="gender" id="gender" value="Female">
                                                <label class="form-check-label" for="female">
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-evenly my-5">
                                    <div class="col">
                                        <label for="collegeName" class="form-label">College</label>
                                        <div class="mb-3">
                                            <select class="form-select" id="collegeName" name="collegeName" aria-label="college list">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <label for="roomType" class="form-label">Room Type</label>
                                        <div class="mb-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="roomType" id="roomType" value="Single" checked>
                                                <label class="form-check-label" for="single">
                                                    Single
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="roomType" id="roomType" value="Double">
                                                <label class="form-check-label" for="double">
                                                    Double
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 d-flex justify-content-end">
                                        <input type="submit" class="btn btn-submit m-2" value="Apply College"></input>
                                    </div>
                                </div>
                            </form>
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
        <script>
            $(document).ready(function() {

                $.get('http://localhost/final_project_wt/api/colleges', function(data, status) {
                    let content = '';
                    content += '<option selected>Select College</option>';
                    for (let i = 0; i < data.college.length; i++) {
                        content += '<option value="' + data.college[i].collegeName + '">' + data.college[i].collegeName + '</option>';
                    }

                    $('#collegeName').html(content);
                });
            });

            $("#form-apply").submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();
                console.log(formData)

                $.ajax({
                    type: "post",
                    url: "http://localhost/final_project_wt/api/collegeapps",
                    data: formData,
                    dataType: "json",

                    success: function(data, status, xhr) {
                        if (data.status == 'success') {
                            alert('Applied Successfully');
                            window.location.href = 'index.php';
                        } else {
                            alert(data.message);
                            window.location.href = 'index.php';
                        }
                    },
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