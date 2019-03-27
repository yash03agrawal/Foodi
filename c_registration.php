<?php
$servername = "localhost";
$username = "root";
$password = "4956";
$dbname = "foodi";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql1="INSERT INTO user(type,username,password) VALUES(2,'$_POST[email]','$_POST[password]')";

$sql2="INSERT INTO customer VALUES ('$_POST[email]','$_POST[fname]','$_POST[lname]','$_POST[contact]','$_POST[gender]')";

$sql3="INSERT INTO address VALUES('$_POST[email]','$_POST[address]')";

$sql4="INSERT INTO city VALUES('$_POST[email]','$_POST[city]')";

$sql5="INSERT INTO country VALUES('$_POST[email]','$_POST[country]')";

if (!$conn->query($sql1)||!$conn->query($sql2)||!$conn->query($sql3)
    ||!$conn->query($sql4)||!$conn->query($sql5))
  {
  die('Error: ' . $conn->error);
  }
else
{
	header("Location: creg_success.html");
}
$conn->close();
?>