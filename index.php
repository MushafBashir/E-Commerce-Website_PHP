<?php
include "connect.php";

session_start();
if(isset($_SESSION['username'])) {
    
    $user_name = $_SESSION['username'];

    $sql2 = "SELECT * FROM `cart` Where Username = '$user_name'";
$result2 = mysqli_query($con,$sql2);

$cart_num = mysqli_num_rows($result2);
}else{
    $cart_num1 = 0;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ballsport</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="own.css?v=<?php echo time(); ?>">
</head>
<body>
<!--##############################################HEADER############################################################# -->
        <nav class="navbar navbar-expand-lg qw">
            <div class="container-fluid">
                <a href="index.php" class="navbar-brand d-lg-block d-none"><img src="images/ballsport-logo-transparent.png" width="130px" height="80px"></a>
                <a href="index.php" class="navbar-brand d-block d-lg-none"><img src="images/ballsport-logo-transparent.png" width="130px" height="72px"></a>

                <ul class="nav nav-pills">
                <!-- <li class="nav-item me-2">
                        <a href="admin.php" class="nav-link active">Admin</a>
                    </li> -->

                    <?php
                   if(isset($_SESSION['username'])){
                        $user_name = $_SESSION['username'];

                        echo '<li class="nav-item me-2">
                        <a href="index.php" class="nav-link active">Hello '.$user_name.'</a>
                    </li>
                    
                    <li class="nav-item me-2">
                        <a href="logout.php" class="nav-link active">Log Out</a>
                    </li>
                    <li class="nav-item">
                        <a href="Cart.php" class="nav-link active">Cart 
                             '.$cart_num.'
                        </a>
                    </li>';
                    }else{
                        echo '<li class="nav-item me-2">
                        <a href="signup.php" class="nav-link active">Sign Up</a>
                    </li>

                    <li class="nav-item me-2">
                        <a href="signin.php" class="nav-link active">Sign In</a>
                    </li>';
                    }
                    ?> 



                    
                </ul>
            </div>
        </nav>
<!--################################################################################################################## -->


<!-- ###################################################BANNER####################################################### -->
    <div class="banner mt-1 ind">

        <div class="container pt-5">
            <div class="row pt-5">
                <div class="col-7">
                    <h1 class="text-white mt-5 mb-4">International Standard Sports Stuff</h1>
                    <h2 class="text-white mb-5">Excellent Quality</h2>

                    <div class="d-lg-flex mt-4">
                        <div class="me-2">
                            <form action="search.php" method="post">
                                <div class="search-section bg-white d-flex align-items-center">

                                    <input type="text" placeholder="What Are You Looking For?" class="ms-2 me-auto" name="search">
                                    <button type="submit" class="search-btn" name="searchBtn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                        </svg>
                                     </button>

                                </div>
                            </form>
                        </div>


                    
                        <button class="btn btn-primary ms-lg-3 ms-0 py-0"><h5>Click To Shop</h5></button>
                    
    

            </div>

                </div>

                <div class="col-5 py-5 d-none d-lg-block">
                    <img src="images/banner 1.png" width="400px" height="100%">
                </div>
            </div>
        </div>

    </div>
<!-- ############################################################################################################### -->
            
    <div class="catigories">
        <div class="container py-5">
            <div class="row">
                    <h1 class="text-center">Categories</h1>

                    <div class="decoration-line"></div>

            </div>

            <div class="row">

                <div class="col mt-5">
                    <div class="card" style="width: 18rem;">
                        <img src="images/adidas.jpeg" class="card-img-top" height="220px">
                        <div class="card-body btn btn-primary card-btn text-white">
                        <a href="football.php" class="text-white text-decoration-none"><h5>Football</h5></a>
                        </div>
                    </div>
                </div>

                <div class="col mt-5">
                    <div class="card" style="width: 18rem;">
                        <img src="images/bat1.jpeg" class="card-img-top" height="220px">
                        <div class="card-body btn btn-primary card-btn text-white">
                        <a href="bat.php" class="text-white text-decoration-none"><h5>Cricket Bat</h5></a>
                        </div>
                    </div>
                </div>

                <div class="col mt-5">
                    <div class="card" style="width: 18rem;">
                        <img src="images/basketball.webp" class="card-img-top" height="220px">
                        <div class="card-body btn btn-primary card-btn text-white">
                        <a href="basketball.php" class="text-white text-decoration-none"><h5>Basketball</h5></a>
                        </div>
                    </div>
                </div>

                <div class="col mt-5">
                    <div class="card" style="width: 18rem;">
                        <img src="images/tennis-rackets.png" class="card-img-top" height="220px">
                        <div class="card-body btn btn-primary card-btn text-white">
                        <a href="tennis.php" class="text-white text-decoration-none"><h5>Tennis Rackets</h5></a>
                        </div>
                    </div>
                </div>
                
                  
                </div>
            </div>
        </div>
    </div>


<!-- ###################################################PRODUCTS##################################################### -->
    <div class="products my-5">
        <div class="container">

            <div class="row">
                <h1 class="text-center">Products</h1>

                <div class="decoration-line"></div>
            </div>

            <div class="row">
                <?php
                if(isset($_GET['msg'])){
                    $msgg = $_GET['msg'];

                    echo '<div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
                        '.$msgg.'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                }
                
                ?>
                <?php
                $sql = "SELECT * from admin_product";
                $result = mysqli_query($con, $sql);

                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                      $product_name =  $row['Product Name'];
                      $product_price =  $row['Price'];
                      $product_name =  $row['Product Name'];
                      $image =  $row['Image'];

                      echo '<div class="col mt-5">
                      <div class="card" style="width: 18rem;">
                          <img src="imagedata/'.$image.'" class="card-img-top" height="220px">
  
                          <div class="card-body">
                              <h5>'.$product_name.'</h5>
                              <p class="card-text">Rs. '.number_format($product_price).'</p>

                              <form action="cart.php" method="post">
                              <input type="hidden" class="form-control w-25" value="'.$product_name.'" name="product_name">
                              <input type="hidden" class="form-control w-25" value="'.$product_price.'" name="price">
                              <input type="hidden" class="form-control w-25" value="'.$image.'"" name="image">';
                              
                            echo   '<div class="text-center">
                            <button class="btn btn-primary cart-btn text-white" name="submit">Add To Cart</button>

                            </form>
                              </div>
                          </div>
  
                        </div>
                  </div>';


                    }
                }else{
                    echo "No Data is present";
                }
                
                
                ?>
                
            </div>

        </div>
    </div>
<!-- ############################################################################################################### -->


<!-- #####################################################FEATURED################################################### -->
    <div class="featured py-5">
        <div class="container">
            <div class="row">
                <h1 class="text-center">Featured</h1>
                <div class="decoration-line"></div>
            </div>


            <div class="row">

            <?php
            if(isset($_GET['msg2'])){
                    $msgg2 = $_GET['msg2'];

                    echo '<div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
                        '.$msgg2.'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                }
            ?>

            <?php
            $sql1 = "SELECT * from `admin_featured`";
            $result1 = mysqli_query($con, $sql1);

            while($row1=mysqli_fetch_assoc($result1)){
                    $product_price =  $row1['Price'];
                    $product_name =  $row1['Product Name'];
                    $image =  $row1['Image'];

                    echo '<div class="col mt-5">
                    <div class="card" style="width: 18rem;">
                        <img src="images/'.$image.'" class="card-img-top" height="220px">

                        <div class="card-body">
                            <h5>'.$product_name.'</h5>
                            <p class="card-text">Rs. '.number_format($product_price).'</p>

                            <form action="cartfeatured.php" method="post">
                              <input type="hidden" class="form-control w-25" value="'.$product_name.'" name="product_name">
                              <input type="hidden" class="form-control w-25" value="'.$product_price.'" name="price">
                              <input type="hidden" class="form-control w-25" value="'.$image.'"" name="image">

                            <div class="text-center">
                            <button class="btn btn-primary cart-btn text-white" name="submit">Add To Cart</button>
                            </form>
                            </div>
                        </div>

                      </div>
                </div>';
            }
            ?>


            </div>
        </div>
    </div>

    <div class="testimonial py-5">
        <div class="container">
            <div class="row">
                <h1 class="text-center">What Clients Say</h1>
                <div class="decoration-line"></div>
            </div>

            <div class="row mt-5">
                <div class="col">

                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <h5>   
                                    "Thrilled with my recent online football shop experience! Found exactly what I needed – a stylish new football jersey. The ordering process was quick, and the jersey arrived in perfect condition. Excellent service and a satisfied customer here!"
                                </h5>

                                <div class="d-flex justify-content-center mt-4">
                                    <img src="images/testimonial-anonymous.png" class="testimonial-pic">
                                    <h4 class="ms-3 align-self-center">Usman Khalid</h4>
                                </div>
                            </div>


                            <div class="carousel-item">
                                <h5>
                                    "Awesome finds at the online football shop! I recently ordered a pair of football socks and a training ball, and I'm impressed with the speedy delivery and quality of the products. Great service, and I'll definitely be back for more gear!"
                                </h5>

                                <div class="d-flex justify-content-center mt-4">
                                    <img src="images/testimonial-anonymous.png" class="testimonial-pic">
                                    <h4 class="ms-3 align-self-center">Bilal Rahman</h4>
                                </div>
                            </div>


                            <div class="carousel-item">
                                <h5>
                                    "Super happy with my purchase from the online football store. The website is user-friendly, and I found the perfect football accessories for my training sessions. Quick delivery and great prices – highly recommended for any football enthusiast!"
                                </h5>

                                <div class="d-flex justify-content-center mt-4">
                                    <img src="images/testimonial-anonymous.png" class="testimonial-pic">
                                    <h4 class="ms-3 align-self-center">Fahad Khan</h4>
                                </div>
                            </div>
                        </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>

                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

<!-- #########################################################FOOTER################################################## -->
    <div class="footer pt-4">
        <div class="container">
            <div class="row">
                <div class="col text-white">
                    <img src="images/ballsport-white-transparent-logo.png" width="160px">

                    <h4 class="mt-4">Home</h4>
                    <h4 class="my-3">About Us</h4>
                    <h4>Contact US</h4>
                </div>
            </div> 

            <div class="row text-center footer-line mt-4">
                <div class="col">
                    <h5 class="my-3 copyright">Copyright © 2024, Ballsport.com</h5>
                </div>
            </div>
        </div>
    </div>
<!-- ############################################################################################################## -->

    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>
</html>