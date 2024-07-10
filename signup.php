<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ballsport - Sign Up</title>
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

                    <!-- <li class="nav-item me-2">
                        <a href="signup.php" class="nav-link active">Sign Up</a>
                    </li> -->

                    <!-- <li class="nav-item me-2">
                        <a href="signin.php" class="nav-link active">Sign In</a>
                    </li> -->
                </ul>
            </div>
        </nav>
<!--################################################################################################################## -->


<!-- #################################################PHP CODE OF SIGN UP############################################# -->
<?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])){

    

    $sql1 = "SELECT * FROM `accounts` WHERE Email = '$email'";
    $result1 = mysqli_query($con, $sql1);
    

    if(mysqli_num_rows($result1) > 0){
        
        echo '<div class="container">
                <div class="row">
                    <div class="col">
                        <div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
                            Email already present.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>';

    }else{

    $sql = "INSERT INTO `accounts` (`Username`, `Email`, `Password`) VALUES ('$username', '$email', '$password')";
    $result = mysqli_query($con, $sql);

    if($result){
        header("location: signin.php");
    }else{
        echo "account not created";
    }
}
}
// else{
//     echo '<div class="container" id="signupalert">
//             <div class="row">
//                 <div class="col">
//                     <div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
//                         Please fill all the fields.
//                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//                     </div>
//                 </div>
//             </div>
//         </div>';

// }
}

?>
        <div class="container d-none" id="signupalert">
            <div class="row">
                <div class="col">
                    <div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
                        Please fill all the fields.
                        <button type="button" class="btn-close" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>

            <div class="container d-none" id="password-strong-alert">
                <div class="row">
                    <div class="col">
                        <div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
                            Your password must be strong.
                            <button type="button" class="btn-close" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container d-none" id="email-alert">
            <div class="row">
                <div class="col">
                    <div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
                        Please Insert Correct Email.
                        <button type="button" class="btn-close" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
<!-- ################################################################################################################ -->



<!-- ######################################################Sign Up################################################### -->

<div class="container">
    <div class="row"> 
        <div class="col mt-4">
            <form action="" method="post" id="signupform">
                <label for="username"><h3>Username</h3></label>
                <input type="text" class="form-control w-25" id="username" name="username" autocomplete="off">

                <label for="email" class="mt-3"><h3>Email</h3></label>
                <input type="text" class="form-control w-25" id="email" name="email" autocomplete="off">

                <label for="password" class="mt-3"><h3>Password</h3></label>
                <input type="password" class="form-control w-25" id="password" name="password">
                <p id="msg" class="mt-2"></p>
                <p id="msg-1" class="mt-3"></p>

                <input type="submit" class="btn btn-primary mt-4" value="Sign Up" name="submit" id='submitbtn'>

                <p class="mt-2">Already Have An Account - <a href="signin.php">Log In</a></p>
            </form>
        </div>
    
    </div>
</div>
<!-- ############################################################################################################## -->

    <script src="bootstrap.js"></script>
    <script src="own.js"></script>
    <script src="signup.js"></script>
</body>
</html>