<?php
include 'koneksi.php';
session_start();

// Cek apakah user telah login sebagai admin
if (!isset($_SESSION['admin']) || empty($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION['admin'];

// Mengambil data username dari tabel user berdasarkan email
$query = "SELECT username FROM admin WHERE email = '$email'";
$result = mysqli_query($koneksi, $query);

$row = mysqli_fetch_assoc($result);
$username = $row['username'];

require('fpdf/fpdf.php');

class PDF extends FPDF
{
    // Fungsi untuk membuat header laporan
    function Header()
    {
        // Logo atau gambar header
        $this->Image('gambar/logo.png', 10, 10, 20);

        // Judul laporan
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 15, 'Laporan Menu Cafe Alps', 0, 0, 'C');

        // Memberikan jarak antara header dengan konten
        $this->Ln(20);
    }

    // Fungsi untuk membuat footer laporan
    function Footer()
    {
        // Teks footer
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Halaman ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Menampilkan data dari tabel menu
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(10, 30, 'No', 1, 0, 'C');
$pdf->Cell(15, 30, 'ID Item', 1, 0, 'C');
$pdf->Cell(45, 30, 'Nama', 1, 0, 'C');
$pdf->Cell(23, 30, 'Jenis', 1, 0, 'C');
$pdf->Cell(60, 30, 'Gambar', 1, 0, 'C');
$pdf->Cell(20, 30, 'Harga', 1, 1, 'C');

$no = 1;
$totalMenu = 0;
$sql = "SELECT * FROM menu";
$result = mysqli_query($koneksi, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell(10, 30, $no, 1, 0, 'C');
    $pdf->Cell(15, 30, $row['iditem'], 1, 0, 'C');
    $pdf->Cell(45, 30, $row['nama'], 1, 0, 'C');
    $pdf->Cell(23, 30, $row['jenis'], 1, 0, 'C');
    $img = 'uploads/' . $row['gambar'];
    $pdf->Cell(60, 30 ,$pdf->Image($img, $pdf->GetX(),$pdf->GetY(), 60,30),1,0 );
    $pdf->Cell(20, 30, '' . $row['harga'], 1, 1, 'C');

    

    $no++;
    $totalMenu++;
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(150, 10, 'Total Menu: ' . $totalMenu, 0, 0, 'L');

$pdf->Output();
?>
