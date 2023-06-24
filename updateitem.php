<?php
include 'koneksi.php';

// Ambil ID item dari URL
$iditem = $_GET['id'];

// Cek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil nilai-nilai yang dikirim melalui form
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];

    // Cek apakah file gambar baru telah diunggah
    if (!empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];
        $folder = 'uploads/';

        // Hapus file gambar lama jika ada
        $sql = "SELECT gambar FROM menu WHERE iditem = '$iditem'";
        $result = mysqli_query($koneksi, $sql);
        $oldImage = mysqli_fetch_assoc($result)['gambar'];
        if ($oldImage) {
            unlink($folder . $oldImage);
        }

        // Upload file gambar baru
        move_uploaded_file($tmp_name, $folder . $gambar);
    } else {
        // Jika file gambar tidak diubah, gunakan gambar lama
        $sql = "SELECT gambar FROM menu WHERE iditem = '$iditem'";
        $result = mysqli_query($koneksi, $sql);
        $gambar = mysqli_fetch_assoc($result)['gambar'];
    }

    // Update data item di database
    $sql = "UPDATE menu SET nama = '$nama', jenis = '$jenis', gambar = '$gambar', harga = '$harga' WHERE iditem = '$iditem'";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        // Redirect ke halaman admin.php jika berhasil diupdate
        header('Location: admin.php');
        exit();
    } else {
        echo "Failed to update item.";
    }
}