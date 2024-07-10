<?php
include "connect.php";
session_start();
if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];

    $sql = "SELECT * FROM `accounts` WHERE Username = '$user'";
    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_assoc($result);
    
    $email = $row['Email'];
}else{
    header("location: signin.php");
}

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
    <title>Ballsport - Checkout</title>
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

                    <?php
                   if(isset($_SESSION['username'])){
                        $user_name = $_SESSION['username'];

                        echo '<li class="nav-item me-2">
                        <a href="" class="nav-link active">Hello '.$user_name.'</a>
                    </li>

                    <li class="nav-item me-2">
                        <a href="logout.php" class="nav-link active">
                             Log Out
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="Cart.php" class="nav-link active">Cart 
                             '.$cart_num.'
                        </a>
                    </li>';
                    }
                    ?> 



                    
                </ul>
            </div>
        </nav>
<!--################################################################################################################## -->


<!--##############################################Address And Payment##################################################-->
<form action="place_order.php" method="post">
<div class="container d-none d-lg-block">
    <div class="row">

    <div class="alert alert-warning alert-dismissible fade show d-none" role="alert" id="alertt">
            Please Fill All The Fields.
            <button type="button" class="btn-close"  aria-label="Close"></button>
    </div>

    <div class="alert alert-warning alert-dismissible fade show d-none" role="alert" id="alerttt">
            Please Select Payment Method.
            <button type="button" class="btn-close"  aria-label="Close"></button>
    </div>


        <div class="col-3">
            <h2>Customer Details</h2>
            <hr>
        <!-- <form action="" method="post"> -->
                <label for="username"><h3>Username</h3></label>
                <input type="text" class="form-control" id="username" value="<?php echo $user;?>" disabled>
                <input type="hidden" class="form-control" name="username" value="<?php echo $user;?>">

                <label for="email" class="mt-3"><h3>Email</h3></label>
                <input type="text" class="form-control" id="email" value="<?php echo $email;?>" disabled>
                <input type="hidden" class="form-control" name="email" value="<?php echo $email;?>">
                
                <label for="phone" class="mt-3"><h3>Phone Number</h3></label>
                <input type="number" class="form-control" id="phone" name="phone" value="" autocomplete="off">

                <label for="address" class="mt-3"><h3>Address</h3></label>
                <textarea name="address" rows="4" id="address" class="form-control"></textarea>


                <input type="hidden" class="form-control" name="paymentmethod" id='paymentmethod'>

                <input type="hidden" class="form-control" id="jazzphone" name="jazzphone">
                <input type="hidden" class="form-control" id="jazztitle" name="jazztitle">

                <input type="hidden" class="form-control" id="easyphone" name="easyphone">
                <input type="hidden" class="form-control" id="easytitle" name="easytitle">

                <input type="hidden" class="form-control" id="cardnumber" name="cardnumber">
                <input type="hidden" class="form-control" id="cardname" name="cardname">
                <input type="hidden" class="form-control" id="expire" name="expire">
                <input type="hidden" class="form-control" id="cvv" name="cvv">


                <!-- <input type="submit" class="btn btn-primary mt-4" value="Sign Up" name="submit"> -->
            <!-- </form> -->
        </div>


        <div class="col-3 ms-auto">
        <div class="card" style="width: 18rem;">
  
        <div class="card-header text-center"><h4>Checkout</h4></div>
  <div class="card-body">
    <div class="d-flex">
        <h5>Product Quantity</h5>
        <?php
        $sql2 = "SELECT * FROM `cart` Where Username = '$user'";
        $result2 = mysqli_query($con,$sql2);
        
        ?>
        <h5 class="ms-auto"><?php if($result2){
            $cart_num = mysqli_num_rows($result2);
            echo $cart_num;
        }else{
            $cart1 = 0;
            echo $car1;
        };?></h5>
    </div>

    <div class="d-flex">
        <h5>Sub Total</h5>

        <?php
        $sql3 = "SELECT * FROM `cart` Where Username = '$user'";
        $result3 = mysqli_query($con,$sql3);
        $subtotal = 0;
        if($result3){
            while($row=mysqli_fetch_assoc($result3)){
                $quantity = $row['Quantity'];
                $price = $row['Price'] * $quantity;
                $subtotal += $price;
            }
        }
        ?>

        <h5 class="ms-auto"><?php echo number_format($subtotal);?></h5>
    </div>

    <div id="codc">
        <div class="d-flex">
            <h5>Cash On Delivery</h5>
            <h5 class="ms-auto">99</h5>
        </div>
    </div>


    <div class="d-flex">
        <h5>Discount</h5>
        <h5 class="ms-auto">0</h5>
    </div>

    <!-- <div class="d-flex">
        <h5>Delivery Charges</h5>
        <h5 class="ms-auto">99</h5>
    </div> -->
    <hr>

    <div class="d-flex">
        <h5>Total Price</h5>
        <h5 class="ms-auto d-none" id="totalpricee"><?php echo $subtotal;?></h5>

        <h5 class="ms-auto" id="totalprice"></h5>

        <input type="hidden" value="" id="totalpricevalue" name='totalprice'>
    </div>


        <button class="btn btn-primary w-100" id="porder" type="submit" name='submit'>Place Order</button>

    
  </div>
</div>
        </div>
    </div>
</div>
</form>

<div class="container">
    <hr>
    <h2>Payment Method</h2>
    <div class="row">
        <div class="col">
        <div class="card" style="width: 18rem;" id="cod">
            <img src="images/cod.png" class="card-img-top" height="180px">
            <h5 class="ms-2 mt-2">Cash On Delivery</h5>
        </div>

        </div>

        <div class="col" >
        <div class="card" style="width: 18rem;" id="jazz">
            <img src="images/jazz.jpeg" class="card-img-top" height="180px">
            <h5 class="ms-2 mt-2">Jazzcash</h5>
        </div>
        </div>


        <div class="col">
        <div class="card" style="width: 18rem;" id="easy">
            <img src="images/easypaisa.png" class="card-img-top" height="180px">
            <h5 class="ms-2 mt-2">Easypaisa</h5>
        </div>

        </div>

        <div class="col">
        <div class="card" style="width: 18rem;" id="banktransfer">
            <img src="images/bank.png" class="card-img-top" height="180px">
            <h5 class="ms-2 mt-2">Bank Transfer</h5>
        </div>

        </div>
    </div>
</div>

<!-- ##################################################ALERTS######################################################### -->
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <div class="alert alert-dark alert-dismissible fade show d-none" role="alert" id="alertttt">
                Please Fill All The Fields Of Jazz Cash.
                <button type="button" class="btn-close"  aria-label="Close"></button>
            </div>

            <div class="alert alert-dark alert-dismissible fade show d-none" role="alert" id="alerttttt">
                Please Fill All The Fields Of Easy Paisa.
                <button type="button" class="btn-close"  aria-label="Close"></button>
            </div>

            <div class="alert alert-dark alert-dismissible fade show d-none" role="alert" id="bankalert">
                Please Fill All The Fields Of Bank Transfer.
                <button type="button" class="btn-close"  aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>
<!-- ################################################################################################################# -->

<div class="container mt-5" id="cod-section">
    <div class="row">
            <h5>In cash on delivery you have to pay extra Rs. 99 on the time of delivery.</h5>
    </div>
</div>

 <div class="container mt-5" id="jazz-section">
    <div class="row">
        <div class="col-3">

            <label for="jazzphone1"><h3>Phone Number</h3></label>
            <input type="number" class="form-control" id="jazzphone1">

            <label for="jazztitle1"><h3>Account Title</h3></label>
            <input type="text" class="form-control" id="jazztitle1">

            </form>
        </div>
    </div>
 </div>


 <div class="container mt-5" id="easy-section">
    <div class="row">
        <div class="col-3">
            <label for="easyphone1"><h3>Phone Number</h3></label>
            <input type="number" class="form-control" id="easyphone1">

            <label for="easytitle1"><h3>Account Title</h3></label>
            <input type="text" class="form-control" id="easytitle1">
        </div>
    </div>
 </div>


 <div class="container mt-5" id="banktransfer-section">
    <div class="row">
        <div class="col-3">
            <label for="cardnumber1"><h3>Card Number</h3></label>
            <input type="number" class="form-control" id="cardnumber1" placeholder="Card Number">

            <label for="cardname1" class="mt-4"><h3>Name On Card</h3></label>
            <input type="text" class="form-control" id="cardname1" placeholder="Name On Card">

            <label for="expire1" class="mt-4"><h3>Expiration Date</h3></label>
            <input type="text" class="form-control" id="expire1" placeholder="Expiration Date">

            <label for="cvv1" class="mt-4"><h3>CVV</h3></label>
            <input type="number" class="form-control" id="cvv1" placeholder="CVV">
        </div>
    </div>
 </div>


<div class="container d-lg-none d-block">
    <div class="row">
        <div class="col-6">
        <form action="" method="post">
                <label for="username"><h3>Username</h3></label>
                <input type="text" class="form-control" id="username" name="username">

                <label for="email" class="mt-3"><h3>Email</h3></label>
                <input type="text" class="form-control" id="email" name="email">

                <label for="address" class="mt-3"><h3>Address</h3></label>
                <textarea name="address" rows="4" id="address" class="form-control"></textarea>


                <input type="submit" class="btn btn-primary mt-4" value="Sign Up" name="submit">
            </form>
        </div>
    </div>
</div>
<!--################################################################################################################## -->


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
    <script src="own2.js"></script>
    <script src="own3.js"></script>
    <script src="own4.js"></script>
</body>
</html>