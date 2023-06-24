<?php
require('fpdf/fpdf.php');
include 'koneksi.php';

class PDF extends FPDF
{
    // Fungsi untuk membuat header laporan
    function Header()
    {
        // Logo atau gambar header
        $this->Image('gambar/logo.png', 10, 10, 20);

        // Judul laporan
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 15, 'Riwayat Orderan Cafe Alps', 0, 0, 'C');

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

// Menampilkan data dari tabel belanja
$pdf->SetFont('Arial', '', 8);

$pdf->Cell(10, 15, 'No', 1, 0, 'C');
$pdf->Cell(10, 15, 'ID', 1, 0, 'C');
$pdf->Cell(35, 15, 'Username', 1, 0, 'C');
$pdf->Cell(15, 15, 'Tanggal', 1, 0, 'C');
$pdf->Cell(90, 15, 'Daftar Item', 1, 0, 'C');
$pdf->Cell(10, 15, 'Total', 1, 1, 'C');

$no = 1;
$sql_belanja = "SELECT belanja.Idpembeli, user.username, belanja.tanggal, GROUP_CONCAT(menu.nama SEPARATOR ', ') AS daftar_item, SUM(menu.harga) AS total_harga
    FROM belanja
    INNER JOIN user ON belanja.Idpembeli = user.Idpembeli
    INNER JOIN menu ON belanja.iditem = menu.iditem
    GROUP BY belanja.Idpembeli, user.username, belanja.tanggal
    ORDER BY belanja.tanggal";
$belanja = mysqli_query($koneksi, $sql_belanja);

$total_keuntungan = 0; // Inisialisasi variabel total_keuntungan

while ($row = mysqli_fetch_assoc($belanja)) {
    $daftar_item = $row['daftar_item'];

    $daftar_item_arr = explode(', ', $daftar_item);
    $item_counts = array_count_values($daftar_item_arr);
    $daftar_item_formatted = [];
    foreach ($item_counts as $item => $count) {
        if ($count > 1) {
            $daftar_item_formatted[] = "$count $item";
        } else {
            $daftar_item_formatted[] = $item;
        }
    }
    $daftar_item_formatted_str = implode(', ', $daftar_item_formatted);

    $pdf->Cell(10, 15, $no++, 1, 0, 'C');
    $pdf->Cell(10, 15, $row['Idpembeli'], 1, 0, 'C');
    $pdf->Cell(35, 15, $row['username'], 1, 0, 'C');
    $pdf->Cell(15, 15, $row['tanggal'], 1, 0, 'C');
    $pdf->Cell(90, 15, $daftar_item_formatted_str, 1, 0);
    $pdf->Cell(10, 15, '' . $row['total_harga'], 1, 1, 'C');

    $total_keuntungan += $row['total_harga']; // Menambahkan total_harga ke variabel total_keuntungan
}

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(200, 10, 'Total Pesanan: ' . ($no - 1), 0, 1, 'L');
$pdf->Cell(200, 10, 'Total Keuntungan yang didapat: ' . $total_keuntungan . ' Yen', 0, 0, 'L');

$pdf->Output();
?>
