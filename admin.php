<?php
include "connect.php";

session_start();

if(isset($_SESSION['adminuser'])){
    
}else{
    header('location: adminlogin.php');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ballsport - Admin</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="own.css?v=<?php echo time(); ?>">
</head>
<body>
<nav class="navbar admin-header">
        <h1 class="mx-auto">Admin</h1>
        <a href="adminlogout.php" class="btn btn-primary me-3">Log Out</a>
</nav>


    <?php
    
    if(isset($_POST['submit'])){


        $product_name =  $_POST['product-name'];
    
        $price =  $_POST['price'];
    
    
        $image_name =  $_FILES['image']['name'];
    
        $image_temp_name =  $_FILES['image']['tmp_name'];
    
        $folder = "imagedata/".$image_name;
    
        $section = $_POST['section'];
    
        $sql = "INSERT INTO `$section` (`Product Name`, `Price`, `Image`) VALUES ('$product_name', '$price', '$image_name');";
        $result = mysqli_query($con, $sql);
    
        if(move_uploaded_file($image_temp_name, $folder)){
            // echo "Product has been add successfully to $section table";

            echo '<div class="container">
            <div class="row">
            <div class="col">
            <div class="alert alert-primary alert-dismissible fade show mt-4" role="alert">
                Product has been added successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      </div>
      </div>
      </div>
      ';
        }else{
            echo "Product not added.";
        }
    
    }     
    
    ?>

    <div class="container d-lg-block d-none">
        <div class="row mt-5">
            <div class="col-6">
                <div class="add-product text-center py-1 text-white mb-4"><h4>Add Product Here</h4></div>
                <form action="admin.php" method="post" enctype="multipart/form-data">
                    <h3 class="mb-3">Product Name</h3>
                    <input type="text" class="form-control w-50" name="product-name" placeholder="Product Name">

                    <h3 class="my-3">Price</h3>
                    <input type="number" class="form-control w-50" name="price" placeholder="Price">

                    <h3 class="my-3">Image</h3>
                    <input type="file" class="form-control w-50" name="image">

                    <h3 class="my-3">Select Section</h3>
                    <select class="form-control w-50" name="section">
                        <option selected>Select Section</option>
                        <option value="admin_featured">Featured</option>
                        <option value="admin_bat">Cricket Bat</option>
                        <option value="admin_product">Product</option>
                        <option value="admin_basketball">Basketball</option>
                        <option value="admin_tennis">Tennis</option>
                        <option value="admin_football">Football</option>
                    </select>
                    
                    <input class="btn btn-primary mt-4" name="submit" value="Submit" type="submit">
                </form>
            </div>

            <div class="col-6">
            <div class="add-product text-center py-1 text-white mb-4"><h4>Delete And Upadate Product Here</h4></div>
                <a href="adminfootball.php" class="btn btn-primary mt-2">Football</a>
                <a href="admincricketbat.php" class="btn btn-primary mt-2">Cricket Bat</a>
                <a href="adminbasketball.php" class="btn btn-primary mt-2">Basketball</a>
                <a href="admintennis.php" class="btn btn-primary mt-2">Tennis</a>
                <a href="adminproduct.php" class="btn btn-primary mt-2">Product Section</a>
                <a href="adminfeatured.php" class="btn btn-primary mt-2">Featured Section</a>
            </div>
        </div>
    </div>


    <div class="container-fluid d-lg-none d-block">
        <div class="row mt-5">
            <div class="col-6">
                <div class="add-product text-center py-1 text-white mb-4"><h4>Add Product Here</h4></div>
                <form action="admin.php" method="post" enctype="multipart/form-data">
                    <h3 class="mb-3">Product Name</h3>
                    <input type="text" class="form-control w-75" name="product-name" placeholder="Product Name">

                    <h3 class="my-3">Price</h3>
                    <input type="number" class="form-control w-75" name="price" placeholder="Price">

                    <h3 class="my-3">Image</h3>
                    <input type="file" class="form-control w-75 d-md-block d-none" name="image">
                    <input type="file" class="form-control w-75 d-md-none d-block" name="image" class="">

                    <h3 class="my-3">Select Section</h3>
                    <select class="form-control w-75" name="section">
                        <option selected>Select Section</option>
                        <option value="admin_featured">Featured</option>
                        <option value="admin_bat">Cricket Bat</option>
                        <option value="admin_product">Product</option>
                        <option value="admin_basketball">Basketball</option>
                        <option value="admin_tennis">Tennis</option>
                        <option value="admin_football">Football</option>
                    </select>
                    
                    <input class="btn btn-primary mt-4" name="submit" value="Submit" type="submit">
                </form>
            </div>

            <div class="col-6">
            <div class="add-product text-center py-1 text-white mb-4"><h4>Delete And Upadate Product Here</h4></div>
                <a href="adminfootball.php" class="btn btn-primary mt-2">Football</a><br>
                <a href="admincricketbat.php" class="btn btn-primary mt-2">Cricket Bat</a><br>
                <a href="adminbasketball.php" class="btn btn-primary mt-2">Basketball</a><br>
                <a href="admintennis.php" class="btn btn-primary mt-2">Tennis</a><br>
                <a href="adminproduct.php" class="btn btn-primary mt-2">Product Section</a><br>
                <a href="adminfeatured.php" class="btn btn-primary mt-2">Featured Section</a>
            </div>
        </div>
    </div>


    <!-- <div class="container mt-5">
        <div class="row">
            <div class="col">
                <a href="adminfootball.php">Football</a>
            </div>
        </div>
    </div> -->
    



    <script src="bootstrap.js"></script>
</body>
</html>