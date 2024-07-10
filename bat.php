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
    <title>Ballsport - Cricket Bat</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="own.css">
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


<!-- ######################################################FOOTBAL################################################### -->

<div class="container">
    <div class="row">
        
    <?php
include "connect.php";

if(isset($_POST['submit'])){
    $product_name = $_POST['product_name'];
    $price =$_POST['price'];
    $image = $_POST['image'];
    $quantity = 1;

    $sql1 = "SELECT * from `cart` where `Product Name` = '$product_name' AND Username = '$user_name'";
    $result1= mysqli_query($con,$sql1);
    if(mysqli_num_rows($result1) > 0){
        $msg = "Product has already present in the cart.";

       echo '<div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
                        '.$msg.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }else{
        $sql = "INSERT INTO `cart` (`Username`,`Product Name`, `Price`, `Quantity`,`Image`) VALUES ('$user_name' , '$product_name', '$price','$quantity', '$image')";
        $result = mysqli_query($con, $sql);
        if($result){
            header("location: cart.php");
        }
    }

}

?> 

    <?php
        $sql = "SELECT * FROM `admin_bat`";
        $result = mysqli_query($con, $sql);
        while($row= mysqli_fetch_assoc($result)){
                $product_name =  $row['Product Name'];
                $product_price =  $row['Price'];
                $image =  $row['Image'];

                echo '<div class="col mt-5">
                        <div class="card" style="width: 18rem;">
                                <img src="imagedata/'.$image.'" class="card-img-top" height="220px">
                                <div class="card-body">
                                    <h5>'.$product_name.'</h5>
                                    <p class="card-text">Rs. '.number_format($product_price).'</p>
                                    <div class="text-center">
                                    <form method="post">
                                        <input type="hidden" value="'.$product_name.'" name="product_name">
                                        <input type="hidden" value="'.$product_price.'" name="price">
                                        <input type="hidden" value="'.$image.'" name="image">
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
<!-- ############################################################################################################## -->


<!-- ###################################################FOOTER###################################################### -->
<div class="footer pt-3 mt-5">
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