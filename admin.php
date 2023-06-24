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

// Logout process
if (isset($_GET['logout'])) {
    session_unset(); // Remove all session variables
    session_destroy(); // Destroy the session
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Admin | Cafe Alps</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <style>
        /* CSS untuk menyesuaikan tampilan dengan halaman yang diberikan */
        body {
            
            margin: 0;
            padding: 0;
            background-image: url(gambar/login/bg.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            font-family: 'Roboto', Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h2 {
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }
        table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #ddd;
}

table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #ddd;
}

th, td {
    padding: 8px;
    text-align: left;
    border: 1px solid rgba(0, 0, 0, 0.5);
}

th {
    border: 1px solid black;
    background-color: rgba(0, 0, 0, 0.4); /* Latar belakang putih samar */
    color: darkorange; /* Warna teks oranye */
}

td {
    background-color: rgba(0, 0, 0, 0.7); /* Latar belakang hitam samar */
    color: white; /* Warna teks putih */
}
        .success {
            color: green;
        }
        .error {
            color: red;
        }
        .button {
            display: inline-block;
            padding: 8px 16px;
            background-color: #ff8900;
            color: #fff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }
        .button:hover {
            background-color: #ff9307;
        }
        .pagination-container {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.pagination {
    display: inline-block;
}

.pagination a {
    display: inline-block;
    padding: 8px 16px;
    text-decoration: none;
    border: 1px solid #ddd;
    border-radius: 4px;
    color: #fff;
}

.pagination a.active {
    background-color: #222;
    color: white;
    border: 1px solid #100;
}

.pagination a:hover:not(.active) {
    background-color: #ddd;
    color: #222;
}
        .search-form label,
        .search-form input[type="text"],
        .search-form select,
        .search-form button[type="submit"] {
            display: inline-block;
            vertical-align: middle;
        }

        .search-form label {
            width: 100px;
        }

        .search-form input[type="text"],
        .search-form select {
            width: 200px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .search-form button[type="submit"] {
            background-color: #ff8900;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .search-form button[type="submit"]:hover {
            background-color: #ff9307;
        }
        .box {
            background-color: white;
            padding: 10px;
            margin-bottom: 20px;
        }
        
        .navbar {
            background-color: #222;
        }

        .navbar-brand {
            color: #ff8000;
            font-weight: bold;
            font-size: 24px;
        }
        
        .navbar-brand img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }

        .navbar-nav .nav-link {
            color: #fff;
        }

        .navbar-text {
            color: #fff;
        }

        .container {
            margin-top: 20px;
        }
        .navbar .nav-item .nav-link {
            color: #ff8000;
        }
        
        .navbar .nav-item .nav-link:hover {
            color: #fff;
        }
        
        .navbar .nav-item .btn-logout {
            background-color: #ff8000;
            color: #fff;
            border: none;
        }
        
        .navbar .nav-item .btn-logout:hover {
            background-color: #e66900;
            color: #fff;
        }
        .footer {
            background-color: #222;
            color: #fff;
            padding: 40px 0;
            text-align: center;
        }

        .footer .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .footer-section {
            flex: 1 1 300px;
            margin: 20px;
        }

        .footer-section h3 {
            color: #fff;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .footer-section p {
            color: #a0a0a0;
            font-size: 14px;
            line-height: 1.5;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .social-icons a {
            color: #fff;
            font-size: 18px;
            margin: 0 5px;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: #f95738;
        }

        .footer-bottom {
            margin-top: 20px;
            font-size: 14px;
            color: #a0a0a0;
        }
        .team-social-icons .social-icon {
    color: black;
}

.team-social-icons .social-icon:hover {
    color: orange;
}
.fixed-top {
    position: fixed;
    top: 0;
    width: 100%;
    transition: top 0.3s;
}

.scrolled {
    top: -100px; /* Sesuaikan dengan tinggi navbar */
}
.search {
    margin-top: 100px;
}
.horizontal-line {
    border: none;
    border-top: 1px solid #000;
    margin: 20px 0;
    width: 100%;
}
    </style>
</head>
<body>
   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="gambar/Logo.png" alt="Cafe Alps Logo" >Cafe Alps</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-text">
        <?php
        if (isset($_SESSION['admin'])) {
            echo '<div class="navbar-text">';
            echo '<span style="color: white;">Selamat datang di Menu Admin, ' . $username . '</span>';
            echo '</div>';
        }
        ?>
</div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link btn-logout" href="?logout=true">Logout</a>
            </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Content -->
<div class = search>
    <br><br>
    <form class="search-form" action="" method="GET">
        <label for="search">Cari:</label>
        <input type="text" id="search" name="search" placeholder="Masukkan Nama Item">

        <select id="jenis" name="jenis">
            <option value="">Semua</option>
            <option value="Makanan">Makanan</option>
            <option value="Minuman">Minuman</option>
        </select>

        <button type="submit">Search</button>
    </form>
</div>
<br>
<br><br>
<h2>List Item</h2>
<center>
<a class="button" href="inputitem.php">Tambah Menu</a>
<a class="button" href="printitem.php">Print Tabel Item</a>
</center>
<br>
<table>
    <tr>
        <th>NO</th>
        <th>NAMA</th>
        <th>JENIS</th>
        <th>GAMBAR</th>
        <th>HARGA</th>
        <th>ACTION</th>
    </tr>
    <?php
    include 'koneksi.php';

    // Konfigurasi pagination
    $limit = 5; // Jumlah data per halaman
    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Halaman aktif
    $start = ($page - 1) * $limit; // Menentukan index data awal untuk query

    // Pencarian data
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $jenis = isset($_GET['jenis']) ? $_GET['jenis'] : '';

    // Query data item dengan filter pencarian, jenis, dan pagination
    $sql = "SELECT * FROM menu WHERE 1=1";
    if (!empty($search)) {
        $sql .= " AND nama LIKE '%$search%'";
    }
    if (!empty($jenis)) {
        $sql .= " AND jenis = '$jenis'";
    }
    $sql .= " LIMIT $start, $limit";
    $items = mysqli_query($koneksi, $sql);

    $no = $start + 1; // Penomoran halaman

    foreach ($items as $row) {
        echo "<tr>
                <td>$no</td>
                <td>" . $row['nama'] . "</td>
                <td>" . $row['jenis'] . "</td>
                <td><img src='uploads/" . $row['gambar'] . "' alt='Gambar Item' width='190' height='130'></td>
                <td>¥" . $row['harga'] . "</td>
                <td>
                <a class='button' href='detailitem.php?id=" . $row['iditem'] . "'>Detail</a>
                <a class='button' href='edititem.php?id=" . $row['iditem'] . "'>Edit</a>
                <a class='button' href='deleteitem.php?id=" . $row['iditem'] . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus item ini?')\">Hapus</a>
            </td>
            </tr>";
        $no++;
    }
    ?>
</table>
<?php
// Query total data untuk pagination
$sql_total = "SELECT COUNT(*) as total FROM menu";
$sql_search = "";

// Mengecek apakah terdapat kata kunci pencarian
if (!empty($search)) {
    $sql_search .= " WHERE nama LIKE '%$search%'";
}

// Mengecek apakah terdapat filter jenis
if (!empty($jenis)) {
    if (strpos($sql_search, 'WHERE') !== false) {
        $sql_search .= " AND jenis = '$jenis'";
    } else {
        $sql_search .= " WHERE jenis = '$jenis'";
    }
}

$sql_total .= $sql_search;

$result = mysqli_query($koneksi, $sql_total);
if (!$result) {
    die("Error: " . mysqli_error($koneksi));
}

$data = mysqli_fetch_assoc($result);
$total = $data['total'];
$pages = ceil($total / $limit); // Jumlah halaman

// Tampilkan pagination
echo "<div class='pagination-container'>";
echo "<div class='pagination'>";
for ($i = 1; $i <= $pages; $i++) {
    echo "<a href='admin.php?page=$i";
    if (!empty($search) || !empty($jenis)) {
        echo "&search=$search&jenis=$jenis";
    }
    echo "' class='" . ($i == $page ? 'active' : '') . "'>$i</a>";
}
echo "</div>";
echo "</div>";
?><hr class="horizontal-line">
<div class="search">
    <form class="search-form" action="" method="GET">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Pembeli">
        <input type="date" id="tanggal" name="tanggal">

        <button type="submit">Search</button>
    </form>
</div>
<h2>List Order</h2>
<center>
<a class="button" href="inputorder.php">Tambah Order</a>
<a class="button" href="printorder.php">Print Tabel Order</a>
</center>
<br><table>
    <tr>
        <th>NO</th>
        <th>ID PEMBELI</th>
        <th>USERNAME</th>
        <th>TANGGAL</th>
        <th>DAFTAR ITEM YANG DIBELI</th>
        <th>TOTAL HARGA</th>
        <th>ACTION</th> 
    </tr>
    <?php
    $where = '';
    if (isset($_GET['nama']) && !empty($_GET['nama'])) {
        $nama = $_GET['nama'];
        $where .= " AND user.username LIKE '%$nama%'";
    }
    if (isset($_GET['tanggal']) && !empty($_GET['tanggal'])) {
        $tanggal = $_GET['tanggal'];
        $where .= " AND belanja.tanggal = '$tanggal'";
    }

    $sql_belanja = "SELECT belanja.Idpembeli, user.username, belanja.tanggal, GROUP_CONCAT(menu.nama SEPARATOR ', ') 
    AS daftar_item, SUM(menu.harga) AS total_harga
    FROM belanja
    INNER JOIN user ON belanja.Idpembeli = user.Idpembeli
    INNER JOIN menu ON belanja.iditem = menu.iditem
    WHERE 1 $where
    GROUP BY belanja.Idpembeli, user.username, belanja.tanggal
    ORDER BY belanja.tanggal";
    $belanja = mysqli_query($koneksi, $sql_belanja);
    $no = 1;
    foreach ($belanja as $row) {
        $daftar_item = explode(', ', $row['daftar_item']);
        $item_counts = array_count_values($daftar_item);
        $daftar_item_formatted = [];
        foreach ($item_counts as $item => $count) {
            if ($count > 1) {
                $daftar_item_formatted[] = "$count $item";
            } else {
                $daftar_item_formatted[] = $item;
            }
        }
        $daftar_item_string = implode(', ', $daftar_item_formatted);

        echo "<tr>
                <td>$no</td>
                <td>" . $row['Idpembeli'] . "</td>
                <td>" . $row['username'] . "</td>
                <td>" . $row['tanggal'] . "</td>
                <td>" . $daftar_item_string . "</td>
                <td>¥" . $row['total_harga'] . "</td>
                <td>
                <a class='button' href='detailorder.php?idpembeli=" . $row['Idpembeli'] . "'>Detail</a>
                <a class='button' href='deleteorder.php?idpembeli=" . $row['Idpembeli'] . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus belanjaan ini?')\">Hapus</a>
            </td>
            </tr>";
        $no++;
    }
    ?>
</table>



<br>
<!-- Footer -->

<footer class="footer">
    <div class="footer-content">
    <div class="footer-section about">
    <h3>About Us</h3>
   <p>Whether you're catching up with friends, having a business meeting, or simply enjoying a cup of coffee alone, Cafe Alps is the perfect place to relax and unwind.</p>
</div>
        <div class="footer-section social">
            <h3>Contact Us</h3>
             <p>Phone: 123-456-7890</p>
            <p>Email: info@cafealps.com</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
            <div class="footer-section contact">
            <h3>Our Branch</h3>
            <p>Tenkaichi Street, Kamurocho</p>
            <p>Fukuhaku Street, Nagasuga</p>
            <p>Shofukocho, Sotenbori</p>
            <p>Chuo Station Blvd, Tsukimino</p>
            <p>Noriko Street, Kineicho</p>
        </div>
        </div>
    </div>
    <script>
  window.addEventListener('scroll', function() {
    var sidebar = document.querySelector('.sidebar');
    var footer = document.querySelector('.footer');

    var isBottomVisible = window.innerHeight >= document.documentElement.scrollHeight - footer.offsetHeight;
    if (isBottomVisible) {
      sidebar.classList.add('hidden');
    } else {
      sidebar.classList.remove('hidden');
    }
  });

  $(window).scroll(function() {
    if ($(this).scrollTop() > 0) {
        $('#navbar').addClass('scrolled');
    } else {
        $('#navbar').removeClass('scrolled');
    }
});
</script>
</body>
</html>