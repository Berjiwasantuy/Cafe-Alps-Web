<?php
session_start();
include 'koneksi.php';

// Mengecek apakah session user sudah ada atau belum
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$email = $_SESSION['user'];
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validasi password
    if ($password !== $confirmPassword) {
        $error = "Passwords do not match.";
    } else {
        // Update data pengguna di tabel user
        $query = "UPDATE user SET username = '$username', password = '$password' WHERE email = '$email'";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo "Success: User data updated successfully.";
            header('Location: user.php');
            exit();
        } else {
            $error = "Error: " . mysqli_error($koneksi);
        }
    }
}
?>