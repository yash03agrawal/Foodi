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
        
            $item_id = $_GET['id'];
            $_SESSION['item_id'] = $item_id;
        
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
        
            $sql1 = "SELECT * FROM `{$r_id}` where ITEM_ID = '$item_id' ";
            if(!$conn->query($sql1))
            {
                die('Error: ' . $conn->error);
            }
            $result1 = $conn->query($sql1);
            $row1 = $result1->fetch_array(MYSQLI_ASSOC);
            $field1name = $row1['ITEM_ID'];
            $field2name = $row1['ITEM_NAME'];
            $field3name = $row1['PRICE']; 
            $field4name = $row1['CUISINE_TYPE'];
            $field5name = $row1['Availability'];
        ?>
       
       <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                    <header class="card-header">
                        <h4 class="card-title mt-2">Edit Item</h4>
                    </header>
                    <article class="card-body">
                    <form id="edit_item" method="post" action="update_item.php"> <!--data-toggle="validator" role="form"-->
                        <div class="form-row">
                            <div class="col form-group">
                                <label for="item_id">Item Id</label>   
                                <input type="text" class="form-control" name="item_id" id="item_id" placeholder="<?php echo $field1name ?>" disabled>
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                        <div class="form-row">
                            <div class="col form-group">
                                <label for="item_name">Item Name</label>
                                <input type="text" class="form-control" name="item_name" id="item_name" 
                                    value="<?php echo $field2name ?>" maxlength = 30 >
                            </div> <!-- form-group end.// -->
                            <div class="col form-group">
                                <label for="price">Price </label>   
                                <input type="text" class="form-control" name="price" id="price" pattern="[0-9]{1,}" title="Please Enter valid Price" value="<?php echo $field3name ?>" >
                            </div> <!-- form-group end.// -->
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="cuisine_type">Cuisine Type</label>
                              <input type="text" class="form-control" name="cuisine_type" value="<?php echo $field4name ?>">
                            </div> <!-- form-group end.// -->
                            <div class="form-group col-md-6">
                              <label>Availability</label>
                              <select id="availability" class="form-control" name="availability">
                                  <option value="Available" <?php echo ($field5name == 'Available')?'selected':''; ?>>Available</option>
                                  <option value="Unavailable" <?php echo ($field5name == 'Unavailable')?'selected':''; ?> >Unavailable</option>
                              </select>
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->
                        
                        <div class="form-group">
                            <button type="submit" id="confirm" class="btn btn-primary btn-block"> Confirm Changes  </button>
                        </div> <!-- form-group// -->                                           
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