<?php
include "connect.php";

session_start();

if(isset($_SESSION['username'])){
    $user_name = $_SESSION['username'];
}

if(isset($_POST['submit'])){
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $quantity = 1;

    $sql1 = "SELECT * FROM `cart` where `Product Name` = '$product_name' AND Username = '$user_name'";
    $result1 = mysqli_query($con, $sql1);

    if(mysqli_num_rows($result1) > 0){
        $msg2 = "Product has already added";
        header("location: index.php?msg2=$msg2");
    }else{
        $sql = "INSERT INTO `cart` (`Username`,`Product Name`, `Price`, `Quantity`,`Image`) VALUES ('$user_name','$product_name', '$price','$quantity', '$image')";
        $result = mysqli_query($con, $sql);
    
        if($result){
            header("location:cart.php");
        }else{
            echo "no";
        }
    }
}


?>