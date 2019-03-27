<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
         <meta name="author" content="Yash Agrawal and Shivam Kalhans">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="shortcut icon" href="icon.ico" />
        <title>
            FOODI
        </title>
        
        <style>
         #table{
                margin-top: 80px;
            }
                
            body{
                    background-color: #f5f5f5;
                }    
        </style>
        
    <?php 
    $o_id = $_GET['id'];
    session_start();
    
    $_SESSION['o_id'] = $o_id;    
        
    if(empty($_SESSION['name']))
    {
        header("Location:login.html");
    }
    else if($_SESSION['type']==1)
    {
 ?>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="r_user.php"><i class="fas fa-hamburger"></i> FOODI</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

              <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mr-auto">
<!--                    <li class="nav-item"><a class="nav-link" href="#Contact">Contact</a></li>-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-phone"></i> Contact
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#"><i class="fas fa-mobile-alt"></i> 97556-39825</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto nav-right">
                  <li class="nav-item dropdown">    
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-user"></i> <?php
                            echo $_SESSION["name"] ;
                        ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                      <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
        </nav>
   
         <?php
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
        
                $sql1 = "SELECT u_name,o_status FROM c_order where o_id = '$o_id' ";
                if(!$conn->query($sql1))
                {
                    die('Error: ' . $conn->error);
                }
                $result1 = $conn->query($sql1);
                $row1 = $result1->fetch_array(MYSQLI_ASSOC);
                $c_uname = $row1['u_name'];
                $o_status = $row1['o_status'];
        
               

                if($o_status=="Delivered" || $o_status=="Order Denied")
                    $disabled = 'disabled';
                else
                    $disabled = '';

                
                
                $sql2 = "SELECT * FROM customer cu, address a,city ci,country co where cu.u_name=a.u_name and a.u_name=ci.u_name and ci.u_name=co.u_name and co.u_name='{$c_uname}' ";
                if(!$conn->query($sql1))
                {
                    die('Error: ' . $conn->error);
                }
                $result2 = $conn->query($sql2);
                $row2 = $result2->fetch_array(MYSQLI_ASSOC);
                $c_fname = $row2['f_name'];
                $c_lname = $row2['l_name'];
                $email = $row2['u_name'];
                $contact = $row2['contact'];
                $address1 = $row2['address'];
                $address2 = $row2['city'];
                $address3 = $row2['country'];
        ?>
        
                
       <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                    <header class="card-header">
                        <h4 class="card-title mt-2">Customer Details</h4>
                    </header>
                    <article class="card-body">
                    <form id="customer_details" method="post" action="change_status.php">
                        <div class="form-row">
                            <div class="col form-group">
                                <label for="C_Name">Customer Name</label>
                                <input type="text" class="form-control" 
                                    value="<?php echo $c_fname; echo' '; echo  $c_lname ?>" disabled>
                            </div> <!-- form-group end.// -->
                            <div class="col form-group">
                                <label for="Email">Email </label>   
                                <input type="text" class="form-control" value="<?php echo $email ?>" disabled>
                            </div> <!-- form-group end.// -->
                        </div>
                        <div class="form-row">
                            <div class="col form-group">
                                <label for="address">Address</label>   
                                <input type="text" class="form-control" value="<?php echo $address1; echo', '; echo $address2; echo ', '; echo $address3; ?>" disabled>
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="Contact">Contact</label>
                              <input type="text" class="form-control" value="<?php echo $contact ?>" disabled>
                            </div> <!-- form-group end.// -->
                            <div class="form-group col-md-6">
                              <label>Order Status</label>
                              <select id="o_status" class="form-control" name="o_status" <?php echo $disabled; ?>>
                                  <option value="Processing" <?php echo ($o_status == 'Processing')?'selected':''; ?> >Processing</option>
                                  <option value="Order Denied" <?php echo ($o_status == 'Order Denied')?'selected':''; ?> >Order Denied</option>
                                  <option value="Order Confirmed" <?php echo ($o_status == 'Order Confirmed')?'selected':''; ?>>Order Confirmed</option>
                                  <option value="Preparing" <?php echo ($o_status == 'Preparing')?'selected':''; ?>>Preparing</option>
                                  <option value="On The Way" <?php echo ($o_status == 'On The Way')?'selected':''; ?>>On The Way</option>
                                  <option value="Delivered" <?php echo ($o_status == 'Delivered')?'selected':''; ?>>Delivered</option>
                              </select>
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->
                        
                        <div class="form-group">
                            <button type="submit" id="confirm" class="btn btn-primary btn-block" <?php echo $disabled; ?> > Confirm Change Status </button>
                        </div> <!-- form-group// -->                                           
                    </form>
                    </article> <!-- card-body end .// -->
                    </div> <!-- card.// -->
                </div> <!-- col.//-->
            </div> <!-- row.//-->
        </div>
        
        <div id="table" class="container text-center">
            <table class="table">
              <thead class="thead-dark">
                <tr class="thead-light">
                        <th colspan='5'>Order Id-<?php echo $o_id; ?></th>
                 </tr>    
                <tr>
                  <th scope="col">Item Id</th>    
                  <th scope="col">Item Name</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Price</th>
                  <th scope="col">Sub Total</th>    
                </tr>
              </thead>
                
              <tbody>
                  <?php
                
                    $sql = "SELECT * FROM c_order_details inner join c_order where c_order.o_id = $o_id and c_order_details.o_id=c_order.o_id ";
                
                    if (!$conn->query($sql))
                    {
                        die('Error: ' . $conn->error);
                    }
                    $result = $conn->query($sql);
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $r_id = $row['r_id'];
                
                    $sql1 = "SELECT * FROM c_order_details co, c_order c,`{$r_id}` x where co.o_id=c.o_id and co.item_id=x.item_id and co.o_id=$o_id";
                    if (!$conn->query($sql1))
                    {
                        die('Error: ' . $conn->error);
                    }
                    $result1 = $conn->query($sql1);
                    $total = 0;
                    while ($row1 = $result1->fetch_array(MYSQLI_ASSOC)) {
                        $field1name = $row1['item_id'];
                        $field2name = $row1['ITEM_NAME'];
                        $field3name = $row1['quantity'];
                        $field4name = $row1['PRICE'];
                        $field5name = $field3name * $field4name;
                        $total += $field5name;
                        echo '<tr> 
                                
                                  <td>'.$field1name.'</td> 
                                  <td>'.$field2name.'</td> 
                                  <td>'.$field3name.'</td>
                                  <td>'.$field4name.'</td>
                                  <td>'.$field5name.'</td>
                            </tr>' ;
                        }
                        
                     echo ' <tr class="table-dark">
                                <td colspan="4">Grand Total</td>
                                <td>'.$total.'</td>
                            </tr>';
                        
                   
                    //$result->free();
                    $conn->close();
                ?>     
              </tbody>
            </table>
        </div>
        
        
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body><?php }
	else
	{
		header("Location:access_deny.html");
	}
	?>
</html>