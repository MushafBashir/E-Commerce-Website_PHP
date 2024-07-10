<?php
include 'connect.php';
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
                        <a href="" class="nav-link active">Hello '.$user_name.'</a>
                    </li>
                    
                    <li class="nav-item me-2">
                        <a href="logout.php" class="nav-link active">Log Out</a>
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


                    <li class="nav-item">
                        <a href="Cart.php" class="nav-link active">Cart <?php if(isset($_SESSION['username'])) {
    
                            echo $cart_num;
}else{ echo $cart_num1;} ?></a>
                    </li>
                    
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
<div class="container">

<div class="row">
    <?php
    if(isset($_POST['searchBtn']) && !empty($_POST['search'])){
    
        $search = $_POST['search'];


        $sql = "(SELECT * FROM `admin_product` WHERE `Product Name` LIKE '%$search%')
        UNION
        (SELECT * FROM `admin_featured` WHERE `Product Name` LIKE '%$search%')
        UNION
        (SELECT * FROM `admin_football` WHERE `Product Name` LIKE '%$search%')
        UNION
        (SELECT * FROM `admin_bat` WHERE `Product Name` LIKE '%$search%')
        UNION
        (SELECT * FROM `admin_basketball` WHERE `Product Name` LIKE '%$search%')
        UNION
        (SELECT * FROM `admin_tennis` WHERE `Product Name` LIKE '%$search%')";


        $result = mysqli_query($con, $sql);


        $num = mysqli_num_rows($result);

        if($num > 0){
            while($rows= mysqli_fetch_assoc($result)){
                $product = $rows['Product Name'];
                $price = $rows['Price'];
                $image = $rows['Image'];

                echo '

                            <div class="col mt-5">

                                <div class="card" style="width: 18rem;">

                                    <img src="imagedata/'.$image.'" class="card-img-top" height="220px">

                                    <div class="card-body">
                                        <h5>'.$product.'</h5>
                                        <p class="card-text">'.$price.'</p>

                                        <form action="cart.php" method="post">
                              <input type="hidden" class="form-control w-25" value="'.$product.'" name="product_name">
                              <input type="hidden" class="form-control w-25" value="'.$price.'" name="price">
                              <input type="hidden" class="form-control w-25" value="'.$image.'"" name="image">
                        
                                        <div class="text-center">
                                        <button class="btn btn-primary cart-btn text-white" name="submit">Add To Cart</button>
                                        </form>
                                        </div>
                                </div>

                                </div>

                            </div>

                    ';

            }
        }else{
            echo    '<div class="col">
                        <h4>Not record found regarding "'.$search.'".</h4>
                    </div>';
        }




        }else{
            header('location: index.php');
        }

    
    
    ?> 
        
        </div>

    </div>
<!-- #########################################################FOOTER################################################## -->
<div class="footer pt-4 mt-5">
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
            
    
</body>
</html>