<html>

<head>
    <title>Add Users</title>

    <head>
        <link rel="stylesheet" href="../static/manage.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            crossorigin="anonymous">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>

    <body>
        <div class="header">
            <ul>
                <li>Add User</li>
                <li style="float:right"><a href="" class="btn">LOGOUT</a></li>
                <li style="float:right"><a href="" class="btn">home</a></li>
            </ul>
        </div>

        <div class="container">
            <form id="form">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="">Level:</label>
                    <select class="form-control" id="level" name="level" required>
                        <option selected="selected" disabled="true" display="none">Please choose</option >  
                      <option value="1">Student</option>
                      <option value="2">Manager</option>
                    </select>
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="index.html" class="btn btn-danger">Cancel</a>
            </form>

        </div>
        </div>

    </body>

</html>

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
                    window.location.href= 'index.html';
                } else {
                    alert(data.message);
                    window.location.href= 'index.html';
                }
            },
        });
        });
</script>