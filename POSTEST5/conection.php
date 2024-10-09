<?php
$server = "localhost";
$user = "root";
$password = "";
$db_name = "project";

$conn = mysqli_connect($server, $user, $password, $db_name);

if (!$conn) {
    die("Gagak terhubung ke database: " . mysqli_connect_error());
}
