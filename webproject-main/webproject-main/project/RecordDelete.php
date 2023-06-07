<?php require_once("inc/navadm.html"); ?>
<html>
<head>
  <title>TechStudio Gadgets 2021</title>
  <link rel="stylesheet" href="pstyle.css">
</head>
<body>

<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "project2";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 

  //get input value
  $custID=$_REQUEST['custID'];

  // sql to delete a record
  $sql = "DELETE FROM customer  WHERE custID='".$custID."'";
 
  
  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } 
  else {
    echo "Error deleting record: " . $conn->error;
  }

  //close connection  
  $conn->close();
  echo '<button><a href="customerList.php">Back</button><br><br>';
?>
</body><?php
  require_once("inc/footer.html");
?></html>