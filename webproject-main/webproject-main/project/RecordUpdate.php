<?php require_once("inc/navadm.html"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="pstyle.css">
    
</head>
<body>
<html>


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

    extract($_POST);

    // Attempt update query execution
    $sql = "UPDATE customer SET custUser='".$custUser."', custPassword='".$custPassword."', custName='".$custName."', custAddress='".$custAddress."', custEmail='".$custEmail."', custPhone='".$custPhone."' WHERE custID='".$custID."'";

    if(mysqli_query($conn, $sql)){
        echo "Records were updated successfully.</br></br>
        <a href='customerList.php'>View Updated Record</a>";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
     
    // Close connection
    mysqli_close($conn);
    ?>