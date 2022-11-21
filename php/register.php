<?php
session_start();
include_once "config.php";

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($name) && !empty($email) && !empty($password)) {
    // * Validasi Email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $checkEmail = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
        if (mysqli_num_rows($checkEmail) > 0) {
            echo "Email already exist";
            return;
        }
    } else {
        echo "Email is invalid";
        return;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $uniqueId = rand(time(), 100000000);

    $insertData = mysqli_query($conn, "INSERT INTO user (unique_id, email, password, name) VALUES ($uniqueId, '$email', '$password', '$name')");

    if ($insertData) {
        $selectUser = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
        if (mysqli_num_rows($selectUser) > 0) {
            $result = mysqli_fetch_assoc($selectUser);
            $_SESSION['unique_id'] = $result['unique_id'];
            echo "success";
            return;
        } else {
            echo "Server Error";
            return;
        }
    }
} else {
    echo "all field is required!";
    return;
}