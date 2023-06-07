<?php 

session_start();

// Code to connect to database
include 'db_con.php';
 
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];

$sql = "SELECT custUser, custPassword FROM customer WHERE custUser='$username' and custPassword='$password'";
$result2 = $conn->query($sql);

$row=mysqli_fetch_array($result2);

// Mysql_num_row is counting table row
if ($result2->num_rows > 0) 
{
    $_SESSION['id']=$row['id'];
    $_SESSION['username']=$row['username'];

    header("location:index.php");
} 

$sql2 = "SELECT username, password FROM admins WHERE username='$username' and password='$password'";
$result = $conn->query($sql2);

$row=mysqli_fetch_array($result);

// Mysql_num_row is counting table row
if ($result->num_rows > 0) 
{
    $_SESSION['id']=$row['id'];
    $_SESSION['username']=$row['username'];

    header("location:admin.php");
}

$conn->close();
?>