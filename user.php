<?php
session_start();
include 'koneksi.php';

// Mengecek apakah session user sudah ada atau belum
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$email = $_SESSION['user'];

// Mengambil data username dari tabel user berdasarkan email
$query = "SELECT username FROM user WHERE email = '$email'";
$result = mysqli_query($koneksi, $query);

$row = mysqli_fetch_assoc($result);
$username = $row['username'];

if (isset($_SESSION['user'])) {
    $email = $_SESSION['user'];

    // Mengambil data idpembeli dari tabel user berdasa\/kan email
    $query_idpembeli = "SELECT idpembeli FROM user WHERE email = '$email'";
    $result_idpembeli = mysqli_query($koneksi, $query_idpembeli);

    if (mysqli_num_rows($result_idpembeli) > 0) {
        $row_idpembeli = mysqli_fetch_assoc($result_idpembeli);
        $idpembeli = $row_idpembeli['idpembeli'];

        // Menampilkan riwayat pembelanjaan berdasarkan id pembeli
        $query_riwayat = "SELECT * FROM belanja WHERE idpembeli = '$idpembeli'";
        $result_riwayat = mysqli_query($koneksi, $query_riwayat);
    }
}
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
    <title>User Menu | Cafe Alps</title>
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
            width: 70px;
            height: 70px;
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

        .shopping-cart-container {
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
    .btn-primary {
        background-color: #ff8000;
            color: #fff;
    }
    .btn-primary:hover {
        background-color: #ff9000;
            color: #fff;
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
            <button class="btn btn-link text-white" data-toggle="modal" data-target="#viewAccountModal">
                <img src="gambar/profile.png" alt="User Photo" class="rounded-circle" width="30" height="30">
                <?php echo $username; ?>
            </button>
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
<div class="container">
    <form method="POST" action="addorderan.php">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group required">
                    <label for="idpembeli" style="color: white;">ID Pembeli</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="idpembeli" name="idpembeli" value="<?php echo $idpembeli; ?>" readonly>
                        <div class="input-group-append">
                            <span class="input-group-text" id="usernameLabel"><?php echo $username; ?></span>
                        </div>
                    </div>
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

<!-- View Account Modal -->
<div class="modal fade" id="viewAccountModal" tabindex="-1" role="dialog" aria-labelledby="viewAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewAccountModalLabel">Account Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="gambar/profile.png" alt="User Photo" class="rounded-circle" width="100" height="100">
                <p>Email: <?php echo $email; ?></p>
                <p>Username: <?php echo $username; ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#editAccountModal">Edit Account</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Account Modal -->
<div class="modal fade" id="editAccountModal" tabindex="-1" role="dialog" aria-labelledby="editAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAccountModalLabel">Edit Account Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="updateuser.php" method="POST" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        <span id="passwordError" class="error-message"></span>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: orange;" onclick="submitButton.clicked = true; return validateForm();">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
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
        </div>
    </div>
    
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script>
    function validateForm() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm_password").value;
        var passwordError = document.getElementById("passwordError");

        if (password !== confirmPassword) {
            passwordError.textContent = "Passwords do not match.";
            return false;
        } else {
            passwordError.textContent = "";
            return true;
        }
    }
    function validateForm() {
    var submitButton = document.querySelector('button[type="submit"]');
    if (submitButton && submitButton.clicked) {
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
    }
    return true;
}

    
</script>
</body>
</html>





