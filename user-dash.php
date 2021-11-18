<?php
include('header.php');
require "dbconfig/config.php";
?>

<div class="container">

    <div class="jumbotron other-color">
        <a href="add_rest.php" role="button" class="btn btn-success">Add restaurant review</a>

        <h2>Welcome <?php echo $_SESSION['username']; ?>!</h2>

    </div>
    <div class="row">
        <div class="col-3" id="pname">
            <h3>Restaurant</h3>

            <?php

            $sql_rest = "SELECT r_name FROM restaurant";
            $result = $conn->query($sql_rest);
            while ($row = mysqli_fetch_array($result)) {
                $name = $row['r_name'];
                echo "<h4><a href='user-dash.php?r_name=$r_name'> $r_name<br></a>
							</h4>";
            }
            if (!$result) {
                printf("Error: %s\n", mysqli_error($con));
                exit();
            }
            ?>
        </div>
        <div class="col-6">
            <?php
            // fill in the blanks	- player is click, show the description
            if (isset($_GET["r_name"])) {
                $r_name = $_GET["r_name"];
                $query = "SELECT r_address FROM restaurant WHERE r_name = '$r_name' ";
                $query_run = mysqli_query($con, $query);
                $row = mysqli_fetch_array($query_run);
                $desc = $row['r_address'];

                echo
                "<h2>$name</h2>
							<p>$desc<br></p>";
            } else {
                echo "<h2>Choose a player, or add a player!</h2>";
            }
            ?>
        </div>
        <div class="col-3" id="picpic">
            <?php
            // fill in the blanks	- display & delete the image
            if (isset($_POST["delete"])) {
                $query = "DELETE FROM r_name WHERE r_name = '$r_name'";
                $query_run = mysqli_query($con, $query);
                if ($query_run) {
                    echo "<script> alert('Player deleted'); 
								location.href = 'index.php';
								</script>";
                }
            }

            if (isset($_GET["name"])) {
                $name = $_GET["name"];
                $query = "SELECT image FROM restaurant WHERE r_name = '$r_name'";
                $query_run = mysqli_query($con, $query);
                $row = mysqli_fetch_array($query_run);

                echo '
						<form method= "post" action ="index.php?name=' . $r_name . '" >
						<div class="btns">
						<input type="button" value="Hide Pic" id="hidebtn">
						<input type="submit" name="delete" value="Delete Player">
						</div>
						<img id="hide" src="data:image/jpeg;base64,' . base64_encode($row['Image']) . '" height="200" />
						</form>';
            }
            ?>
        </div>

    </div>

</div>

<script>
			$("#hidebtn").click(function(){
			$("#hide").toggle(100);
			if($('#hidebtn').val() === 'Hide Pic'){
				$('#hidebtn').val("Show Pic");
			}else{
				$('#hidebtn').val("Hide Pic");
			}
		});
		</script>

<?php include 'footer.html'; ?>