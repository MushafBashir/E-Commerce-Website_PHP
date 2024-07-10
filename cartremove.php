<?php
include "connect.php";

if(isset($_GET['removeid'])){
    $remove = $_GET['removeid'];

    $sql = "DELETE FROM `cart` WHERE `cart`.`Id` = $remove";
    $result = mysqli_query($con, $sql);

    if($result){
        header("location: cart.php");
    }
}





?>