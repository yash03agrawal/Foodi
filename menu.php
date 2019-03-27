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
            session_start();
            if(empty($_SESSION['name']))
            {
                header("Location:login.html");
            }
            else if($_SESSION['type']==2)
            {
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
         
        <?php
                $rest_id = $_GET['id'];
                $_SESSION['rest_id'] = $rest_id;
                
                $servername = "localhost";
                $username = "root";
                $password = "4956";
                $dbname = "foodi";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT r_name FROM restaurant where r_id = '$rest_id' ";
                if (!$conn->query($sql))
                {
                    die('Error: ' . $conn->error);
                }
                $result = $conn->query($sql);
                $row = $result->fetch_array(MYSQLI_ASSOC);
                $rest_name = $row['r_name'];
        ?>
<!--
        <div id="submit_order" class="container text-center">
        <button type="button" class="btn btn-outline-dark" type="submit" form="myform"><i class="fas fa-shopping-bag"></i>  Place Order</button>
        </div>
-->
        <div id="submit_order" class="container text-center">
        <input type="submit" class="btn btn-dark" form="myform" value="Place Order"/>
        </div>
        
        <div id="table" class="container text-center">
            <table class="table">
              <thead>
                  <tr class="thead-light">
                        <th colspan='5'><?php echo $rest_name; ?></th>
                 </tr>    
                <tr class="thead-dark">
                  <th scope="col">Item ID</th>
                  <th scope="col">Item Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Cuisine Type</th>    
                  <th scope="col">Quantity</th>
                </tr>
              </thead>
                  <form id="myform" method="post" action="order_process.php">
              <tbody>
                <?php
                    $sql1 = "SELECT * FROM `{$rest_id}` where Availability='Available'";
                    if (!$conn->query($sql1))
                    {
                        die('Error: ' . $conn->error);
                    }
                    $result1 = $conn->query($sql1);
                    while ($row1 = $result1->fetch_array(MYSQLI_ASSOC)) {
                        $field1name = $row1['ITEM_ID'];
                        $field2name = $row1['ITEM_NAME'];
                        $field3name = $row1['PRICE'];
                        $field4name = $row1['CUISINE_TYPE'];
                      
                        echo '<tr> 
                                  <td>'.$field1name.'</td> 
                                  <td>'.$field2name.'</td> 
                                  <td>'.$field3name.'</td>
                                  <td>'.$field4name.'</td>'?>
                                  <td>  
                                    
                                      <div class="form-group">
                                       <div class="float-right row">
                                        <div class="col-7">
                                            <input class="form-control input-sm" type="text" name="<?php echo $field1name; ?>" placeholder="Max 9" maxlength=1 pattern="[1-9]" title="Please add correct quantity">
                                        </div>
                                          </div>
                                      </div>
                                    
                                  </td>
                    <?php  echo '</tr>';
                    }
                
                  //  $result->free();
                        
                    $conn->close();
                ?>     
              </tbody>
                  </form>
            </table>
        </div>
        
<!--
        <script type="text/javascript">
            
            
            
            var anchors = document.querySelectorAll(".form-control");
            for (var i=0; i<anchors.length; i++) 
                anchors[i].setAttribute("name",i+1);
            }
            for (var i=0; i<anchors.length; i++) 
               document.write(anchors[i].getAttribute("name"));
        
        </script>
-->
       
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