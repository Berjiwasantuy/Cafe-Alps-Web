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
    <title>Detail Order | Cafe Alps</title>
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

        .container {
            margin-top: 20px;
        }

        .footer {
            background-color: #222;
            color: #fff;
            padding: 40px 0;
            text-align: center;
            margin-top: 100px; /* Mengubah jarak margin top */
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
            line-height: 2;
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

        /* Menambahkan CSS tambahan */
        .btn-logout {
            color: white !important; /* Mengubah warna teks menjadi orange */
        }
.jumbotron {
    background-color: rgba(34, 34, 34, 0.8);
    color: white !important;
}
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="gambar/Logo.png" alt="Cafe Alps Logo">Cafe Alps</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-text">
                <span style="color: white;">Menu Detail Order</span>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php"><i class="fas fa-chevron-left"></i> Kembali</a>
                    </li>
                    <li class="nav-item">
                <a class="nav-link btn-logout" href="?logout=true">Logout</a>
            </li>
                </ul>
                </ul>
            </div>
        </div>
    </nav>

<!-- Konten Halaman -->
<div class="container">
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

    if (isset($_GET['idpembeli'])) {
        $idpembeli = $_GET['idpembeli'];
    
        $sql = "SELECT belanja.Idpembeli, belanja.idbelanja, user.username, belanja.tanggal, GROUP_CONCAT(menu.nama SEPARATOR ', ') AS daftar_item, SUM(menu.harga) AS total_harga
        FROM belanja
        INNER JOIN user ON belanja.Idpembeli = user.Idpembeli
        INNER JOIN menu ON belanja.iditem = menu.iditem
        WHERE belanja.Idpembeli = '$idpembeli'
        GROUP BY belanja.Idpembeli, belanja.idbelanja, user.username, belanja.tanggal";
        $result = mysqli_query($koneksi, $sql);
    
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $idpembeli = $row['Idpembeli'];
                $idbelanja = $row['idbelanja'];
                $username = $row['username'];
                $tanggal = $row['tanggal'];
                $daftar_item = $row['daftar_item'];
                $daftar_item_formatted = formatDaftarItem($daftar_item);
                $total_harga = $row['total_harga'];
                ?>
                <div class="jumbotron" id="idbelanja-<?php echo $idbelanja; ?>">
                    <div class="d-flex align-items-center">
                        <img src="gambar/profile.png" alt="Profile Pic" class="rounded-circle mr-3" style="width: 90px;">
                        <div>
                            <h4 class="display-4">ID Belanja: <?php echo $idbelanja; ?></h4>
                            <p class="lead">Username: <?php echo $username; ?></p>
                            
                            <p class="lead">ID Pembeli: <?php echo $idpembeli; ?></p>
                        </div>
                    </div>
                    <hr class="my-4">
                    <p>Tanggal: <?php echo $tanggal; ?></p>
                    <p>Daftar Item yang Dibeli: <?php echo $daftar_item_formatted; ?></p>
                    <p>Total Harga: ¥<?php echo $total_harga; ?></p>
                </div>
                <?php
            }
        } else {
            echo "Tidak ada data ditemukan.";
        }
    
    } else {
        echo "ID Pembeli tidak ditemukan.";
    }
    ?>
</div>

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
    </footer>

    <!-- Javascript untuk Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>