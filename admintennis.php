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
    <title>Ballsport - Admin - Tennis</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="own.css?v=<?php echo time(); ?>">
</head>
<body>
    <!--##############################################HEADER############################################################# -->
    <div class="container-fluid admin-header py-2">
        <div class="row">
            <div class="col">
                <h1 class="text-center ">Admin</h1>
            </div>
        </div>
    </div>
<!--################################################################################################################## -->

<?php
if(isset($_POST['submit'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM `admin_tennis` WHERE `admin_tennis`.`Id` = $id";
    $result = mysqli_query($con, $sql);

    if($result){
        echo '
        <div class="container">
        <div class="row">
        <div class="col">
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        Product Deleted Successfully
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  </div>
  </div>';
    }else{
        echo "Product Not Deleted";
    }

}
?>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
            <table class="table table-sm border">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Update</th>
                      </tr>
                    </thead>
                    <tbody>
              <?php  $sql = "SELECT * from `admin_tennis`";
                $result = mysqli_query($con, $sql);
                $num_rows = mysqli_num_rows($result);
                $num = 1;

                if($num_rows > 0){
                    while($row = mysqli_fetch_assoc($result)){
                    
                    $id = $row['Id'];
                    $product_name = $row['Product Name'];
                    $price = $row['Price'];
                    $image = $row['Image'];

                    echo '
                      <tr>
                        <th scope="row">'.$num.'</th>
                        <td><img src="imagedata/'.$image.'" width="40px"></td>
                        <td>'.$product_name.'</td>
                        <td>'.number_format($price).'</td>

                        <td>
                            <form action="admintennis.php" method="post">
                            <input type="hidden" value="'.$id.'" name="id">
                            <button class="btn btn-danger" name="submit">Delete</button>
                            </form>
                        </td>

                        <td>
                            <form action="admintu.php" method="post">
                            <input type="hidden" value="'.$id.'" name="id">
                            <button class="btn btn-warning text-white" name="submit">Update</button>
                            </form>
                        </td>
                      </tr>
                    ';

                    $num++;
                    }
                }else{
                    echo "fl";
                }
                ?>
                </tbody>
                  </table>
            </div>
        </div>
    </div>
    
    



    <script src="bootstrap.js"></script>
</body>
</html>