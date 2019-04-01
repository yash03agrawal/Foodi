<?php
	session_start();
	 if(empty($_SESSION['name']))
    {
?>
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
        
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><i class="fas fa-hamburger"></i> FOODI</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

              <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="login.php">Restaurants</a></li>
                    <li class="nav-item"><a class="nav-link" href="#About">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#Contact">Contact</a></li>
                </ul>
                <ul class="navbar-nav ml-auto nav-right">
                    <li class="nav-item"><a class="nav-link" href="signup.php"><i class="fas fa-user-plus"></i> Signup</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php"><i class="fas fa-user"></i> Login</a></li>
                </ul>
              </div>
            </div>
        </nav>
        
        <div id="carouselControls" class="carousel slide" data-ride="carousel">
          <div class="container">
            <div class="carousel-inner">
                <div class="carousel-item active">
                      <img src="images/Burger.jpg" class="d-block w-100" alt="food">
                </div>
                <div class="carousel-item">
                      <img src="images/Pasta.jpg" class="d-block w-100" alt="food">
                </div>
                <div class="carousel-item">
                      <img src="images/Pizza.jpg" class="d-block w-100" alt="food"s>
                </div>
            </div>
          </div>    
          <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="container marketing">
            <div class="row">
              <div class="col-lg-4">
                  <img src="images/chinese.jpg" class="rounded-circle" width="140" height="140">
                  <h2>Chinese</h2>
                  <p>Chinese cuisine is an important part of Chinese culture, which includes cuisine originating from the diverse regions of China, as well as from Chinese people in other parts of the world. </p>
                  <p><a class="btn btn-outline-secondary" href="login.php" role="button">Try it &raquo;</a></p>
              </div><!-- /.col-lg-4 -->
              
              <div class="col-lg-4">
                <img src="images/italian.jpg" class="rounded-circle" width="140" height="140">
                <h2>Italian</h2>
                <p>Italian cuisine is food typical of Italy. It has developed through centuries of social and economic changes, with roots stretching to antiquity. Italian cuisine is generally characterized by its simplicity.</p>
                <p><a class="btn btn-outline-secondary" href="login.php" role="button">Try it &raquo;</a></p>
              </div><!-- /.col-lg-4 -->
              
              <div class="col-lg-4">
                <img src="images/south_indian.jpeg" class="rounded-circle" width="140" height="140">
                <h2>South Indian</h2>
                <p>South Indian cuisine includes the cuisines of the five southern states of India—Andhra Pradesh, Karnataka, Kerala, Tamil Nadu and Telangana—and the union territories of Lakshadweep and AN Islands.</p>
                <p><a class="btn btn-outline-secondary" href="login.php" role="button">Try it &raquo;</a></p>
              </div><!-- /.col-lg-4 -->
            </div>
        
            <hr class="featurette-divider">

            <div class="row featurette">
              <div class="col-md-7">
                <h2 class="featurette-heading">Try Our Best Restaurants. <span class="text-muted">It’ll blow your mind.</span></h2>
                <p class="lead">Get food at your doorstep from Bangalore's top rated Restaurants.</p>
                <p><a class="btn btn-outline-secondary" href="#" role="button">Try it &raquo;</a></p>  
              </div>
              <div class="col-md-5">
                <img src="images/restaurant.jpg" class="rounded float-left" width="450" height="350">
              </div>
            </div>
            
            <hr class="featurette-divider">

            <div class="row featurette" id="About">
              <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">FOODI - It's that Good. <span class="text-muted">See for yourself.</span></h2>
                <p class="lead">This is our DBMS Project. We tried to make a food delivery website that will satisfy your hunger!</p>
              </div>
              <div class="col-md-5 order-md-1">
                <img src="images/hungry.gif" class="rounded float-left" width="450" height="350">
              </div>
            </div>
            <hr class="featurette-divider">
        </div>
        
        <!-- Footer -->
        <footer class="page-footer font-small special-color-dark" id="Contact">

            <!-- Footer Elements -->
            <div class="container">
              <p class="text-center pt-2">
                <i class="fas fa-phone mr-3"></i> +91 97556-39825</p>
              <!-- Social buttons -->
              <ul class="list-unstyled list-inline text-center">
                <li class="list-inline-item">
                  <a class="btn-floating btn-fb mx-1">
                    <i class="fab fa-facebook-f"> </i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-floating btn-tw mx-1">
                    <i class="fab fa-twitter"> </i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-floating btn-gplus mx-1">
                    <i class="fab fa-google-plus-g"> </i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-floating btn-li mx-1">
                    <i class="fab fa-linkedin-in"> </i>
                  </a>
                </li>
              </ul>
              <!-- Social buttons -->

            </div>
            <!-- Footer Elements -->

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2019 Copyright:
              <a href="#"> FOODI.com</a>
            </div>
            <!-- Copyright -->

          </footer>
          <!-- Footer -->
        
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
	<?php }
	else if($_SESSION['type']==0)
		header("Location:admin.php");
	else if($_SESSION['type']==1)
		header("Location:r_user.php");
	else if($_SESSION['type']==2)
		header("Location:c_user.php");
	else
	{
		header("Location:access_deny.html");
	}
	?>
</html>