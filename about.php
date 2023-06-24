<!DOCTYPE html>
<html>
<head>
    <title>About Us | Cafe Alps</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Custom styles here */
        body {
            margin: 0;
            padding: 0;
            background-color: #f3f2ee;
            font-family: 'Roboto', Arial, sans-serif;
        }
        .col-lg-3 {
            margin-left : 300px;
        }
        .goals {
            margin-left : 300px;
        }
        .sidebar {
  position: fixed;
  top: 0;
  left: 0;
  width: 430px;
  height: 100%;
  background-color: #222;
  color: #fff;
  padding: 20px;
  overflow-y: auto;
  font-family: Arial, sans-serif;
  transition: opacity 0.3s ease;
  opacity: 1;
  z-index: 1;
}
.sidebar.hidden {
  opacity: 0;
  pointer-events: none;
}

  .sidebar a {
    display: block;
    color: #fff;
    text-decoration: none;
    padding: 10px 0;
    font-size: 16px;
    font-weight: bold;
  }

  .sidebar a:hover {
    background-color: #444;
  }

        .sidebar .logo {
            margin-bottom: 0px;
        }

        .sidebar .logo img {
            width: 100%;
            height: auto;
        }

        .sidebar h3 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #f3f2ee;
        }

        .sidebar ul {
            list-style: none;
            padding-left: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }


        .sidebar ul li a {
            color: #f3f2ee;
            text-decoration: none;
            font-size: 20px;
        }

        .sidebar ul li a:hover {
            color: #e6dcd3;
        }

        .sidebar .login {
            margin-top: 20px;
        }

        .sidebar .login a {
            display: block;
            width: 100%;
            padding: 10px 15px;
            background-color: #d35400;
            color: #f3f2ee;
            text-align: center;
            text-decoration: none;
            font-size: 20px;
            font-weight: bold;
            border-radius: 5px;
        }

        .sidebar .address {
            margin-top: 20px;
            text-align: center;
        }

        .sidebar .address p {
            margin: 0;
            color: #f3f2ee;
        }

        .content {
            margin-left: 200px;
            padding: 10px;
        }

        .content h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        .zigzag-layout {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 10px;
}

.about-section {
  background-color: #8c6e4d;
  color: white;
  padding: 50px;
  text-align: center;
}

.about-section h1 {
  font-size: 32px;
  margin-bottom: 20px;
}

.about-section .goals {
  font-size: 24px;
  margin-bottom: 20px;
}

.about-section p {
  margin-bottom: 20px;
}

.about-section p:last-child {
  margin-bottom: 0;
}

/* Additional styles for the zigzag layout */
.about-section:nth-child(odd) {
  grid-column: span 2;
}

.about-section:nth-child(3n + 3) {
  grid-column: span 2;
}

.about-section:nth-child(4n + 4) {
  grid-row: span 2;
}

.about-section:nth-child(5n + 5) {
  grid-column: span 2;
}
       html {
        box-sizing: border-box;
    }

    *, *:before, *:after {
        box-sizing: inherit;
    }

    body {
        background-color: #f2f2f2;
    }

    .about-section {
        text-align: center;
        padding: 50px;
        background-color: #8c6e4d;
        color: white;
    }

    .about-image {
        margin-bottom: 20px;
    }

    .about-image img {
        width: 100%;
        max-width: 400px;
        border-radius: 10px;
    }

    .goals {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .team-section {
        margin-left: 350px;
        text-align: center;
        padding: 50px;
    }

    .team-title {
        font-size: 32px;
        margin-bottom: 30px;
        font-weight: bold;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 30px;
    }

    .member {
        flex: 1 0 35%;
        max-width: 350px;
        margin: 10px;
        position: relative;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s, box-shadow 0.3s;
        border-radius: 10px;
    }

    .member:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .member img {
        width: 100%;
        height: auto;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .member-info {
        padding: 20px;
    }

    .member-name {
        font-size: 24px;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .member-role {
        color: #a0a0a0;
        margin-bottom: 10px;
    }

    .member-description {
        color: #000;
        margin-bottom: 20px;
    }

    .social-icons {
        display: flex;
        justify-content: center;
    }

    .social-icons a {
        margin: 0 5px;
        color: #a0a0a0;
        transition: color 0.3s;
    }

    .social-icons a:hover {
        color: orange;
    }

    .sub-team {
        display: flex;
        justify-content: center;
        margin-top: 50px;
    }

    .sub-team .member {
        max-width: 200px;
    }

    @media screen and (max-width: 768px) {
        .member {
            flex-basis: 50%;
        }
    }

    @media screen and (max-width: 480px) {
        .member {
            flex-basis: 100%;
            max-width: 100%;
        }
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
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Cafe Alps</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>      <!-- Content -->
    
            <div class="col-lg-3">
                <!-- Sidebar -->
                <aside class="sidebar">
                    <div class="logo">
                        <img src="gambar/Logo.png" alt="Cafe Alps Logo" width="500" height="200">
                    </div>
                    <center>
                        <ul>
                            <li><a href="dashboard.php">Home</a></li>
                            <li class="active"><a href="about.php">About Us</a></li>
                            <li><a href="review.php">Review</a></li>
                        </ul>
                    </center>
                    <div class="login">
                        <a href="login.php">Login</a>
                    </div>
                    <div class="address">
                        <p>Cafe Alps</p>
                        <p>Tenkaichi Street, Kamurocho</p>
                        <p>Chiyoda-ku, Tokyo 123-4567</p>
                        <p>Japan</p>
                    </div>
                </aside>
            </div>
            <img src="gambar/about.png" alt="Cafe Alps Logo" width="100%" height="600">

            <div class="about-section">
            <div class="about-section zigzag-layout">
  <p class="goals"></p>
  <p class="goals">Cafe Alps is a renowned coffee shop that was established in 1971. Since its inception, the cafe has grown and evolved into a beloved destination for coffee enthusiasts. With a rich history spanning over five decades, Cafe Alps has established itself as a prominent player in the coffee industry.</p>
</div>

<div class="team-section">
    <h2 class="team-title">Our Team</h2>
    <div class="row">
        <div class="member">
            <img src="gambar/date.png" alt="Makoto Date">
            <div class="member-info">
                <h3 class="member-name">Makoto Date</h3>
                <p class="member-role">Head Bartender</p>
                <p class="member-description">Meet Makoto Date, our Head Bartender at Alps Coffee Shop. With his vast knowledge of coffee and exceptional mixology skills, he creates delightful and unique concoctions that leave our customers wanting more. Passionate and dedicated, Makoto ensures that every cup of coffee is a masterpiece.</p>
                <div class="social-icons team-social-icons">
                    <a href="#" class="social-icon" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon" title="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon" title="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="member">
            <img src="gambar/kashiwagi.png" alt="Osamu Kashiwagi">
            <div class="member-info">
                <h3 class="member-name">Osamu Kashiwagi</h3>
                <p class="member-role">Senior Bartender</p>
                <p class="member-description">Osamu Kashiwagi is our Senior Bartender, responsible for curating the perfect coffee experience for our customers. With years of experience and a meticulous attention to detail, he crafts exquisite coffee creations that awaken the senses. Osamu's expertise make him an invaluable member of our team.</p>
                <p></p>
                <div class="social-icons team-social-icons">
                    <a href="#" class="social-icon" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon" title="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon" title="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="member">
            <img src="gambar/reina.png" alt="Reina">
            <div class="member-info">
                <h3 class="member-name">Reina</h3>
                <p class="member-role">Junior Bartender</p>
                <p class="member-description">Meet Reina, our talented Junior Bartender at Alps Coffee Shop. Eager to learn and passionate about coffee, Reina assists in brewing and serving the finest coffee to our customers. With her warm smile and friendly demeanor, she creates a welcoming atmosphere that adds to the overall experience at our cafe.</p>
                <div class="social-icons team-social-icons">
                    <a href="#" class="social-icon" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon" title="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon" title="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-team">
    <div class="member">
        <img src="gambar/nanoha.png" alt="Jane">
        <div class="member-info">
            <h3 class="member-name">Nanoha Mukoda</h3>
            <p class="member-role">Chef</p>
            <p class="member-description"> She brings a unique and unforgettable taste to Alps Coffee Shop. </p>
            <div class="social-icons team-social-icons">
                <a href="#" class="social-icon" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon" title="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon" title="Instagram"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <div class="member">
        <img src="gambar/omellete.png" alt="Mike">
        <div class="member-info">
            <h3 class="member-name">Omellete</h3>
            <p class="member-role">Art Director</p>
            <p class="member-description">His artistic vision make him an invaluable asset to our team.</p>
            <div class="social-icons team-social-icons">
                <a href="#" class="social-icon" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon" title="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon" title="Instagram"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <div class="member">
        <img src="gambar/mashiko.png" alt="John">
        <div class="member-info">
        <h3 class="member-name">Mashiko</h3>
            <p class="member-role">Security Guard</p>
            <p class="member-description">Mashiko ensures the safety and security of Alps Coffee Shop and its patrons. </p>
            <div class="social-icons team-social-icons">
                <a href="#" class="social-icon" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon" title="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon" title="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
        </div>
    </div>
    <div class="member">
        <img src="gambar/issei.png" alt="Mike">
        <div class="member-info">
        <h3 class="member-name">Issei Hoshino</h3>
            <p class="member-role">Advertisement</p>
            <p class="member-description">Issei's ability to captivate audiences and drive business growth makes him an integral part of our team.</p>
            <div class="social-icons team-social-icons">
                <a href="#" class="social-icon" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon" title="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon" title="Instagram"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <div class="member">
        <img src="gambar/fumiya.png" alt="John">
        <div class="member-info">
            <h3 class="member-name">Fumiya Sugiura</h3>
            <p class="member-role">Chef Assistant</p>
            <p class="member-description">Fumiya's passion for food and commitment to quality make him an invaluable part of our team.</p>
            <div class="social-icons team-social-icons">
                <a href="#" class="social-icon" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon" title="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon" title="Instagram"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>


    </div></div></div></div>
    </div>
    </div>
    </div>
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
</script>
</footer>
</body>

</html>