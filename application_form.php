<?php
// session_start(); 

// if (isset($_SESSION["userId"])) {
// header("Location: index.php");

// if ($_SESSION["level"] == 3) { 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make a bid</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container w-75 py-5">
        <h1>Apply for College</h1>
        <form id="form-apply">

            <div class="mb-3" id="user-info">
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender" checked>
                <label class="form-check-label" for="male">
                    Male
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender">
                <label class="form-check-label" for="female">
                    Female
                </label>
            </div>
            <select class="form-select" id="college-selection" aria-label="college list">

            </select>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="roomType" id="roomType" checked>
                <label class="form-check-label" for="single">
                    Single
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="roomType" id="roomType">
                <label class="form-check-label" for="double">
                    Double
                </label>
            </div>
            <input type="submit" class="btn btn-success" value="Apply College"></input>
            <input type="reset" class="btn btn-success" value="Reset Form"></input>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            $.get('http://localhost/final_project_wt/api/users/'+<?php $_SESSION['userId']; ?>, function (data, status) {
                let content = '';
                content += '<input type="text" class="form-control" id="userId" name="userId" value="' + data.user.userId + '" hidden disabled>';
                content += '<label for="email" class="form-label">Email:</label>';
                content += '<input type="email" class="form-control" id="email" name="email" value="' + data.user.email + '">';

                $('#user-info').html(content);
            });
            $.get('http://localhost/final_project_wt/api/colleges', function (data, status) {
                let content = '';
                content += '<option selected>Select College</option>';
                for (let i = 0; i < data.college.length; i++) {
                    content += '<option value="' + data.college[i].collegeName + '">' + data.college[i].collegeName + '</option>';
                }

                $('#college-selection').html(content);
            });
        });

        $("#form-apply").submit(function (event) {
            event.preventDefault();

            var formData = $(this).serialize();
            console.log(formData);

            $.ajax({
                type: "post",
                url: "http://localhost/final_project_wt/api/collegeapp",
                data: formData,
                dataType: "json",

                success: function (data, status, xhr) {
                    if (data.status == 'success') {
                        alert(data.message);
                        window.location.href = 'view_colleges.php';
                    } else {
                        alert(data.message);
                        window.location.href = 'view_colleges.php';
                    }
                },
            });
        });
    </script>
</body>

</html>

<?php } } ?>