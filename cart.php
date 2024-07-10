<?php
include "connect.php";

session_start();
if(isset($_SESSION['username'])) {
    
    $user_name = $_SESSION['username'];
}else {
    header("Location: signin.php");
    exit();
}


if(isset($_POST['submit'])){
    $product_name = $_POST['product_name'];
    $price =$_POST['price'];
    $image = $_POST['image'];
    // $username = $_POST['username'];
    $quantity = 1;

    $sql1 = "SELECT * from `cart` where `Product Name` = '$product_name' AND Username = '$user_name'";
    $result1= mysqli_query($con,$sql1);
    if(mysqli_num_rows($result1) > 0){
       $msg = "Product has already added.";
       header("location: index.php?msg=$msg");
    }else{
        $sql = "INSERT INTO `cart` (`Username`,`Product Name`, `Price`, `Quantity`,`Image`) VALUES ('$user_name','$product_name', '$price','$quantity', '$image')";
        $result = mysqli_query($con, $sql);
    }

}

$sql2 = "SELECT * FROM `cart` Where Username = '$user_name'";
$result2 = mysqli_query($con,$sql2);
if($result2){
    $cart_num = mysqli_num_rows($result2);
}else{
    $cart1 = 0;
};

?>

<!-- ##################################################UPDATE PHP######################################################## -->

<?php
if(isset($_POST['updatebtn'])){
   $updateid = $_POST['updateid'];
   $updatequantity = $_POST['updatequantity'];

   $sql3 = "update `cart` set Quantity = $updatequantity where Id= $updateid";
   $result3 = mysqli_query($con, $sql3);


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ballsport - Cart</title>
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
                        <a href="index.php" class="nav-link active">Hello '.$user_name.'</a>
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

        <div class="cart banner py-4">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h1 class="text-center text-white">Cart</h1>
                    </div>
                </div>
            </div>
        </div>
    
<!-- ############################################CART################################################################# -->


                <?php
                        $sql2 = "SELECT * FROM `cart` Where Username = '$user_name'";
                        $result2 = mysqli_query($con, $sql2);
                        $num=1;
                        $grandtotal = 0;
                        if(mysqli_num_rows($result2) != 0){

                         echo   '<div class="container mt-5">
                         <div class="row">
                             <div class="col">
                         <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Image</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Remove</th>
                                </tr>
                            </thead>
                            <tbody>';

                            while($row=mysqli_fetch_assoc($result2)){
                                $id = $row['Id'];
                                $product_name = $row['Product Name'];
                                $price = $row['Price'];
                                $image = $row['Image'];
                                $quantity = $row['Quantity'];
                                $subtotal = $price * $quantity;
                                $grandtotal += $subtotal;
            
                            
                         echo  '<tr>
                                <th scope="row">'.$num.'</th>
                                <td>'.$product_name.'</td>
                                <td><img src="imagedata/'.$image.'" width="60px"></td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" value="'.$id.'" name="updateid">
                                        <input type="number" min="1" value="'.$quantity.'" class="w-25" name="updatequantity">
                                        <button class="btn btn-primary" name="updatebtn">Update</button>
                                    </form>
                                </td>
                                <td>Rs. '.number_format($subtotal).'</td>
                                <td><a href="cartremove.php?removeid='.$id.'" name="remove" class="btn btn-danger">Remove</a></td>
                                </tr>';
    
                                
                                $num++;
                        }
                        
                   echo '</tbody>
                </table>
                        

                        
                
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col d-flex justify-content-between">
            <a href="index.php" class="btn btn-primary">Continue Shopping</a>
            <button class="btn btn-warning">Grand Total: '.number_format($grandtotal).'</button>
            <a href="checkout.php" class="btn btn-primary">Checkout</a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
           <a href="removeall.php?re" class="btn btn-danger">Remove All</a>
        </div>
    </div>
</div>';
}else{
    echo '<div class="container banner mt-4 py-4">
    <div class="row">
        <div class="col">
            <h1 class="text-center text-white">The Cart Is Empty</h1>
        </div>
    </div>
</div>';
}
?>



    <script src="bootstrap.js"></script>
</body>
</html>