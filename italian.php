<!doctype html>
<html>
    <head>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        
        <meta charset="utf-8">
         <meta name="author" content="Yash Agrawal and Shivam Kalhans">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="shortcut icon" href="icon.ico" />
        <title>
            FOODI
        </title>
<!--        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>-->
        
        <style type="text/css">
            #hungry{
                margin-top: 50px;
            }
            
            #table{
                margin-top: 50px;
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
                $servername = "localhost";
                $username = "root";
                $password = "4956";
                $dbname = "foodi";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                    
                $sql = "SELECT * FROM restaurant";
                if (!$conn->query($sql))
                {
                    die('Error: ' . $conn->error);
                }
                $result = $conn->query($sql);
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $field1name = $row['r_id'];
                        $field2name = $row['r_name'];
                       // $field3name = $row['rating']; 
                ?>
                    <div id="table" class="container text-center">

                          <table class="table">
                            <thead>
                             <tr class="thead-light">
                              <th hidden><?php echo $field1name; ?></th>     
                              <th colspan='4'><?php echo $field2name; ?>     <button type="button" class="btn btn-outline-dark"><i class="far fa-file-alt"></i> View Menu</button></th>
                             </tr>    
                             <tr  class="thead-dark">
                              <th scope="col">Item ID</th>
                              <th scope="col">Item Name</th>
                              <th scope="col">Price</th>
<!--                              <th scope="col">Quantity</th>-->
            <!--
                              <th scope="col">Rating</th>
                             <th scope="col">Check Menu</th>
            -->
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                   
                                $sql1 = "SELECT * FROM `".  $field1name ."` WHERE CUISINE_TYPE='Italian' and Availability='Available'";
                                if (!$conn->query($sql1))
                                {
                                    die('Error: ' . $conn->error);
                                }
                                $result1 = $conn->query($sql1);
                                while ($row1 = $result1->fetch_array(MYSQLI_ASSOC)) {
                                    $field11name = $row1['ITEM_ID'];
                                    $field22name = $row1['ITEM_NAME'];
                                    $field33name = $row1['PRICE']; 

                                    echo '<tr> 
                                              <td>'.$field11name.'</td> 
                                              <td>'.$field22name.'</td> 
                                              <td>'.$field33name.'</td>' ?>
<!--                                              <td><a class="btn btn-outline-secondary" value="" href="new1.php" role="button"><div>Go &raquo</div></a></td>-->
                                            <?php  echo '</tr>';
                                }
                            ?>     
                        </tbody>
                    </table>
                   </div>
        <?php } 
            $conn->close();
        ?>
        
        <script type="text/javascript">
            
            function handler(num){
                console.log(num);
                 window.location.href = "menu.php?id=" + num;   
            }
            
            var anchors = document.querySelectorAll(".btn");
            for (var i=0; i<anchors.length; i++) 
                anchors[i].setAttribute("value",i+1);
            for (var i=0; i<anchors.length; i++) {
               anchors[i].addEventListener("click", function() {
                   var sending=this.parentNode.parentNode.childNodes[1].innerHTML;
                   handler(sending);
                });
            }
        
        </script>
        
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