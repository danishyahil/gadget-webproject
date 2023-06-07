<?php require_once("inc/navlogin.html"); ?>

<html>
<head>
<title>TechStudio Registration</title>
<link rel="stylesheet" href="pstyle.css">
</head>
<body>

  <?php
     
     $date = date("d-m-Y");

     //get input values from form
     extract($_POST);
 
  ?>
  <p>Date: <b><?php print($date) ?></b></p>
  <h3>Tech Studio Registration</h3>
  <table>
     <tr><td>Customer Username</td>
        <td>:</td>
        <td><b><?php print($custUser) ?></b></td>
     </tr>
    <tr><td>Customer Name</td>
        <td>:</td>
        <td><b><?php print($custName) ?></b></td>
    </tr>
    <tr><td>Customer Address</td>
        <td>:</td>
        <td><b><?php print($custAdd) ?></b></td>
    </tr>
    <tr><td>Customer Email</td>
        <td>:</td>
        <td><b><?php print($custEmail) ?></b></td>
    </tr>
    <tr><td>Customer Phone No.</td>
        <td>:</td>
        <td><b><?php print($custPhone) ?></b></td>
    </tr>

  </table>

  <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "project2";
         
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
     
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error); }

      //create query
      $sql = "INSERT INTO customer (custUser, custPassword, custName, custAddress, custEmail, custPhone) VALUES ('$custUser', '$custPassword', '$custName', '$custAdd', '$custEmail', '$custPhone')";

      //execute query
      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } 
      else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

      //close connection
      $conn->close();
  ?> 

  <br>

  <form action= "findex.php" >
     <input type="button" name="printButton" onClick="window.print()" value="Print">
     <input type="submit" value="Back">
  </form>

  

</body>
</html>

