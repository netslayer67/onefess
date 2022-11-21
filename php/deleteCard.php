<?php
session_start();
include_once "config.php";

$cardId = mysqli_real_escape_string($conn, $_POST['id']);

$deleteCurhat = mysqli_query($conn, "DELETE FROM curhat WHERE id = $cardId");

echo "success";
return;