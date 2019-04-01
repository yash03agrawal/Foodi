<?php
 
$servername = "localhost";
$username = "root";
$password = "4956";
$dbname = "foodi";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$input_uname = $_POST['email'];
$input_pass = $_POST['password'];

$sql="select * from user";
if (!$conn->query($sql))
  {
    die('Error: ' . $conn->error);
  }

$result = $conn->query($sql);
$flag=0;
while($row = $result->fetch_array(MYSQLI_ASSOC))
{
    $uname=$row['username'];
    $pass=$row['password'];
    $t=$row['type'];

    if((strcmp($input_uname,$uname)==0) && password_verify($input_pass, $pass))
    {
        $flag=1;
       // echo "success";
        //echo $t;
        if($t==0)
        {   
                session_start();
                $_SESSION['name']='Admin';
                $_SESSION['type']=0;
                $_SESSION['u_name']=$uname;
                header("Location: admin.php");
        }
        if($t==1)
        {
                $sql2 = "select r_name from restaurant where u_name='$uname'";
                if (!$conn->query($sql2))
                {
                    die('Error: ' . $conn->error);
                }
                $r_name1 = $conn->query($sql2);
                $r_name2 = $r_name1->fetch_array(MYSQLI_ASSOC);
                session_start();
                $_SESSION['name']=$r_name2[r_name];
                $_SESSION['type']=1;
                $_SESSION['u_name']=$uname;
                header("Location: r_user.php");
        }

        if($t==2)
        {
                $sql1 = "select f_name from customer where u_name='$uname'";
                if (!$conn->query($sql1))
                {
                    die('Error: ' . $conn->error);
                }
                $c_name = $conn->query($sql1);
                $c_name1 = $c_name->fetch_array(MYSQLI_ASSOC);
                session_start();
                $_SESSION['name']= $c_name1['f_name'];
                $_SESSION['type']=2;
                $_SESSION['u_name']=$uname;
                header("Location: c_user.php");
        }
    }
//    else
//    {
//        echo 'incorrect username/ password please try again.' ;
//        header("Location: login.html");
//    }
}
if($flag==0)
{
//    $message = "Username and/or Password incorrect.\\nTry again.";
//    echo "<script type='text/javascript'>alert('$message');</script>";
//    header("Location: login.html");
//    exit();
    $message = "Username and/or Password incorrect.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script>setTimeout(\"location.href = 'login.php';\",100);</script>";
}
$conn->close();
?>