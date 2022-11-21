<?php

$conn = mysqli_connect("localhost", "root", "", "onefess", 3306);

if (!$conn) {
    echo "Database Connection Error : " . mysqli_connect_error();
}