<?php
session_start();
include_once "config.php";

$email = mysqli_real_escape_string($conn, $_POST['loginEmail']);
$password = mysqli_real_escape_string($conn, $_POST['loginPassword']);

if (!empty($email) && !empty($password)) {
    $queryUser = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
    if (mysqli_num_rows($queryUser) > 0) {
        $resullt = mysqli_fetch_assoc($queryUser);
        $verifyPassword = password_verify($password, $resullt['password']);
        if ($password == $verifyPassword) {
            $unique_id = $resullt['unique_id'];
            $_SESSION['unique_id'] = $unique_id;
            echo "success";
            return;
        } else {
            echo "Password is incorrect";
            return;
        }
    } else {
        echo "Email is incorrect";
        return;
    }
} else {
    echo "All fields is required";
    return;
}