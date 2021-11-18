<?php
include('header.php');

require "dbconfig/config.php";

session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
?>

<?php

$description = $rating = "";

if (isset($_GET['r_id']) && isset($_GET['r_name']) && isset($_GET['r_address'])) {
    $r_id = $_GET['r_id'];
    $r_name = $_GET['r_name'];
    $r_address = $_GET['r_address'];
    $_SESSION['r_id'] = $r_id;
    $_SESSION['r_name'] = $r_name;
    $_SESSION['r_address'] = $r_address;
}

$u_id = $_SESSION['u_id'];

?>