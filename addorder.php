<?php
session_start();
include 'koneksi.php';

// Cek apakah ada permintaan POST yang dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan nilai dari inputan form
    $idpembeli = $_POST['idpembeli'];
    $barang = $_POST['barang'];
    $tanggal = $_POST['tanggal'];

    // Menambahkan data ke tabel belanja
    foreach ($barang as $item) {
        // Mendapatkan iditem dari tabel menu berdasarkan nama barang
        $query = "SELECT iditem FROM menu WHERE nama = ?";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("s", $item);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $iditem = $row['iditem'];

        // Menambahkan data ke tabel belanja
        $query = "INSERT INTO belanja (idpembeli, iditem, tanggal) VALUES (?, ?, ?)";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("sss", $idpembeli, $iditem, $tanggal);
        $stmt->execute();
    }

    // Mengarahkan pengguna kembali ke halaman admin.php setelah menambahkan data
    header("Location: admin.php");
    exit();
}
?>