<?php
include "connect.php";

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ballsport - Sign In</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="own.css?v=<?php echo time(); ?>">
</head>
<body>
<!--##############################################HEADER############################################################# -->
    <nav class="navbar navbar-expand-lg qw">
            <div class="container-fluid">
                <a href="index.php" class="navbar-brand d-lg-block d-none"><img src="images/ballsport-logo-transparent.png" width="130px" height="80px"></a>
                <a href="index.php" class="navbar-brand d-block d-lg-none"><img src="images/ballsport-logo-transparent.png" width="130px" height="72px"></a>

                <!-- <ul class="nav nav-pills">

                    <li class="nav-item me-2">
                        <a href="admin.php" class="nav-link active">Admin</a>
                    </li>
                    
                </ul> -->
            </div>
        </nav>
<!--################################################################################################################## -->
<?php
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            if(!empty($_POST['username']) && !empty($_POST['password'])){

            
        
            $sql = "SELECT * FROM `accounts` WHERE Username = '$username' AND Password = '$password'";
            $result = mysqli_query($con, $sql);
            $num = mysqli_num_rows($result);
            if($num > 0){
                $row = mysqli_fetch_assoc($result);
        
        
                $_SESSION['username'] = $row['Username'];
                
                
                // echo    '<div class="container">
                //             <div class="row">
                //                 <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                //                             '.$userName.' you are successfully loged In.
                //                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                //                 </div>
                //             </div>
                //         </div>';
                header('location: index.php');
        
            }else{
              echo  '<div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                Please Insert Correct Credentials.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        }else{
            echo '<div class="container">
            <div class="row">
                <div class="col">
                    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                        Please Fill All The Fields.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>';
        }
    }
    
        ?>

<div class="container-fluid">

        <div class="row d-flex justify-content-center align-items-center pppp">
        
            <div class="col-6">
                <form action="" method="post">
                    <label for="username"><h3>Username</h3></label>
                    <input type="text" class="form-control" id="username" name="username" style="width: 300px" autocomplete="off">

                    <label for="password" class="mt-3"><h3>Password</h3></label>
                    <input type="password" class="form-control" id="password" name="password" style="width: 300px">

                    <input type="submit" class="btn btn-primary mt-4" value="Sign In" name="submit">
                </form>

                <hr style="width: 300px">
                <a href="signup.php" class="btn btn-success" style="width: 300px">Create Account</a>
            </div>
        </div>
    </div>


        <script src="bootstrap.js"></script>
</body>
</html>