<!DOCTYPE html>
<html>
<head>
    <title>Dashboard | Cafe Alps</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Custom styles here */
        body {
            margin: 0;
            padding: 0;
            background-color: #f3f2ee;
            font-family: 'Roboto', Arial, sans-serif;
        }
   
    .fade-in {
      animation: fadeIn 0.4s ease-in;
    }

    @keyframes fadeIn {
      0% { opacity: 0; }
      100% { opacity: 1; }
    }
.dashboard {
    margin-left: 420px;
}
    </style>
</head>
<body>
    <!-- Main Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
           <!-- Sidebar -->
<aside class="sidebar">
    <div class="logo">
        <img src="gambar/Logo.png" alt="Cafe Alps Logo" width="500" height="200">
    </div>
    <center><ul>
        <li><a href="dashboard.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="review.php">Review</a></li>
    </ul></center>
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
        <div class= dashboard>
        <img id="welcomeImage" src="gambar/welcome1.png" alt="welcome" width="100%" height="900">
            <!-- Content Area -->
            <main class="main-content">
            <div class="summary">
    <img src="https://img.freepik.com/premium-photo/hot-steaming-coffee-old-wooden-table-with-coffee-beans-manual-coffee-grinder-vertical-view_193819-3492.jpg?w=360" alt="Coffee">
    <div class="summary-content">
        <h2>A Few Words About Our Cafe</h2>
        <p>Cafe Alps is a warm and enjoyable cafe with branches in several cities in Japan, including Kamurocho, Sotenbori, Nagasugai, Tsukimino, and Kineicho. We bring a unique experience in enjoying delicious coffee and food in a cozy and friendly atmosphere.</p>
    <p>Our motto is "Indulge in warmth, delight in flavour". We are committed to providing a warm and enjoyable atmosphere to each of our customers. We invite you to visit one of the Cafe Alps branches in the mentioned cities and experience the finest coffee delight from Cafe Alps.</p>
    <a href="about.php" class="btn">More About Us</a>
    </div>
</div>
<section class="our-team">
<div class="container">
  <h2>Our Team</h2>
  <div class="team-member">
    <div class="member">
      <img src="gambar/date.png" alt="Bartender 1">
      <h3>Makoto Date</h3>
      <p>Head Bartender</p>
      <div class="description">
        <p>Meet Makoto Date, our Head Bartender at Alps Coffee Shop. </p>
      </div>
    </div>
    <div class="member">
      <img src="gambar/kashiwagi.png" alt="Bartender 2">
      <h3>Osamu Kashiwagi</h3>
      <p>Senior Bartender</p>
      <div class="description">
        <p>Osamu Kashiwagi is our Senior Bartender, responsible for curating the perfect coffee experience for our customers. </p>
      </div>
    </div>
    <div class="member">
      <img src="gambar/reina.png" alt="Bartender 3">
      <h3>Reina</h3>
      <p>Junior Bartender</p>
      <div class="description">
        <p>Meet Reina, our talented Junior Bartender at Alps Coffee Shop. </p>
      </div>
    </div>
  </div>
        <center><a href="about.php" class="btn">Who Are We?</a></center>
    </div>
</section>
<div class="special-menu">
    <h2>Special Menu</h2>
    <div class="row">
        <div class="col-lg-6">
            <a>
                <img src="gambar/latte.png" alt="Special Menu Item 1">
            </a>
            <h3>Blended Coffee <i class="bi bi-chef-hat"></i></h3>
            <p>A blend of Mandheling and Brazilian beans with a Colombian base</p>
            <div class="item">
                <h4>Price:</h4>
                <span>¥500</span>
            </div>
        </div>
        <div class="col-lg-6">
                <img src="gambar/sandwichset.jpg" alt="Special Menu Item 2">
            <h3>Sandwich Set </h3>
            <p>This set offers a chicken, egg, and lettuce sandwich on white bread.</p>
            <div class="item">
                <h4>Price:</h4>
                <span>¥950</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
                <img src="gambar/bluemountaincoffee.png" alt="Special Menu Item 2">
            <h3>Blue Mountain</h3>
            <p>This is the ultimate cup of coffee, made with top-grade coffee beans.</p>
            <div class="item">
                <h4>Price:</h4>
                <span>¥1000</span>
            </div>
        </div>
        <div class="col-lg-6">
                <img src="gambar/curry.jpg" alt="Special Menu Item 2">
            <h3>Original Beef Curry Set</h3>
            <p>This beef curry is our special house recipe.</p>
            <div class="item">
                <h4>Price:</h4>
                <span>¥1500</span>
            </div>
        </div>
    </div>
    <a href="login.php" class="btn btn-primary">Login to See The Full Menu Today!</a>
</div>
<section class="review">
  <h2>Our Top Customer Reviews</h2>
  <div class="review-item">
    <div class="customer-image">
      <img src="gambar/kiryu.png" alt="Customer 1">
    </div>
    <div class="review-content">
      <div class="customer-name">Kazuma Kiryu</div>
      <div class="customer-occupation">Dragon of Dojima</div>
      <div class="review-text">
        <p>Amazing coffee and pastries! Cafe Alps never fails to make my day. The atmosphere is cozy and inviting, just like the warmth of my hometown. Highly recommended!</p>
      </div>
      <div class="review-rating">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
    </div>
  </div>
  <div class="review-item">
    <div class="customer-image">
      <img src="gambar/majima.png" alt="Customer 2">
    </div>
    <div class="review-content">
      <div class="customer-name">Goro Majima</div>
      <div class="customer-occupation">Mad Dog of Shimano</div>
      <div class="review-text">
        <p>This place is the real deal, pal! The Neapolitan dish here packs a punch, just like a good brawl. The staff is as friendly and attentive as an old friend. I'll keep coming back for more!</p>
      </div>
      <div class="review-rating">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
    </div>
  </div>
  <div class="review-item">
    <div class="customer-image">
      <img src="gambar/akiyama.png" alt="Customer 4">
    </div>
    <div class="review-content">
      <div class="customer-name">Shun Akiyama</div>
      <div class="customer-occupation">The Lifeline of Kamurocho</div>
      <div class="review-text">
        <p>Delicious coffee and a cozy atmosphere. Cafe Alps is a perfect place to relax and recharge. A hidden gem in the bustling city. I can't recommend it enough!</p>
      </div>
      <div class="review-rating">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
    </div>
  </div>
  <div class="review-item">
    <div class="customer-image">
      <img src="gambar/ichiban.png" alt="Customer 5">
    </div>
    <div class="review-content">
      <div class="customer-name">Ichiban Kasuga</div>
      <div class="customer-occupation">Hero Like No Other</div>
      <div class="review-text">
        <p>Cafe Alps holds a special place in my heart. The coffee is like a warm hug, and the pastries are simply divine. It's the perfect spot to reflect on my crazy adventures in the city.</p>
      </div>
      <div class="review-rating">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
    </div>
  </div>
</section>
            </main>
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

  function fadeInImage() {
      var image = document.getElementById("welcomeImage");
      image.classList.add("fade-in");
    }

    window.onload = fadeInImage;
</script>
</footer>
</body>
</html>