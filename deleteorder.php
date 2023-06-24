<?php
include 'koneksi.php';

if (isset($_GET['idpembeli'])) {
    $idpembeli = $_GET['idpembeli'];

    // Mendapatkan tanggal dari order yang akan dihapus
    $sql_get_tanggal = "SELECT tanggal FROM belanja WHERE Idpembeli = '$idpembeli'";
    $result_get_tanggal = mysqli_query($koneksi, $sql_get_tanggal);
    $row_get_tanggal = mysqli_fetch_assoc($result_get_tanggal);
    $tanggal = $row_get_tanggal['tanggal'];

    // Hapus order berdasarkan id pembeli dan tanggal
    $sql = "DELETE FROM belanja WHERE Idpembeli = '$idpembeli' AND tanggal = '$tanggal'";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        // Redirect kembali ke halaman admin.php setelah menghapus order
        header("Location: admin.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>