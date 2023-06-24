<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Periksa apakah ada baris terkait dalam tabel belanja
    $sql_check = "SELECT * FROM belanja WHERE iditem = '$id'";
    $result_check = mysqli_query($koneksi, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        // Ada baris terkait dalam tabel belanja, hapus terlebih dahulu
        $sql_delete_belanja = "DELETE FROM belanja WHERE iditem = '$id'";
        $result_delete_belanja = mysqli_query($koneksi, $sql_delete_belanja);

        if (!$result_delete_belanja) {
            echo "Error: " . mysqli_error($koneksi);
            exit();
        }
    }

    // Hapus item dari tabel menu setelah menghapus terlebih dahulu baris-baris terkait dalam tabel belanja
    $sql_delete_menu = "DELETE FROM menu WHERE iditem = '$id'";
    $result_delete_menu = mysqli_query($koneksi, $sql_delete_menu);

    if ($result_delete_menu) {
        // Redirect kembali ke halaman admin.php setelah menghapus item
        header("Location: admin.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
