<?php
require "dbconfig/config.php";
session_start();
if (!isset($_SESSION['username'])) {
}
?>
<?php
if (isset($_POST["logout"])) {
    session_destroy();
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>blog</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

    <style>
        .other-color {
            margin: auto;
            width: 70%;
            height: 90%;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Restaurant Reviews</a>
            </div>

            <!-- Log out menu starts -->
            <?php if (isset($_SESSION['username']) && !empty($_SESSION['username'])) { ?>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="add_rest.php">Add new Restaurant</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <div class="btn-group">
                        <a href="user-dash.php" class="btn"><?php echo $_SESSION['username']; ?></a>
                        <form method="post" class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <button class="btn btn-group-sm btn-warning" type="submit" name="logout">Logout</button>
                        </form>
                    </div>

                </ul>


                <!-- Log out menu ends -->
            <?php } else { ?>

                <!-- Normal nav bar -->

                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <div class="btn-group" role="group">
                        <a href="signup.php" class="btn btn-success">Sign Up</a>
                        <a href="login.php" class="btn btn-primary">Log In</a>
                    </div>
                </ul>


            <?php
            }
            ?>

        </div>
    </nav>