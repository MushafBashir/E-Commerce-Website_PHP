<?php
include "connect.php";
session_start();
if(isset($_SESSION['username'])){
    $user_name = $_SESSION['username'];
}

if(isset($_GET['re'])){
    $sql4 = "DELETE FROM `cart` where Username = '$user_name'";
    $result4 = mysqli_query($con, $sql4);
    if($result4){
        header("location: cart.php");
    }
}


?>