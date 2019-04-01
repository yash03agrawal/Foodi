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
			
			#rating{
				margin-top: 20px;
			}
           
        </style>
		
		
		
 <?php 
	$o_id = $_GET['id'];
    session_start();
    if(empty($_SESSION['name']))
    {
        header("Location:login.php");
    }
    else if($_SESSION['type']==0)
    {
 ?>
		
		<script type="text/javascript">
			
			function relocate1(){
				var b = document.getElementById("c");
				var num =  b.getAttribute("value");
				window.location.href = "view_customer_details.php?id=" + num;
			}
			
			function relocate2(){
				var b = document.getElementById("r");
				var num =  b.getAttribute("value");
				window.location.href = "view_restaurant_details.php?id=" + num;
			}
			
           
        </script>
		
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
		
		<?php
					$servername = "localhost";
					$username = "root";
					$password = "4956";
					$dbname = "foodi";

					$conn = new mysqli($servername, $username, $password, $dbname);
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}
					
                    $sql = "SELECT * FROM c_order where o_id = '$o_id' ";
                
                    if (!$conn->query($sql))
                    {
                        die('Error: ' . $conn->error);
                    }
                    $result = $conn->query($sql);
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $r_id = $row['r_id'];
					$u_name = $row['u_name'];
                	
					$sql2 = "SELECT f_name,l_name FROM customer where u_name = '$u_name' ";
                
                    if (!$conn->query($sql2))
                    {
                        die('Error: ' . $conn->error);
                    }
                    $result2 = $conn->query($sql2);
                    $row2 = $result2->fetch_array(MYSQLI_ASSOC);
                    $f_name = $row2['f_name'];
					$l_name = $row2['l_name'];
					
					$sql3 = "SELECT r_name FROM restaurant where r_id = $r_id";
                
                    if (!$conn->query($sql3))
                    {
                        die('Error: ' . $conn->error);
                    }
                    $result3 = $conn->query($sql3);
                    $row3 = $result3->fetch_array(MYSQLI_ASSOC);
                    $r_name = $row3['r_name'];
		?>
		
		<div class="button container text-center">
			<p hidden><?php echo $u_name; ?></p>
			<h5 style="margin-top:50px;"><i class="fas fa-user"></i> Customer Name:  <?php echo $f_name.' '.$l_name;?> </h5><button type="button" id="c" value="<?php echo $u_name; ?>" class="btn btn-outline-dark" onclick="relocate1()">View Details</button>
			<h5 style="margin-top:20px;"><i class="fas fa-store-alt"></i> Restaurant Name:  <?php echo $r_name;?>  </h5><button type="button" id="r" class="btn btn-outline-dark" value="<?php echo $r_id; ?>" onclick="relocate2()">View Details</button>
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
						$o_rating = $row1['o_rating'];
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
		
		<div class="container text-center">
			<h5>Payment Mode: Cash <i class="fas fa-money-bill-wave"></i></h5>
		</div>
		
		<div id="rating" class="container text-center">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="card">
                    <header class="card-header">
                        <h4 class="card-title mt-2">Rated</h4>
                    </header>
                    <article class="card-body">
					<form id="rating">
					<div class="form-group">
                
                    <select id="rating" class="form-control" name="rating" disabled>
						<option value="0" <?php echo ($o_rating == 0)?'selected':''; ?> >Not Rated Yet</option>
                        <option value="1" <?php echo ($o_rating == 1)?'selected':''; ?> >1</option>
                        <option value="2"  <?php echo ($o_rating == 2)?'selected':''; ?>>2</option>
                        <option value="3"  <?php echo ($o_rating == 3)?'selected':''; ?>>3</option>
                        <option value="4"  <?php echo ($o_rating == 4)?'selected':''; ?>>4</option>
                        <option value="5"  <?php echo ($o_rating == 5)?'selected':''; ?>>5</option>
                    </select>
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
		
         </body><?php }
	else
	{
		header("Location:access_deny.html");
	}
	?>
</html>