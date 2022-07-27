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
        <title>Add New Student Form</title>
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
                        <h2>Add New</h2>
                        <h2>Manager</h2>
                    </div>
                    <div class="col">
                        <div class="container app-form">
                            <form id="form">
                                <div class="row justify-content-evenly my-5">
                                    <div class="col">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    
                                </div>
                                <div class="row justify-content-evenly my-5">
                                    <div class="col">
                                    <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="col">
                                    <label for="password" class="form-label">password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                   
                                    <div class="mb-3 d-flex justify-content-end">
                                        <input type="text" id="level" name="level" value="2" hidden>
                                        <input type="submit" class="btn btn-submit m-2" value="Submit"></input>
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
            $("#form").submit(function (event) {
            event.preventDefault();

            var formData = $(this).serialize();
            console.log(formData);

            $.ajax({
            type: "post",
            url: "http://localhost/final_project_wt/api/users",
            data: formData,
            dataType: "json",

            success: function (data, status, xhr) {
                if (data.status == 'success') {
                    alert(data.message);
                    window.location.href= 'index.php';
                } else {
                    alert(data.message);
                    window.location.href= 'index.php';
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