<?php require_once("inc/navadm.html"); ?>
<html>
<head>
  <title>TechStudio Gadgets 2021</title>
  <link rel="stylesheet" href="pstyle.css">
  <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
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
  
  //escape special characters in a string
  $custName = mysqli_real_escape_string($conn, $_POST['custName']);

  //create and execute query
  $sql = "SELECT * FROM customer WHERE custName= '$custName'";
  $result = $conn->query($sql);

  //check if records were returned
  if ($result->num_rows > 0) {

     //create a table to display the record
     echo 'Selected record as the following: <br><br>';
     echo '<p><table cellpadding=10 cellspacing=0 border=1 align="center">';
     echo '<tr><td align="center"><b>No</b></td>
     <td align="center"><b>Customer User</b></td>
     <td align="center"><b>Customer Password</b></td>
     <td align="center"><b>Customer Name</b></td>
     <td align="center"><b>Customer Address</b></td>
     <td align="center"><b>Customer Email</b></td>
     <td align="center"><b>Customer Phone No.</b></td>
     </tr>';
     
     // output data of each row
     while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td align="center">'.$row["custID"].'</td>';
        echo '<td align="center">'.$row["custUser"].'</td>';
        echo '<td align="center">'.$row["custPassword"].'</td>';
        echo '<td align="center">'.$row["custName"].'</td>';
        echo '<td align="center">'.$row["custAddress"].'</td>';
        echo '<td align="center">'.$row["custEmail"].'</td>';
        echo '<td align="center">'.$row["custPhone"].'</td>';
        echo '</tr>';
     }
     echo '</table></p>';
  } 
  else {
    echo '<font color=red>No record found';
  }

  //close connection 
  $conn->close();
  echo '<button><a href="adminmanage.php">Back</button><br><br>';

?>

</body><?php
  require_once("inc/footer.html");
?></html>