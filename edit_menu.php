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
                margin-top: 25px;
            }
       
            #add_item{
                margin-top: 50px;
            }    
        </style>
        
        <script type="text/javascript">
            
            function relocate(){
                location.href = "add_item.php";
            }
            
        </script>
        
 <?php 
    session_start();
    if(empty($_SESSION['name']))
    {
        header("Location:login.php");
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
        ?>
        
        
        
        <div class="container text-center">
            
            <button id="add_item" type="button" class="btn-dark float-center" onclick="relocate()"><i class="fas fa-plus"></i> Add Item</button>
           
            <div id="table">    
            <table class="table">
              <thead>
                  <tr class="thead-light">
                        <th colspan='6'><?php echo $_SESSION["name"]; ?></th>
                 </tr>    
                <tr class="thead-dark">
                  <th scope="col">Item ID</th>
                  <th scope="col">Item Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Cuisine Type</th>
                  <th scope="col">Availability</th>
                  <th scope="col">Edit Item</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $sql1 = "SELECT * FROM `{$r_id}` ";
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
                        $field5name = $row1['Availability'];
                        
                        echo '<tr> 
                                  <td>'.$field1name.'</td> 
                                  <td>'.$field2name.'</td> 
                                  <td>'.$field3name.'</td>
                                  <td>'.$field4name.'</td>
                                  <td>'.$field5name.'</td>
                                  <td><button type="button" class="btn btn-outline-dark"><i class="fas fa-pencil-alt"></i> Edit</button></td>
                             </tr>';
                    }
                  //  $result->free();
                    $conn->close();
                ?>     
              </tbody>
            </table>
           </div>
        </div>
        
        <script type="text/javascript">
            
            function handler(num){
                console.log(num);
                 window.location.href = "edit_item.php?id=" + num;   
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