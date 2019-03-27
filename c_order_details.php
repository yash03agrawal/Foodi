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
        
         <style type="text/css">
            #hungry{
                margin-top: 50px;
            }
            
            #table{
                margin-top: 50px;
            }
             
             #submit_order{
                 margin-top: 20px;
             } 
        </style>
        
        <?php 
            
            $o_id = $_GET['id'];
            
            //echo $_SESSION['rating_oid'];
            //echo $o_id;
            session_start();
            
            if(empty($_SESSION['name']))
            {
                header("Location:login.html");
            }
            else if($_SESSION['type']==2)
            {
                $_SESSION['rating_oid'] = $o_id;
        ?>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="c_user.php"><i class="fas fa-hamburger"></i> FOODI</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

              <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="restaurant.php">Restaurants</a></li>
                </ul>
                <ul class="navbar-nav ml-auto nav-right">
                  <li class="nav-item dropdown">    
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-user"></i> <?php
                            echo $_SESSION["name"] ;
                        ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="c_order.php"><i class="fas fa-shopping-cart"></i> My Orders</a>
<!--
                      <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Profile</a>
                      <div class="dropdown-divider"></div>
-->
                      <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
        </nav>
        
                       
        <div id="hungry" class="container text-center">
            <img src="images/hungry_head.png" class="rounded" alt="hungry-head" height="100" width="100">
            <img src="images/hungry.png" clas="rounded" alt="hungry" height="75" width="300">
            <h3>Try Our Best Restaurants!</h3>
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
                    $servername = "localhost";
                    $username = "root";
                    $password = "4956";
                    $dbname = "foodi";

                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                
                    $sql = "SELECT * FROM c_order_details inner join c_order where c_order.o_id = $o_id and c_order_details.o_id=c_order.o_id ";
                
                    if (!$conn->query($sql))
                    {
                        die('Error: ' . $conn->error);
                    }
                    $result = $conn->query($sql);
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $r_id = $row['r_id'];
                    $_SESSION['rating_rid'] = $r_id;
                    $o_status = $row['o_status'];
                    $o_rating = $row['o_rating'];
                   
                    if($o_status!="Delivered" && $o_status!="Order Denied")
                        $hidden='hidden';
                    else
                        $hidden='';
                
                    if($o_rating>0)
                        $disabled='disabled';
                    else
                        $disabled='';
                
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
        
        <div class="container text-center" <?php echo $hidden; ?>>
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="card">
                    <header class="card-header">
                        <h4 class="card-title mt-2">Give Rating</h4>
                    </header>
                    <article class="card-body">
            <form id="rating" method="post" action="rating.php">
            <div class="form-group">
                
                    <select id="rating" class="form-control" name="rating"<?php echo $disabled; ?>>
                        <option value="1" <?php echo ($o_rating == 1)?'selected':''; ?> >1</option>
                        <option value="2"  <?php echo ($o_rating == 2)?'selected':''; ?>>2</option>
                        <option value="3"  <?php echo ($o_rating == 3)?'selected':''; ?>>3</option>
                        <option value="4"  <?php echo ($o_rating == 4)?'selected':''; ?>>4</option>
                        <option value="5"  <?php echo ($o_rating == 5)?'selected':''; ?>>5</option>
                    </select>
            </div>
            <div class="form-group">
               <button type="submit" id="rating" class="btn btn-primary btn-block" <?php echo $disabled; ?> > Rate </button>
            </div>
        </form>
     </article> <!-- card-body end .// -->
    </div> <!-- card.// -->
    </div> <!-- col.//-->
    </div> <!-- row.//-->
    </div>
        
        
        
         <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
    <?php }
		else
	{
		header("Location:access_deny.html");
	}
	
	?>
</html>
        