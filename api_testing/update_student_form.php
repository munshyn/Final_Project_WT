
<html>
<head>

 <script type="text/javascript" src="/Project/validation.js">
 </script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>


<title>Updating Student Data</title><head>
<link rel="stylesheet" href="/Project/style-main.css">
<body>
	<div class="container-main">
	<div class="header">
    	<ul>
			<li><a href="../Start/main.php" class="btn">home</a></li>
			<li style="float:right"><a href="../Start/logout.php" class="btn">LOGOUT</a></li>
		</ul>
	</div>
	<div class="middle-form"></div>
  	<div class="footer"></div><!-- footer here -->

	<div id="form-title">
		<p id="p2">Update Student Data Form</p>
	</div>

	<div id="form-content">	
	<p id="p1">Please fill in the following information:</p>
	<form name="form1" id="form1">
	<table class="form">
		<tr>
			<td class="form-text"> User ID</td>
			<td><b id="id" value="<?php $_GET['id']; ?>"></b></td>
		<tr>
			<td class="form-text">Username</td>
			<td><input name="username" class="form-box" type="text" id="username"value="<?php echo $rows['username']; ?>"></td>
		<tr>		
			<td class="form-text">Password</td>
			<td><input name="password" class="form-box" type="text" id="password" value="<?php echo $rows['password']; ?>"></td>
		<tr>	
			<td class="form-text">Name</td>
			<td><input name="name" class="form-box" type="text" id="name" value="<?php echo $rows['name']; ?>"></td>
		</tr>
	</table>
	<br><br>
	<input type="submit" name="Submit" value="Update" class="btn">
	</form>
<script>

	$(document).ready(function (event) {
        
		$.get("http://localhost/final_project_wt/api/students", function (data, status) {
		let content = "";
		for (let i = 0; i < data.data.length; i++) {
			content += "<li>" + data.data[i].id + "</li>";
		}
		$('#pengguna').html(content);

	});
});
	</script>
</body>
</html>

