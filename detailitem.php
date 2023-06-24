
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
// Ambil ID item dari URL
$iditem = $_GET['id'];

// Query untuk mendapatkan detail item berdasarkan ID
$sql = "SELECT * FROM menu WHERE iditem = '$iditem'";
$result = mysqli_query($koneksi, $sql);

// Cek apakah item ditemukan
if (mysqli_num_rows($result) > 0) {
    $item = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Item | Cafe Alps</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <style>
        /* CSS untuk menyesuaikan tampilan dengan halaman yang diberikan */
        body {
            margin: 0;
            padding: 0;
            background-image: url(gambar/login/bg.jpg);
            background-repeat: no-repeat;
            background-size: 100%;
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
            margin-top: 50px; /* Mengubah jarak margin top */
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

        .card {
            background-color: rgba(34, 34, 34, 0.8);
            margin-top: 20px; /* Mengatur jarak margin top */
        }
        .card h5{
            color: #ff8000;
        }
        .card-text{
            color: white;
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
                <span style="color: white;">Detail Item</span>
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
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card mt-4">
                <img src="uploads/<?php echo $item['gambar']; ?>" class="card-img-top" alt="Item Image">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $item['nama']; ?></h5>
                    <p class="card-text">Jenis: <?php echo $item['jenis']; ?></p>
                    <p class="card-text">Harga: ¥<?php echo $item['harga']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
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
</footer>
</html>

<?php
} else {
    echo "Item not found.";
}
?>

