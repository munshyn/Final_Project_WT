<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="../styles.css">
</head>

<body>
<h2>Welcome to<br>PankerZu</h2>

<body>
<div id="box">
  <div class="avatar-container">
    <img src="../image/user.png" alt="Avatar" class="avatar">
  </div>
    <form method="POST" action="check_login.php">
      <!-- <b>Username</b> -->
      <input type="text" class="input-box" name="username" required=true placeholder="Username">

      <!-- <b>Password</b>  -->
      <input type="password" class="input-box" name="password" required=true placeholder="Password">
   
      <input type="submit" value="Login" />
    </form>
 </div>
</body>
</html>