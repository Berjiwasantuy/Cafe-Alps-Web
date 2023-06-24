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
    <title>Input Order | Cafe Alps</title>
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

        .card {
            border: none;
            margin-bottom: 20px;
            background-color: rgba(34, 34, 34, 0.8);
            transition: transform 0.3s ease;
        }

        .card:hover {
    transform: scale(1.08);
    background-color: rgba(233, 144, 0, 0.2);
}

        .card .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .card .card-title {
            margin: 10px 0;
            color: #ff8000;
        }

        .card .card-text {
            color: #fff;
            font-size: 14px;
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
    <div class="container">
    <form method="POST" action="addorder.php">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group required">
                    <label for="idpembeli" style="color: white;">ID Pembeli</label>
                    <select class="form-control" id="idpembeli" name="idpembeli" required>
                        <!-- Menampilkan opsi ID pembeli dari tabel user -->
                        <?php
                        $query = "SELECT idpembeli, username FROM user";
                        $result = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['idpembeli'] . "'>" . $row['idpembeli'] . " - " . $row['username'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group required">
                    <label for="tanggal">Tanggal Pengorderan</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>

                <button type="submit" class="btn btn-primary" style="background-color: orange;" onclick="return validateForm();">Submit</button>
                <br><br><br>
            </div>

            <div class="row">
    <?php
    // Kode PHP untuk mengambil data dari tabel dan menampilkan menggunakan loop
    include 'koneksi.php';
    $query = "SELECT * FROM menu";
    $result = mysqli_query($koneksi, $query);

    $firstMenu = true; // Untuk melacak apakah menu pertama ditampilkan

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="uploads/<?php echo $row['gambar']; ?>" alt="Menu Image">
                <div class="card-body">
                    <h5 class="card-title" style="color: #ff8000;"><?php echo $row['nama']; ?></h5>
                    <p class="card-text"><?php echo $row['jenis']; ?></p>
                    <p class="card-text">Price: ¥<?php echo $row['harga']; ?></p>
                    <div class="form-check">
                        <?php
                        // Tambahkan atribut required hanya pada menu pertama
                        if ($firstMenu) {
                            echo "<input class='form-check-input' type='checkbox' name='barang[]' value='" . $row['nama'] . "' id='checkbox" . $row['iditem'] . "'>";
                          
                        } else {
                            echo "<input class='form-check-input' type='checkbox' name='barang[]' value='" . $row['nama'] . "' id='checkbox" . $row['iditem'] . "'>";
                        }
                        ?>
                        <label class="form-check-label" for="checkbox<?php echo $row['iditem']; ?>">Pilih</label>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
                </div>
        </div>
    </form>
</div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    function validateForm() {
        var checkboxes = document.getElementsByName('barang[]');
        var isChecked = false;
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                isChecked = true;
                break;
            }
        }
        if (!isChecked) {
            alert("Pilih setidaknya satu menu.");
            return false;
        }
        return true;
    }
    </script>
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
  
    </footer>
</html>
