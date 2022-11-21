<?php
session_start();
include_once "config.php";

$curhat = mysqli_real_escape_string($conn, $_POST['curhat']);
$user_id = $_SESSION['unique_id'];

if (!empty($curhat)) {
    $insertData = mysqli_query($conn, "INSERT INTO curhat (user_id, body) VALUES ($user_id, '$curhat')");
    if ($insertData) {
        echo "success";
        return;
    }
} else {
    echo "Silahkan tulis curhatanmu...💌";
    return;
}