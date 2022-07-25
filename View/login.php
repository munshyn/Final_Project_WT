<?
session_start();

if (isset($_SESSION['userId']))
    header("Location: index.php");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../static/main.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <title>Login</title>
</head>

<body class="mt-4">
    <!-- navigation bar -->
    <nav class="nav-bar d-flex justify-content-between align-items-end">
        <a class="navbar-brand" href="index.html
        -">ParkerPanzu</a>
        <ul class="nav-item d-flex align-items-end">
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php" class="ms-4">About</a></li>
            <li><a href="index.php" class="ms-4">How it work</a></li>
            <li><a href="index.php" class="ms-4">Company</a></li>
        </ul>
        <div class="nav-login btn btn-primary"><a href="login.php">Login</a></div>
    </nav>
    <div class="login-bg"></div>
    <div class="login">
        <div class="middle">
            <div class="container login-container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="mb-4">Welcome to <br>ParkerPanzu</h2>
                        <p>If you don't have account<br>please contact the administrator</p>
                    </div>
                    <div class="col-md-4">
                        <form class="login-form">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    // var navbar = document.querySelector('.nav-bar');
    // var navLogin = document.querySelector('.nav-login');
    // var navLoginA = document.querySelector('.nav-login a');
    // var navLoginA_ = navLoginA.cloneNode(true);
    // navLogin.appendChild(navLoginA_);
    // navLogin.removeChild(navLoginA);
    // navLogin.addEventListener('click', function() {
    //     navbar.classList.toggle('nav-active');
    // });
    $(".login-form").submit(function(event) {
        event.preventDefault();
        var formData = JSON.stringify($(this).serializeArray()
            .reduce(function(json, {
                name,
                value
            }) {
                json[name] = value;
                return json;
            }, {}));
        console.log(formData);
        $.ajax({
            type: "POST",
            url: "http://localhost/final_project_wt/api/login",
            data: formData,
            dataType: "json",
            success: function(data, status, xhr) {
                console.log(data);
                if (xhr.status == 200) {
                    window.location.href = "index.php";
                } else {
                    alert("Login failed");
                }
            },
            error: function(xhr, resp, text) {
                console.log(xhr, resp, text);
            },
        });
    });
</script>

</html>