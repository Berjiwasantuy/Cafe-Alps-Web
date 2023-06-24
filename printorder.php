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
    <h2>TABEL RIWAYAT ORDER CAFE ALPS</h2>
<table>
    <tr>
        <th>NO</th>
        <th>ID PEMBELI</th>
        <th>USERNAME</th>
        <th>TANGGAL</th>
        <th>DAFTAR ITEM YANG DIBELI</th>
        <th>TOTAL HARGA</th>
    </tr>
    <?php
    include 'koneksi.php';

    // Function untuk memformat daftar item yang dibeli
    function formatDaftarItem($daftarItem) {
        $daftar_item_arr = explode(', ', $daftarItem);
        $item_counts = array_count_values($daftar_item_arr);
        $daftar_item_formatted = [];
        foreach ($item_counts as $item => $count) {
            if ($count > 1) {
                $daftar_item_formatted[] = "$count $item";
            } else {
                $daftar_item_formatted[] = $item;
            }
        }
        return implode(', ', $daftar_item_formatted);
    }

    $sql_belanja = "SELECT belanja.Idpembeli, user.username, belanja.tanggal, GROUP_CONCAT(menu.nama SEPARATOR ', ') AS daftar_item, SUM(menu.harga) AS total_harga
    FROM belanja
    INNER JOIN user ON belanja.Idpembeli = user.Idpembeli
    INNER JOIN menu ON belanja.iditem = menu.iditem
    GROUP BY belanja.Idpembeli, user.username, belanja.tanggal
    ORDER BY belanja.tanggal";
    $belanja = mysqli_query($koneksi, $sql_belanja);
    $no = 1;
    foreach ($belanja as $row) {
        $daftar_item_formatted = formatDaftarItem($row['daftar_item']);

        echo "<tr>
                <td>$no</td>
                <td>" . $row['Idpembeli'] . "</td>
                <td>" . $row['username'] . "</td>
                <td>" . $row['tanggal'] . "</td>
                <td>" . $daftar_item_formatted . "</td>
                <td>¥" . $row['total_harga'] . "</td>
            </tr>";
        $no++;
    }
    ?>
</table>

<div class="print-buttons">
    <button onclick="location.href='windowprintorder.php'">Print</button>
    <button onclick="location.href='reportorder.php'" target="_blank">Buat Report PDF</button>
    <button onclick="location.href='admin.php'">Kembali</button>
</div>

</body>
</html>
