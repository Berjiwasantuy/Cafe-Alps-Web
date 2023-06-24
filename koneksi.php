<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "dbcoffeeshop";

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Error connecting to database" . mysqli_connect_error());
}
?>