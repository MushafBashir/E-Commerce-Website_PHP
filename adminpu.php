<?php
include "connect.php";

if(isset($_POST['updateSubmit'])){

            $id = $_POST['id'];
            $product_name = $_POST['product-name'];
            $price = $_POST['price'];
            $image = $_FILES['image']['name'];


            // $image_temp_name =  $_FILES['image']['tmp_name'];

            // $folder = "imagedata/".$image_name;

            $sql = "UPDATE `admin_product` SET `Product Name`='$product_name',`Price`='$price',`Image`='$image' WHERE `Id` = $id";

            $result = mysqli_query($con, $sql);
            if($result){
                header("location: adminproduct.php");
            }else{
                echo "Not Updated";
            }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="own.css?v=<?php echo time(); ?>">

</head>
<body>
<?php
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $sql = "SELECT * FROM `admin_product` WHERE Id = '$id'";
        $result = mysqli_query($con, $sql);
        if($result){
            $row = mysqli_fetch_assoc($result);
            $product_name = $row['Product Name'];
            $price = $row['Price'];
            $image = $row['Image'];
        

        echo '<div class="container">

<div class="row mt-5">
    <div class="col">
        <form method="post" enctype="multipart/form-data">
            <h3 class="mb-3">Product Name</h3>
            <input type="text" class="form-control w-25" name="product-name" value="'.$product_name.'">

            <h3 class="my-3">Price</h3>
            <input type="number" class="form-control w-25" name="price" value="'.$price.'">

            <h3 class="my-3">Image</h3>
            <input type="file" class="form-control w-25" name="image">

            <input type="hidden" class="form-control w-25" name="id" value="'.$id.'">


            
            <input class="btn btn-primary mt-4" name="updateSubmit" value="Submit" type="submit">
        </form>
    </div>
</div>
</div>';

}else{
    echo "false";
}
}


?>
    
</body>
</html>