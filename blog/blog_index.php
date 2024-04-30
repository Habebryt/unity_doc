<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UnityDoc Blog</title>
  <script src="https://kit.fontawesome.com/6b3bb32019.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="blog.css">
</head>

<body onload="updateYear()">
  <!-- Header -->
  <header>
    <nav>
      <div class="logo">
        <a href="#">UnityDocs Blog</a>
      </div>
      <ul class="nav-links">
        <li><a href="#hero">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#blog">Blog</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="../index.php"><i class="fa-solid fa-right-from-bracket"></i> UnityDoc</a></li>
      </ul>
      <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
    </nav>
  </header>

  <!-- Hero Section -->
  <section id="hero">
    <div class="hero-content">
      <h1 class="animate-text">Welcome to Our Corporate Mind</h1>
      <p class="animate-text">Explore insights, trends, and strategies for business success.</p>
      <a href="#blog" class="btn animate-text">View Our Blog</a>
    </div>
    <div class="hero-image">
      <img src="../assets/statics/images/index/Screenshot 2024-04-01 at 10.21.03.png" alt="Hero Image">
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="section-parallax">
    <div class="section-content animate-on-scroll">
      <h2>About Us</h2>
      <p>We are a leading corporate organization dedicated to providing valuable insights and knowledge to help
        businesses thrive. Our blog is a platform for sharing expert opinions, industry trends, and innovative
        strategies to drive growth and success.</p>
    </div>
  </section>

  <!-- Blog Section -->
  <section id="blog">
    <h2>Latest Blog Posts</h2>
    <div class="blog-posts">
      <div class="blog-post animate-on-scroll">
        <div class="blog-img">
          <img src="../assets/statics/images/index/easeofcontrol.png" alt="Blog Post Image">
        </div>
        <div class="blog-content">
          <h3>The Future of Digital Transformation</h3>
          <p>Explore the latest trends and technologies shaping the digital landscape and how businesses can leverage
            them for a competitive edge.</p>
          <a href="#" class="read-more">Read More</a>
        </div>
      </div>
      <div class="blog-post animate-on-scroll">
        <div class="blog-img">
          <img src="../assets/statics/images/index/sharing.png" alt="Blog Post Image">
        </div>
        <div class="blog-content">
          <h3>Unlocking the Power of Data Analytics</h3>
          <p>Discover how data analytics can drive better decision-making and uncover valuable insights for your
            business growth.</p>
          <a href="#" class="read-more">Read More</a>
        </div>
      </div>
      <div class="blog-post animate-on-scroll">
        <div class="blog-img">
          <img src="../assets/statics/images/index/sharing.png" alt="Blog Post Image">
        </div>
        <div class="blog-content">
          <h3>Effective Leadership in a Remote Workforce</h3>
          <p>Learn strategies and best practices for leading and managing a remote team to foster productivity and
            collaboration.</p>
          <a href="#" class="read-more">Read More</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="section-parallax">
    <div class="section-content animate-on-scroll">
      <h2>Get in Touch</h2>
      <p>Have a question or want to collaborate? Reach out to us, and our team will be happy to assist you.</p>
      <form>
        <div class="form-group">
          <input type="text" id="name" placeholder="Your Name" required>
        </div>
        <div class="form-group">
          <input type="email" id="email" placeholder="Your Email" required>
        </div>
        <div class="form-group">
          <textarea id="message" placeholder="Your Message" required></textarea>
        </div>
        <button type="submit" class="btn">Submit</button>
      </form>
    </div>
  </section>
  <button class="sticky-button">
    <a href="../access.php"><i class="fa-solid fa-file fa-beat"></i></a>
    <span>Getting Started</span>
    </button>

  <!-- Footer -->
  <footer>
    <div class="social-links">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-linkedin-in"></i></a>
    </div>
    <p>&copy; <span id="year"></span> Corporate Blog. All rights reserved.</p>
  </footer>

  <script src="..assets/statics/js/jquery-3.7.1.js"></script>
  <script src="blog.js"></script>
  <script>
    function updateYear() {
            var currentYear = new Date().getFullYear();
            var yearSpan = document.querySelector("#year");
            yearSpan.textContent = "UnityDocs "+ currentYear;
        }
  </script>
</body>

</html>