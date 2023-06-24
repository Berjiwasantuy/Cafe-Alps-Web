<!DOCTYPE html>
<html>
<head>
    <title>Cetak Tabel Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .print-buttons {
            text-align: center;
            margin-top: 20px;
        }

        .print-buttons button {
            display: inline-block;
            padding: 10px 20px;
            background-color: orange;
            color: #fff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            margin-right: 10px;
        }
    </style>
</head>
<body>
<center> <div class="logo">
        <img src="gambar/Logo.png" alt="Logo" width="200">
    </div></center>
    <h2>TABEL MENU CAFE ALPS</h2>
    <table>
        <tr>
            <th>NO</th>
            <th>ID ITEM</th>
            <th>NAMA</th>
            <th>JENIS</th>
            <th>GAMBAR</th>
            <th>HARGA</th>
        </tr>
        <?php
include 'koneksi.php';
// Function untuk mendapatkan jenis menu yang diformat
function getFormattedJenis($jenis) {
    return $jenis == 'minuman' ? 'Minuman' : 'Makanan';
}

$sql = "SELECT * FROM menu";
$result = mysqli_query($koneksi, $sql);
$no = 1;
foreach ($result as $row) {
    $jenis = getFormattedJenis($row['jenis']);
    echo "<tr>
        <td>$no</td>
        <td>{$row['iditem']}</td>
        <td>{$row['nama']}</td>
        <td>{$jenis}</td>
        <td><img src='uploads/{$row['gambar']}' alt='{$row['nama']}' width='100'></td>
        <td>¥{$row['harga']}</td>
    </tr>";
    $no++;
}
?>
</table>

    <div class="print-buttons">
    <button onclick="location.href='windowprintitem.php'">Print</button>
    <button onclick="location.href='reportitem.php'" target="_blank">Buat Report PDF</button>
    <button onclick="location.href='admin.php'">Kembali</button>
    
</div>


    
</body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script>

        
       
        </script>
       
        </html>  