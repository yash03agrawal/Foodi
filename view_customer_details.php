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
		$u_name = $_GET['id'];
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
        			
			
				$sql2 = "SELECT * FROM customer cu, address a,city ci,country co where cu.u_name=a.u_name and a.u_name=ci.u_name and ci.u_name=co.u_name and co.u_name='$u_name' ";
                if(!$conn->query($sql2))
                {
                    die('Error: ' . $conn->error);
                }
                $result2 = $conn->query($sql2);
                $row2 = $result2->fetch_array(MYSQLI_ASSOC);
                $c_fname = $row2['f_name'];
                $c_lname = $row2['l_name'];
                $email = $row2['u_name'];
				$gender = $row2['gender'];
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
                    <form>
                        <div class="form-row">
                            <div class="col form-group">
                                <label for="C_Name">Customer Name</label>
                                <input type="text" class="form-control" 
                                    value="<?php echo $c_fname; echo' '; echo  $c_lname ?>" disabled>
                            </div> <!-- form-group end.// -->
                            <div class="col form-group">
                                <label>Gender</label>
                                <input type="text" class="form-control" 
                                    value="<?php echo $gender;?>" disabled>
                            </div> <!-- form-group end.// -->
                        </div>
						<div class="form-row">
							 <div class="col form-group">
                                <label for="Email">Email </label>   
                                <input type="text" class="form-control" value="<?php echo $email ?>" disabled>
                            </div> <!-- form-group end.// -->
                            <div class="form-group col-md-6">
                              <label for="Contact">Contact</label>
                              <input type="text" class="form-control" value="<?php echo $contact ?>" disabled>
                            </div> <!-- form-group end.// -->
                            
                        </div> <!-- form-row.// -->
                                                           
                        <div class="form-row">
                            <div class="col form-group">
                                <label for="address">Address</label>   
                                <input type="text" class="form-control" value="<?php echo $address1; echo', '; echo $address2; echo ', '; echo $address3; ?>" disabled>
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                        
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