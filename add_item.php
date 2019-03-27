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
        
       
       <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                    <header class="card-header">
                        <h4 class="card-title mt-2">Add Item</h4>
                    </header>
                    <article class="card-body">
                    <form id="edit_item" method="post" action="add_item_db.php"> <!--data-toggle="validator" role="form"-->
                        <div class="form-row">
                            <div class="col form-group">
                                <label for="item_id">Item Id</label>   
                                <input type="text" class="form-control" name="item_id" id="item_id" placeholder="XY001" required>
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                        <div class="form-row">
                            <div class="col form-group">
                                <label for="item_name">Item Name</label>
                                <input type="text" class="form-control" name="item_name" id="item_name" 
                                     maxlength = 30 placeholder="Pizza" required>
                            </div> <!-- form-group end.// -->
                            <div class="col form-group">
                                <label for="price">Price </label>   
                                <input type="text" class="form-control" name="price" id="price" pattern="[0-9]{1,}" title="Please Enter valid Price" placeholder="100" required >
                            </div> <!-- form-group end.// -->
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="cuisine_type">Cuisine Type</label>
                              <input type="text" class="form-control" name="cuisine_type" placeholder="Italian" required>
                            </div> <!-- form-group end.// -->
                            <div class="form-group col-md-6">
                              <label>Availability</label>
                              <select id="availability" class="form-control" name="availability" required>
                                  <option value="Available" selected="">Available</option>
                                  <option value="Unavailable">Unavailable</option>
                              </select>
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->
                        
                        <div class="form-group">
                            <button type="submit" id="confirm" class="btn btn-primary btn-block"> Confirm Add Item  </button>
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