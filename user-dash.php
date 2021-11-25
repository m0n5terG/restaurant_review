<?php
include('header.php');
require "dbconfig/config.php";
?>

<div class="container">
    <div class="jumbotron other-color" style="text-align: center;">
        <h2 style="margin-top: 20px;">Welcome <?php echo $_SESSION['username']; ?></h2>
        
        <?php
        $username = $_SESSION['username'];
        $query = "SELECT * FROM restaurants";
        $result = mysqli_query($con, $query);

        if ($result->num_rows >0) {
        
        ?>

        <div class="card-group">

        <?php

        while ($row = $result->fetch_assoc()) {

        ?>
            <div class="d-flex flex-row flex-nowrap overflow-auto">
                <div class='col-xs-6'>
                    <div class='card'>
                        <img>
                        <div class='card-body'>
                            <h5 class='card-title'><?php echo $row['name']; ?></h5>
                            <p class='card-text'><i class='bi bi-map'><?php echo $row['address']; ?></i></p>
                            <p class='card-text'><small class='text-muted'>added on <?php echo $row['date']; ?></small></p>
                            <div class='card-body'>
                                <form method='POST'>
                                    <a href='#'><small class='card-link'></small></a>
                                    <a href='#'><input name='delete' type='submit' value=''></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
    } else {
        ?>
        <div class="alert alert-info">
          <strong>Alert!</strong> No restaurants found!. Click above to add a restaurant and review.
        </div>
    <?php
    }
    ?>
    </div>
</div>

<?php include 'footer.php'; ?>