<?php
include("header.php");
?>

<?php
require "dbconfig/config.php";

$username = $password = "";
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * from users WHERE username = '$username' AND password = '$password' ";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $_SESSION['username'] = $username;
        header("location:user-dash.php");
    } else {
        echo "<script> alert('Username or Password is incorrect.')</script>";
    }
}
?>

<!-- Sign In page body starts from here -->
<body>

<div class="container">
  <div class="jumbotron  other-color">
   <div class="row">
    <div class="col-sm-4" style="background-color:none;">
        <img src="images/user.png" class="img-rounded" alt="User" width="100" height="80">
  </div>
    <div class="col-sm-8" style="background-color:none;">
         <h1>User Sign In </h1>
       </div>
   
  </div>
      
      
   
<form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" autocomplete="on">
    <div class="form-group">
      <label class="control-label col-sm-2" for="username">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="username" id="username" placeholder="Enter Name" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="password">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
      </div>
    </div>
   
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" id="loginbtn" value="Login" name="login">
      </div>
    </div>
  </form>     
  </div>
 
</div>

</body>
