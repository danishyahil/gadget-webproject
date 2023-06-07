<?php require_once("inc/navlogin.html"); ?>

<!DOCTYPE html>
<html>
<style>

</style>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="css/reg.css">
</head>
<body>

    <div class="myform">
        <h2>Member Registration</h2>
        <form class="login" action="saveRegistration.php" method="post">
            <div class="input">
                <label for="username">Username : </label>
                <input type="text" name=custUser required>
            </div> <br>
            <div class="input">
                <label for="password">Password : </label>
                <input type="text" name=custPassword required>
            </div><br>
            <div class="input">
                <label for="name">Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label>
                <input type="text" name=custName required>
            </div><br>
            <div class="input">
                <label for="address">Address &nbsp&nbsp: </label>
                <input type="text" name=custAdd required>
            </div><br>
            <div class="input">
                <label for="email">Email &nbsp&nbsp&nbsp&nbsp&nbsp:</label>
                <input type="text" name=custEmail required>
            </div><br>
            <div class="input">
                <label for="contact">Phone No. &nbsp&nbsp:</label>
                <input type="text" name=custPhone required>
            </div><br>
            <div class="submit">
                <input type="submit" value="Register" >
            </div>
            
        </form>

    </div>
</body>
<?php require_once("inc/footer.html"); ?>
</html>