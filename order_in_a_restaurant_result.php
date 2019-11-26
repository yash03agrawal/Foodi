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
            
            #table{
                margin-top: 50px;
            }
           
        </style>
		
 <?php 
		
    session_start();
    if(empty($_SESSION['name']))
    {
        header("Location:login.php");
    }
    else if($_SESSION['type']==0)
    {
 ?>
		
	 </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="admin.php"><i class="fas fa-hamburger"></i> FOODI</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

              <div class="collapse navbar-collapse" id="navbarContent">
                
                <ul class="navbar-nav ml-auto nav-right">
                  <li class="nav-item dropdown">    
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-user-cog"></i> <?php
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
		
		 <div class="container text-center">
            <div id="table">    
            <table class="table">
              <thead>
                  <tr class="thead-light">
					  <th colspan='6'> Restaurant: <?php echo $_GET['restaurant']; ?> </th>
                 </tr>  
				  <tr class="thead-light">
					<th colspan='6'>All Orders on: <?php echo $_GET['search']; ?></th>
				  </tr>	  
                  <tr class="thead-dark">
                      <th scope="col">Order Id</th>
                      <th scope="col">Customer  Name</th>
                      <th scope="col">Restaurant Name</th>
                      <th scope="col">Date-Time of Order</th>
                      <th scope="col">Order Status</th>
                      <th scope="col">View Details</th>
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
					
                    $sql = "SELECT * FROM c_order where r_id='$_GET[restaurant]' and date(o_date_time)='$_GET[search]' order by o_date_time DESC";
                    if (!$conn->query($sql))
                    {
                        die('Error: ' . $conn->error);
                    }
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $field1name = $row['o_id'];
                        $field2name = $row['u_name'];
                        $field3name = $row['r_id'];
					    $field4name = $row['o_date_time'];
                        $field5name = $row['o_status'];
                        $sql1 = "SELECT f_name,l_name from customer where u_name='$field2name' ";
                        if (!$conn->query($sql1))
                        {
                            die('Error: ' . $conn->error);
                        }
                        $result1 = $conn->query($sql1);
                        $row1 = $result1->fetch_array(MYSQLI_ASSOC);
                        $f_name = $row1['f_name'];
                        $l_name = $row1['l_name'];
                        
						
						$sql2 = "SELECT r_name from restaurant where r_id='$field3name' ";
                        if (!$conn->query($sql2))
                        {
                            die('Error: ' . $conn->error);
                        }
                        $result2 = $conn->query($sql2);
                        $row2 = $result2->fetch_array(MYSQLI_ASSOC);
                        $r_name = $row2['r_name'];
                        echo '<tr> 
                                
                                  <td>'.$field1name.'</td> 
                                  <td>'.$f_name.' '.$l_name.'</td> 
                                  <td>'.$r_name.'</td>
                                  <td>'.$field4name.'</td>
                                  <td>'.$field5name.'</td>
                                  <td><button type="button" class="btn btn-outline-dark">Details &raquo</button></td> </tr>';                  
                            }
                    //$result->free();
                    $conn->close();
                ?>     
              </tbody>
            </table>
          </div>
        </div>    
        
        <script type="text/javascript">
            
            function handler(num){
                //console.log(num);
                window.location.href = "order_on_a_date_result2.php?id=" + num;
                
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