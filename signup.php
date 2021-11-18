<?php
include('header.php');
?>

<body>
    <div>
        <?php
        require "dbconfig/config.php";
        
        $username = $password = $cpassword = "";
        if (isset($_POST["reg_btn"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $cpassword = $_POST["cpassword"];

            if ($password == $cpassword) {
                // Fill in the query to check if there are any existing records of the username submitted
                $query = "SELECT * from users WHERE username ='$username'";
                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    echo "<script> alert('Username taken')</script>";
                } else {
                    // Fill in the query to register the user details into the database
                    $query = "INSERT into users (username, password) VALUES('$username', '$password')";
                    $query_run = mysqli_query($con, $query);

                    if ($query_run) {
                        echo "<script> alert('User registered! Proceed to Login.')</script>";
                    } else {
                        echo 'Errno: ' . $mysqli->error;
                        echo "<script> alert('Unable to create account')</script>";
                    }
                }
            } else {
                echo 'Errno: ' . $mysqli->error;
                echo "<script> alert('Passwords do not match!')</script>";
            }
        }
        ?>
        <div class="container">
            <div class="jumbotron  other-color">
                <div class="row">
                    <div class="col-sm-4" style="background-color:none;">
                        <img src="images/user.png" class="img-rounded" alt="Cinque Terre" width="100" height="80">
                    </div>
                    <div class="col-sm-8" style="background-color:none;">
                        <h1>User Sign Up </h1>
                    </div>

                </div>

                <form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="on">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">User Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Your Username" name="username" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" placeholder="Your Password" name="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" id="registerbtn" value="Register Account" name="reg_btn">
                        </div>
                    </div>
                </form>

                </h2>
            </div>

</body>