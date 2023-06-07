<?php require_once("inc/navadm.html"); ?>
<html>
<head>
  <title>Customer List</title>
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

  <h3 align="center">TechStudio Customer List </h3>

  <form action="RecordDisplay.php" method="post">

     Customer Name: <input name="custName" type="text" size="30"><br><br>
     <input type="submit" name="Submit" value="Search"><br><br>

  </form>

<?php
  include 'db_con.php';
  $sql = "SELECT * FROM customer";
  $result = $conn->query($sql);

  //check if records were returned
  if ($result->num_rows > 0) {

     //create a table to display the record
     echo '<table cellpadding=10 cellspacing=1 border=1 align="center">';
     echo '<tr><td align="center"><b>No</b></td>
     <td align="center"><b>Customer User</b></td>
     <td align="center"><b>Customer Password</b></td>
     <td align="center"><b>Customer Name</b></td>
     <td align="center"><b>Customer Address</b></td>
     <td align="center"><b>Customer Email</b></td>
     <td align="center"><b>Customer Phone No.</b></td></tr>';
     
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
        echo '<td><a href="RecordDelete.php?custID='.$row["custID"].'">DELETE</a></td>';
        echo '<td><a href="RecordEdit.php?custID='.$row["custID"].'">UPDATE</a></td>';
        echo '</tr>';

        
     }
  } 
  else {
    echo "0 results";  //if no record found in the database
  }

  //close connection 
  $conn->close();
  echo '<button><a href="adminmanage.php">Back</button><br><br>';
?>

</body><?php
require_once("inc/footer.html");
?></html>