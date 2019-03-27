<?php

session_start();
if($_SESSION['type']==1)
{
	$servername = "localhost";
	$username = "root";
	$password = "4956";
	$dbname = "foodi";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "UPDATE c_order SET o_status = '$_POST[o_status]' WHERE o_id='{$_SESSION['o_id']}' ";
	if (!$conn->query($sql))
	{
		die('Error: ' . $conn->error);
	}

	else
	{
		header("Location: r_order.php");
	}
	$conn->close();
}
else
	{
		header("Location:access_deny.html");
	}
?>