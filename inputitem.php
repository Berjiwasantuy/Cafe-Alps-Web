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

// Mendefinisikan pesan awal
$pesan = "";

// Memproses data saat form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari form
    $nama = mysqli_real_escape_string($koneksi, $_POST["nama"]);
    $jenis = mysqli_real_escape_string($koneksi, $_POST["jenis"]);
    $gambar = $_FILES["gambar"]["name"];
    $harga = mysqli_real_escape_string($koneksi, $_POST["harga"]);

    // Memindahkan gambar ke folder yang diinginkan
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Memeriksa apakah menu dengan nama atau gambar yang sama sudah ada di tabel
    $check_query = "SELECT COUNT(*) AS count FROM menu WHERE nama = '$nama' OR gambar = '$gambar'";
    $check_result = mysqli_query($koneksi, $check_query);
    $check_row = mysqli_fetch_assoc($check_result);
    $count = $check_row['count'];

    if ($count > 0) {
        $pesan = "Menu dengan nama atau gambar yang sama sudah ada di tabel.";
    } elseif ($imageFileType !== "png") {
        $pesan = "Hanya file gambar dengan format PNG yang diperbolehkan.";
    } else {
        // Memasukkan data ke tabel menu menggunakan prepared statement
        $stmt = $koneksi->prepare("INSERT INTO menu (nama, jenis, gambar, harga) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama, $jenis, $gambar, $harga);

        if ($stmt->execute()) {
            $pesan = "Menu " . $nama . " berhasil ditambahkan.";
        } else {
            $pesan = "Error: " . $stmt->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Item | Cafe Alps</title>
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
        .itemform {
            max-width: 800px;
            margin: 0 auto;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .itemform h1 {
            text-align: center;
            color: white;
            margin-bottom: 20px;
        }

        .itemform .form-group label {
            color: white;
        }

        .itemform .form-control {
            background-color: rgba(255, 255, 255, 0.3);
            border: none;
            color: black;
        }

        .itemform .form-control::placeholder {
            color: black;
            
        }
        
        .itemform .btn-primary {
            background-color: orange;
            border-color: orange;
        }

        .itemform .btn-primary:hover {
            background-color: darkorange;
            border-color: darkorange;
        }

        .itemform .form-group.required label::after {
            content: "*";
            color: red;
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
                <span style="color: white;">Menu Input Item
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
            </div>
        </div>
    </nav>

    
<div class="itemform">
    <center>
        <h3>------------------------------------------------------</h3>
    </center>
    <h1>Input Item</h1>

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group required">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" required>
        </div>
        <div class="form-group required">
            <label for="jenis">Jenis</label>
            <select class="form-control" id="jenis" name="jenis" required>
                <option value="makanan">Makanan</option>
                <option value="minuman">Minuman</option>
            </select>
        </div>
        <div class="form-group required">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar" accept=".png" required>
        </div>
        <div class="form-group required">
            <label for="harga">Harga</label>
            <input type="text" class="form-control" id="harga" placeholder="Masukkan Harga" name="harga" required pattern="[0-9]+" title="Harga harus dalam bentuk angka" />
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <?php if (!empty($pesan)) { ?>
            <div class="alert alert-<?php echo ($count > 0 || $imageFileType !== "png") ? 'danger' : 'success'; ?>"><?php echo $pesan; ?></div>
        <?php } ?>
    </form>
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
            <h3>Concact Us</h3>
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
</script>
    </footer>
</html>
