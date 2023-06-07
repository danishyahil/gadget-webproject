<?php
require_once('db_con.php');
$sql = "SELECT * FROM orders;";
$result = $conn->query($sql);
// Turn off all error reporting
//error_reporting(0);
?>
<?php require_once("inc/navadm.html"); ?>

<!DOCTYPE html>
<html>
<head>
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

<h3 align="center">TechStudio Ordered List </h3>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Address</th>
    <th>Payment</th>
    <th>Products</th>
    <th>Total</th>
  </tr>

    <?php
   
  foreach ($result as $results) {
    echo '<tr><td>' . $results['id'] . '</td>
    <td>' . $results['name'] . '</td>
    <td>' . $results['email'] . '</td>
    <td>' . $results['address'] . '</td>
    <td>' . $results['payment'] . '</td>
    <td>' . $results['products'] . '</td>
    <td>' . $results['total'] . '</td></tr>';
  }
  //close connection 
  $conn->close();
  echo '<button><a href="adminmanage.php">Back</button><br><br>';
  ?>
               

</table>

</body>
</html>
