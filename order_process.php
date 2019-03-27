<?php
$servername = "localhost";
$username = "root";
$password = "4956";
$dbname = "foodi";

session_start();
if($_SESSION['type']==2)
{
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$r_id = $_SESSION['rest_id'];
	$key = 0;

	$sql_check = "SELECT * FROM `{$r_id}`";
		if (!$conn->query($sql_check))
		{
			die('Error: ' . $conn->error);
		}
		$result_check = $conn->query($sql_check);
		while ($row_check = $result_check->fetch_array(MYSQLI_ASSOC)) {
			$field1 = $row_check['ITEM_ID'];
			if($_POST[$field1]!=NULL)    
			{
				$key = 1;
				break;
			}
		}
	if($key!=0)
	{
		$sql = "SELECT o_id FROM c_order where u_name='{$_SESSION['u_name']}' and r_id='{$_SESSION['rest_id']}' and o_status='Processing' ";
		if (!$conn->query($sql))
		{
			die('Error: ' . $conn->error);
		}
			$result = $conn->query($sql);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$o_id = $row['o_id'];

		if($o_id==NULL)
		{
			$sql1 = "INSERT INTO c_order(u_name,r_id,o_date_time) VALUES('".$_SESSION['u_name']."','".$_SESSION['rest_id']."',NOW())";

			if (!$conn->query($sql1))
			{
				die('Error: ' . $conn->error);
			}

			$sql2 = "SELECT o_id FROM c_order where u_name='{$_SESSION['u_name']}' and r_id='{$_SESSION['rest_id']}' and o_status='Processing' ";
			if (!$conn->query($sql2))
			{
				die('Error: ' . $conn->error);
			}
				$result2 = $conn->query($sql2);
				$row2 = $result2->fetch_array(MYSQLI_ASSOC);
				$o_id = $row2['o_id'];

			$sql3 = "SELECT * FROM `{$r_id}`";
			if (!$conn->query($sql3))
			{
				die('Error: ' . $conn->error);
			}
				$result3 = $conn->query($sql3);
				while ($row3 = $result3->fetch_array(MYSQLI_ASSOC)) {
					$field1name = $row3['ITEM_ID'];
					//echo $_POST[$field1name];

					if($_POST[$field1name]!=NULL)    
					{   $sql4 = "INSERT INTO c_order_details(o_id,item_id,quantity)       VALUES('$o_id','$field1name','$_POST[$field1name]')";
						  if (!$conn->query($sql4))
						  {
							die('Error: ' . $conn->error);
						  }
					}
				}
			header("Location: order_success.php");
		}

		else
		{
			$message = "Previous Order already in Processing.\\nTry again after some time.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			echo "<script>setTimeout(\"location.href = 'restaurant.php';\",100);</script>";
		}
	}

	else
	{
			$message = "Enter Quantity of atleast one item.\\nTry again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			echo "<script>setTimeout(\"location.href = 'restaurant.php';\",100);</script>";
	}

	$conn->close();
}
else
	{
		header("Location:access_deny.html");
	}
?>