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
                body{
                    background-color: #f5f5f5;
                }
        </style>
 <?php 
		$r_id = $_GET['id'];
		//echo $user_type;
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
		<?php
				$servername = "localhost";
                $username = "root";
                $password = "4956";
                $dbname = "foodi";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
        			
			
				$sql1 = "SELECT * FROM restaurant where r_id = '$r_id' ";
                    if (!$conn->query($sql1))
                    {
                        die('Error: ' . $conn->error);
                    }
                    $result1 = $conn->query($sql1);
                    $row1 = $result1->fetch_array(MYSQLI_ASSOC);
						//$field1name = $row1['r_id'];
                        $field2name = $row1['r_name'];
                        $field3name = $row1['u_name'];
                        $field4name = $row1['contact'];
						$field5name = $row1['address'];
						$field6name = $row1['rating'];
						$field7name = $row1['no_of_rating'];
					
		?>
		
		<div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                    <header class="card-header">
                        <h4 class="card-title mt-2">Restaurant Id- <?php echo $r_id; ?></h4>
                    </header>
                    <article class="card-body">
                    <form id="user_details"> <!--data-toggle="validator" role="form"-->
                        <div class="form-row">
                            <div class="col form-group">
                                <label>Restaurant Name</label>   
                                <input type="text" class="form-control" value="<?php echo $field2name; ?>" disabled>
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                        <div class="form-row">
                           <div class="col form-group">
                                <label>Email-id</label>   
                                <input type="text" class="form-control" value="<?php echo $field3name; ?>" disabled>
                            </div> <!-- form-group end.// -->
							<div class="col form-group">
                                <label>Contact</label>   
                                <input type="text" class="form-control" value="<?php echo $field4name; ?>" disabled>
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-group end.// -->
                        <div class="form-row">
                            <div class="col form-group">
                                <label>Address</label>   
                                <input type="text" class="form-control" value="<?php echo $field5name; ?>" disabled>
                            </div> <!-- form-group end.// -->
                        </div>
                        <div class="form-row">
                            <div class="col form-group">
                                <label>Rating</label>   
                                <input type="text" class="form-control" value="<?php echo $field6name; ?>" disabled>
                            </div> <!-- form-group end.// -->
							<div class="col form-group">
                                <label>No of Ratings</label>   
                                <input type="text" class="form-control" value="<?php echo $field7name; ?>" disabled>
                            </div> <!-- form-group end.// -->
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