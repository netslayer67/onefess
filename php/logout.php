<?php
session_start();
include_once "config.php";
$unique_id = $_SESSION['unique_id'];
if (!isset($unique_id)) {
    header("location: ../index.php");
}

$logoutId = mysqli_real_escape_string($conn, $_POST['user_id']);
if (isset($logoutId)) {
    session_unset();
    session_destroy();
    header("location: ../index.php");
} else {
    header("location: home.php");
}