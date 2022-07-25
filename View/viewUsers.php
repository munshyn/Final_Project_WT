<html>

<head>
	<title>View All Users</title>

	<head>
		<link rel="stylesheet" href="../static/manage.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
			crossorigin="anonymous">

	<body>
		<div class="header">
			<ul>
				<li>View All Users</li>
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
			<div class="row justify-content-center">
				<a href="index.html" style="padding-right: 5px;"><button type="" class="btn btn-secondary">Back</button></a>
				<a href="updateUsers.html"><button type="" class="btn btn-primary">Update</button></a>
			  </div>
		</div>
		</div>
		
	</body>

</html>

<script>
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
</script>