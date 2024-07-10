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
    <title>Ballsport | Order Placed</title>
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
                        <a href="index.php" class="nav-link active">Hello '.$user_name.'</a>
                    </li>
                    
                    <li class="nav-item me-2">
                        <a href="logout.php" class="nav-link active">Log Out</a>
                    </li>';
                }
                    ?> 



                    
                </ul>
            </div>
        </nav>
<!--################################################################################################################## -->

    <?php
    if(isset($_POST['submit'])){
        $username = $_POST['username']; 
        $email = $_POST['email']; 
        $phone = $_POST['phone']; 
        $address = $_POST['address']; 
        $paymentmethod = $_POST['paymentmethod']; 
        $totalprice = $_POST['totalprice']; 
    
        $jazzphone = $_POST['jazzphone'];
        $jazztitle = $_POST['jazztitle'];
    
        $easyphone = $_POST['easyphone'];
        $easytitle = $_POST['easytitle'];
    
        $cardnumber = $_POST['cardnumber'];
        $cardname = $_POST['cardname'];
        $expire = $_POST['expire'];
        $cvv = $_POST['cvv'];
    
        if($_POST['paymentmethod'] == "Bank Transfer"){
            $jazztitle = "Empty";
    
            $easytitle = "Empty";
        }else if($_POST['paymentmethod'] == "Jazz Cash"){
            $easytitle = "Empty";
            $cardname = "Empty";
    
        }else if($_POST['paymentmethod'] == "Easy Paisa"){
            $jazztitle = "Empty";
            $cardname = "Empty";
        }
    
        $sql = "INSERT INTO `order`(`Id`, `Username`, `Email`, `Phone Number`, `Address`, `Payment Method`, `Total Price`, `Jazz Phone`, `Jazz Title`, `Telenor Phone`, `Telenor Title`, `Card Number`, `Name On Card`, `Expiration Date`, `CVV`) VALUES ('','$username','$email','$phone','$address','$paymentmethod','$totalprice', '$jazzphone','$jazztitle','$easyphone','$easytitle','$cardnumber','$cardname','$expire','$cvv')";
    
        $result = mysqli_query($con, $sql);
        if($result){

            $proceed = True;

            echo '<div class="container-fluid pob text-white p-5 text-center">
                    <div class="row">
                        <div class="col">
                            <h1>
                                Your Order Has Successfully Been Placed.
                            <h1>
                        </div>
                    </div>
                </div>';
        }

    }
    
    ?>

<div class="container">

        <div class="row">
            <div class="col">
                <!-- <div class="userdetails">
                    <h2 class="mt-3">User Details</h2>
                    <hr class="blue-line">
                </div> -->
                <h2 class="mt-3 user-detail-heading pb-1">User Details</h2>
            

            <?php
            $sql = "SELECT * FROM `order` WHERE Username = '$user_name' ORDER BY id DESC LIMIT 1";
$result = mysqli_query($con, $sql);
if($result){
    $row= mysqli_fetch_assoc($result);

    $name = $row['Username'];

    $email = $row['Email'];

    $phone = $row['Phone Number'];

    $address = $row['Address'];

    $paymentmethod = $row['Payment Method'];
               echo '<div>
                    <h3 class="d-inline">Name:</h3>
                    <h4 class="d-inline">'.$name.'</h4>
                </div>

                <div class="mt-2">
                    <h3 class="d-inline">Email:</h3>
                    <h4 class="d-inline">'.$email.'</</h4>
                </div>

                <div class="mt-2">
                    <h3 class="d-inline">Phone Number:</h3>
                    <h4 class="d-inline ">'.$phone.'</h4>
                </div>

                <div class="mt-2">
                    <h3 class="d-inline">Address:</h3>
                    <h4 class="d-inline">'.$address.'</h4>
                </div>

                <div class="mt-2">
                    <h3 class="d-inline">Payment Method:</h3>
                    <h4 class="d-inline">'.$paymentmethod.'</h4>
                </div>
            </div>';
};

            ?>

            <div class="col">
                <h2 class="mt-3 user-detail-heading pb-1">Order Details</h2>
                <table class="table border mt-2">
                <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sqll = "SELECT * FROM `cart` WHERE Username = '$user_name'";

                    $resultt = mysqli_query($con, $sqll);

                    if($resultt){
                        $num = 1;
                        while($row=mysqli_fetch_assoc($resultt)){
                            $productName = $row['Product Name'];
                            $price = $row['Price'];
                            $quantity = $row['Quantity'];
                            $pricee = $row['Price'] * $quantity;
                            
                            echo '<tr>
                        <td scope="row">'.$num.'</td>
                        <td>'.$productName.'</td>
                        <td>'.$quantity.'</td>
                        <td>'.number_format($pricee).'</td>
                        </tr>';

                        $num++;
                        }
                    }
                    ?>
                       
                    </tbody>
                </table>

                <?php
                    $sql3 = "SELECT * FROM `cart` Where Username = '$user_name'";
                    $result3 = mysqli_query($con,$sql3);

                    $subtotal = 0;
                    if($result3){
                        while($row=mysqli_fetch_assoc($result3)){
                            $quantity = $row['Quantity'];
                            $price = $row['Price'] * $quantity;
                            $subtotal += $price;
                        }
                        $sql4 = "SELECT * FROM `order` Where Username = '$user_name' ORDER BY id DESC LIMIT 1";
                        $result4 = mysqli_query($con,$sql4);
                        if($result4){
                            $row1 = mysqli_fetch_assoc($result4);

                            $totalp = $row1['Total Price'];
                        

                        echo '<h5>Sub Total: '.number_format($subtotal).'</h5>
                                <h5>Discount: 0</h5>
                                <h5>Total Price: '.$totalp.'</h5>
                                <br>
                                <a href="index.php" class="btn btn-primary">Continue Shopping</a>
                        ';
                    }}
            ?>

                
            </div>
        </div>
    </div>';

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
</body>
</html>