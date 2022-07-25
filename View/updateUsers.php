<html>

<head>
	<title>Update Users</title>

	<head>
		<link rel="stylesheet" href="../static/manage.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
			crossorigin="anonymous">
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>

	<body>
		<div class="header">
			<ul>
				<li>Update Users</li>
				<li style="float:right"><a href="" class="btn">LOGOUT</a></li>
				<li style="float:right"><a href="" class="btn">home</a></li>
			</ul>
		</div>

		<div class="container">
			<table class="table table-striped">
				<thead style="background-color: #B0DDE4;">
					<tr>
						<th scope="col">No</th>
						<th scope="col">Email</th>
						<th scope="col">Name</th>
						<th scope="col">Level</th>
					</tr>
				</thead>
				<tbody>
					<tr>
				<tbody id="item"></tbody>
				</tr>
				</tbody>
			</table>
			<br>
			<div class=" justify-content-center">
				<label for="">Enter email</label><br>
               <input id="search" type="text"> <button id="search_btn" class="btn btn-primary">Search</button>
               <a href="viewUsers.html"><button class="btn btn-danger">Cancel</button></a>
			  </div>
              <br>
              <form id="form" style="display: none;">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                </div>
				<div class="form-group">
					<label for="password">password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="password" required>
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
                <button type="button" name="delete" id="delete" class="btn btn-danger">Delete</button>
              </form>
		</div>

        

		</div>
		
	</body>

</html>

<script>
    var _id;
	document.addEventListener("DOMContentLoaded", function () {
		event.preventDefault();

		//step 1
		var xhttp = new XMLHttpRequest();
		//step 2
		xhttp.open("GET", "http://localhost/final_project_wt/api/users", true);
		//step 3
		xhttp.send();
		//step 4 - do the process upon receiving the response with status 200
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && xhttp.status == 200) {
				//alert(this.responseText);
				console.log(this.responseText);
				console.log(JSON.parse(this.responseText));
				//display the users in table
				var item = JSON.parse(this.responseText);
				
				var content = '';
				for (let i = 0; i < item.length; i++) {
					content += "<tr><td>" + (i + 1) + "</td><td>" + item[i].email + "</td><td>" + item[i].name + "</td><td>" + item[i].level + "</td></tr>";
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

    document.getElementById('search_btn').addEventListener('click', function () {
		event.preventDefault();

        var xhttp = new XMLHttpRequest();
        var email = document.getElementById('search').value;
        xhttp.open("GET", "http://localhost/final_project_wt/api/users", true);
        xhttp.send();
        xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && xhttp.status == 200) {
				console.log(this.responseText);
				console.log(JSON.parse(this.responseText));
				var item = JSON.parse(this.responseText);
				const form = document.getElementById('form');
				
				for (let i = 0; i < item.length; i++) {
					if (item[i].email==email) {
                        form.style.display = 'block';
                        return setId(item[i].userId);
                    }
				}
                alert("email not found");
			}
			// when step 4, with status == 404
			else if (this.readyState == 4 && xhttp.status == 404) {
				alert(this.status + ' </br> resource not found');
			}
		};
		
	});

   function setId(id) {
    _id = id;
   }


   $("#form").submit(function (event) {
            event.preventDefault();

            var formData = $(this).serialize();
            console.log(formData);

            $.ajax({
                type: "put",
                url: "http://localhost/final_project_wt/api/users/" + _id,
                data: formData,
                dataType: "json",

                success: function (data, status, xhr) {
                    console.log(xhr.status)
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

		document.getElementById('delete').addEventListener('click',function (event) {
            event.preventDefault();
			
            $.ajax({
                type: "delete",
                url: "http://localhost/final_project_wt/api/users/" + _id,

                success: function (data, status) {
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