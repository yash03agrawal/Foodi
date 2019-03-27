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

	$sql = "SELECT r_id FROM restaurant where u_name = '{$_SESSION['u_name']}'";
	if (!$conn->query($sql))
	{
		die('Error: ' . $conn->error);
	}
		$result = $conn->query($sql);
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$r_id = $row['r_id'];

	$sql1 = "UPDATE `{$r_id}` SET ITEM_NAME = '$_POST[item_name]', PRICE = '$_POST[price]', CUISINE_TYPE = '$_POST[cuisine_type]', Availability = '$_POST[availability]' WHERE ITEM_ID = '{$_SESSION['item_id']}'";

	if (!$conn->query($sql1))
	  {
	  die('Error: ' . $conn->error);
	  }
	else
	{
		header("Location: update_success.html");
	}
	$conn->close();
}
else
	{
		header("Location:access_deny.html");
	}
?>