<?php
include('header.php');

require "dbconfig/config.php";
?>

<?php
			$username = $_SESSION['username'];
			$query = "SELECT u_id FROM users WHERE username = '$username'";
			$result = mysqli_query($con, $query);
			$row = mysqli_fetch_array($result);
			$u_id = $row['u_id'];
		?>

<?php
/*
$r_name = $r_address = $u_id = "";

if (isset($_POST["upload"])) {
    $r_name = $_POST["r_name"];
    $r_address = $_POST["r_address"];
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $userid = $_SESSION['u_id'];

    $query = "INSERT INTO `restaurant`(`r_name`, `r_address`, `image`, `u_id`) VALUES ('$r_name', '$r_address', '$file', '$u_id')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        echo "<script> alert('Restaurant added')</script>";
    } else {
        echo "<script> alert('Restaurant was NOT added!)</script>";
    }
}*/
$r_name = $r_address = "";
			if(isset($_POST["upload"])){
				$r_name = $_POST["r_name"];
				$r_address = $_POST["r_address"];
				$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
                
				$query = "INSERT into restaurant(r_name, r_address, image, u_id) VALUES('$r_name', '$r_address', '$file', $u_id)";
				$query_run = mysqli_query($con, $query);

				if($query_run){
					echo "<script> alert('Restaurant added')</script>";
				} else {
					echo "<script> alert('Restaurant was NOT added!)</script>";
				}
			}
?>

<div class="container">
    <div class="jumbotron  other-color">
        <a href="user-dash.php" role="button" class="btn btn-success glyphicon glyphicon-home"> Home</a>
        <div class="row">
            <div class="col-sm-8" style="background-color:none;">
                <h2>Add new Restaurant </h2>
            </div>
        </div>
       <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <div class="form-group">
                <label class="control-label col-sm-2" for="r_name">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="r_name" name="r_name" placeholder="Enter Restaurant name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="r_address">Address:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="r_address" name="r_address" placeholder="Enter Restaurant address"></textarea>
                </div>
            </div>
            <div class="form-group"><div class="col-sm-10">
                <input type="file" name="image">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" value="Submit" name="upload" class="btn btn-primary">
                    
                </div>
            </div>
        </form>
        <!--<div class="container-fluid">
			<div class="row">
				<div class="col-2"></div>
				<div class="col-8">
					<form method = "post" enctype="multipart/form-data" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
						<h2>Restaurant Name</h2>
						<input class="r_name" type="text" name="r_name">
						<h2>Address</h2>
						<textarea class="r_address" name="r_address"></textarea>
						<input type="file" name="image">
						<input type="submit" value="Submit" name="upload">
					</form>
				</div>
				<div class="col-2"></div>
			</div>
		</div>-->
    </div>
</div>

<?php include 'footer.html'; ?>