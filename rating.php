<?php

session_start();
if($_SESSION['type']==2)
{
	$servername = "localhost";
	$username = "root";
	$password = "4956";
	$dbname = "foodi";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$rating = $_POST['rating'];


	$sql = "SELECT no_of_rating,rating from restaurant where r_id='{$_SESSION['rating_rid']}' ";
	if (!$conn->query($sql))
	{
		die('Error: ' . $conn->error);
	}
	$result = $conn->query($sql);
	$row = $result->fetch_array(MYSQLI_ASSOC);
	$n = $row['no_of_rating'];
	$old_rating = $row['rating'];

	$new_rating = (($old_rating*$n)+$rating)/($n+1);

	$n = $n+1;

	$sql2 = "UPDATE restaurant SET rating='$new_rating', no_of_rating='$n' where  r_id='{$_SESSION['rating_rid']}' ";

	$sql3 = "UPDATE c_order SET o_rating=$rating where o_id='{$_SESSION['rating_oid']}' ";

	if (!$conn->query($sql2)||!$conn->query($sql3))
	{
		die('Error: ' . $conn->error);
	}
	else
	{
			header("Location: c_order.php");
	}


	$conn->close();
}
else
	{
		header("Location:access_deny.html");
	}
?>