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

    $sql_check = "SELECT ITEM_NAME FROM `{$r_id}` WHERE ITEM_ID='$_POST[item_id]'";
    if(!$conn->query($sql_check))
    {
        die('Error: '. $conn->error);
    }
        $result_check = $conn->query($sql_check);
        $row_result = $result_check->fetch_array(MYSQLI_ASSOC);
        $item_name = $row_result['ITEM_NAME'];

        if($item_name!="")
        {
            $message = "Item Id already exists as $item_name.\\nTry again.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo "<script>setTimeout(\"location.href = 'add_item.php';\",100);</script>";
        }

    else
    {
        $sql_check2 = "SELECT ITEM_ID FROM `{$r_id}` WHERE ITEM_NAME='$_POST[item_name]'";
        if(!$conn->query($sql_check2))
        {
            die('Error: '. $conn->error);
        }
        $result_check2 = $conn->query($sql_check2);
        $row_result2 = $result_check2->fetch_array(MYSQLI_ASSOC);
        $item_id2 = $row_result2['ITEM_ID'];

        if($item_id2!="")
        {
            $message2 = "Item Name already exists as $item_id2.\\nTry again.";
            echo "<script type='text/javascript'>alert('$message2');</script>";
            echo "<script>setTimeout(\"location.href = 'add_item.php';\",100);</script>";
        }

        else
        {
            $sql1 = "INSERT INTO `{$r_id}` VALUES('$_POST[item_id]','$_POST[item_name]','$_POST[price]','$_POST[cuisine_type]','$_POST[availability]')";

            if (!$conn->query($sql1))
              {
              die('Error: ' . $conn->error);
              }
            else
            {
                header("Location: add_success.html");
            }
        }
    }
    $conn->close();
}
else
{
     header("Location:access_deny.html");
}
?>