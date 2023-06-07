<?php require_once("inc/navadm.html"); ?>
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

$custID=$_REQUEST['custID'];
$query = "SELECT * from customer where custID='".$custID."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="pstyle.css">
</head>
<body>
<div class="form">
<h1>Update Record</h1>

<div>
<form name="form" method="post" action="RecordUpdate.php"> 
<input type="hidden" name="new" value="1" />
<input name="custID" type="hidden" value="<?php echo $row["custID"];?>" />
<p><input type="text" name="custUser" value="<?php echo $row["custUser"];?>" /></p><br>
<p><input type="text" name="custPassword" value="<?php echo $row["custPassword"];?>" /></p><br>
<p><input type="text" name="custName" value="<?php echo $row["custName"];?>" /></p><br>
<p><input type="text" name="custAddress" value="<?php echo $row["custAddress"];?>" /></p><br>
<p><input type="text" name="custEmail" value="<?php echo $row["custEmail"];?>" /></p><br>
<p><input type="text" name="custPhone" value="<?php echo $row["custPhone"];?>" /></p><br>
<p><input name="submit" type="submit" value="Update" /></p>
</form>

</div>
</div>
</body><?php
  require_once("inc/footer.html");
?></html>