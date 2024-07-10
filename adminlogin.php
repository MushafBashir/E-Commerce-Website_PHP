<?php
include "connect.php";

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ballsport - Admin - Log In</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="own.css?v=<?php echo time(); ?>">
</head>
<body>
<!--##############################################HEADER############################################################# -->
<div class="container-fluid admin-header py-2">
        <div class="row">
            <div class="col">
                <h1 class="text-center ">Admin - Log In</h1>
            </div>
        </div>
    </div>
<!--################################################################################################################## -->
    <?php
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($username == 'admin' && $password == 'admin1234'){
            $_SESSION['adminuser'] = $username;
            header("location: admin.php");
        }else{
            echo "Not";
        }

    }
    
    
    
    
    ?>
        

<div class="container-fluid d-none d-lg-block">

        <div class="row d-flex justify-content-center align-items-center pppp">
        
            <div class="col-6">
                <form action="" method="post">
                    <label for="username"><h3>Username</h3></label>
                    <input type="text" class="form-control w-50" id="username" name="username">

                    <label for="password" class="mt-3"><h3>Password</h3></label>
                    <input type="password" class="form-control w-50" id="password" name="password">

                    <input type="submit" class="btn btn-primary mt-4" value="Log In" name="submit">
                </form>
            </div>
        </div>
    </div>


    <div class="container-fluid d-block d-lg-none">

        <div class="row d-flex justify-content-center align-items-center pppp">
        
            <div class="col-8">
                <form action="" method="post">
                    <label for="username"><h3>Username</h3></label>
                    <input type="text" class="form-control w-50" id="username" name="username">

                    <label for="password" class="mt-3"><h3>Password</h3></label>
                    <input type="password" class="form-control w-50" id="password" name="password">

                    <input type="submit" class="btn btn-primary mt-4" value="Log In" name="submit">
                </form>
            </div>
        </div>
    </div>


        <script src="bootstrap.js"></script>
</body>
</html>