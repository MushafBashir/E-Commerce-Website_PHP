<!-- <li class="nav-item me-2">
                        <a href="admin.php" class="nav-link active">Admin</a>
                    </li> -->

                    <?php
                   if(isset($_SESSION['username'])){
                        $user_name = $_SESSION['username'];

                        echo '<li class="nav-item me-2">
                        <a href="" class="nav-link active">Hello '.$user_name.'</a>
                    </li>
                    
                    <li class="nav-item me-2">
                        <a href="logout.php" class="nav-link active">Log Out</a>
                    </li>
                    <li class="nav-item">
                        <a href="Cart.php" class="nav-link active">Cart 
                             '.$cart_num.'
                        </a>
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