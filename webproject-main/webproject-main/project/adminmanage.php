<?php require_once("inc/navadm.html"); ?>
<?php 
session_start();

if(empty($_SESSION['username'])):
   header('Location:login.php');
endif;
?>

<html>
<head>
  <title>Main Menu for Admin</title>
  <link rel="stylesheet" href="css/pstyle.css">
</head>

<body>

  <h2><p>Main Menu for <?php echo $_SESSION['username']?></p></h2><br><br>

  <div class="center">
    <form action="customerList.php" method="post">
  
    <p><input type="submit" value="View Recorded Customer" name="cmdView"></p><br>

    </form>

    <form action="adminordered.php" method="post">

    <p><input type="submit" value="View Ordered List" name="cmdRegister"></p>

    </form>

  </div>
  

 
</body><?php
require_once("inc/footer.html");
?></html>