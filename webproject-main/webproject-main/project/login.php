<?php require_once("inc/navlogin.html"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

<form action="loginAuto.php" method="post" style="border:1px solid #ccc">
  <div class="container">
    <h1>Log In</h1>
    <hr>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <div class="clearfix">
      <button type="submit" class="signupbtn">Log In</button>
    </div>
    <div class="reg">
      <p><a href="registration.php">New Register Here</a></p>
    </div>
  </div>
</form>

</body>
<?php require_once("inc/footer.html"); ?>
</html>