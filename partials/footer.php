<!-- footer section starts here -->
<section class="footer container">
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="row footer-top">
                <div class="col-sm-12 col-md-12">
                    <h2><a href="index.html" class="d-flex text-sm-center">UnityDocs.</a></h2>
                </div>
            </div>
            <div class="row footer-top">
                <div class="col-sm-12 col-md-12">
                    <p class="col-sm-12 col-md-12 d-flex">UnityDoc is a comprehensive document management platform designed to facilitate seamless
                        collaboration and information sharing among organizations.</p>
                </div>
            </div>
            <div class="row footer-top">
                <div class="col-sm-6 d-flex justify-content-around align-content-md-center">
                    <a href="">
                        <i class="fa-brands fa-square-facebook"></i>
                    </a>
                    <a href="">
                        <i class="fa-brands fa-square-instagram"></i>
                    </a>
                    <a href="">
                        <i class="fa-brands fa-square-x-twitter"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-8 footer-body">
            <div class="row d-flex footer-top">
                <div class="col-sm-3 col-md-3">
                    <h3 class="footer-title">Products</h3>
                    <ul class="footer-ul col-sm-3">
                        <li><a href="">Pricing</a></li>
                        <li><a href="">Enterprise</a></li>
                        <li><a href="">Integration</a></li>
                        <li><a href="">What's New</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3">
                    <h3 class="footer-title">Resources</h3>
                    <ul class="footer-ul">
                        <li><a href="">Blog</a></li>
                        <li><a href="">Help Center</a></li>
                        <li><a href="">Guidelines</a></li>
                        <li><a href="">Products</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3">
                    <h3 class="footer-title">Company</h3>
                    <ul class="footer-ul">
                        <li><a href="">About Us</a></li>
                        <li><a href="">Career</a></li>
                        <li><a href="">Press Kit</a></li>
                        <li><a href="">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3">
                    <h3 class="footer-title">Helps</h3>
                    <ul class="footer-ul">
                        <li><a href="">Talk to Support</a></li>
                        <li><a href="">Api Docs</a></li>
                        <li><a href="">System Status</a></li>
                        <li><a href="">Support Docs</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- footer section ends here -->

<!-- copyright section starts here -->
<?php require_once "partials/copyright.php"; ?>
<!-- copyright section ends here -->
</div>
<script src="assets/statics/js/jquery-3.7.1.js"></script>
<script src="assets/statics/css/bootstrap/js/bootstrap.bundle.js"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
  const burger = document.querySelector('.burger');
  const navLinks = document.querySelector('.nav-links');

  // Function to handle burger click
  burger.addEventListener('click', function() {
    burger.classList.toggle('active');
    navLinks.classList.toggle('active');
  });
});

</script>
<script src="assets/statics/js/nav.js"></script>
<script src="assets/statics/js/hero.js"></script>
<script src="assets/statics/js/review.js"></script>
<script>
    function updateYear() {
        var currentYear = new Date().getFullYear();
        var yearSpan = document.querySelector("span a");
        yearSpan.textContent = "UnityDocs " + currentYear;
    }
</script>
<script>
    function redirectToEmployerLogin() {
    window.location.href = "employer/index.php";
  }

  function redirectToEmployeeLogin() {
    window.location.href = "employee/index.php";
  }

  // Add click event listener to the login button
  var loginButton = document.querySelector(".login");
  loginButton.addEventListener("click", function(event) {
    event.preventDefault(); // Prevent the default link behavior
    $('#loginModal').modal('show'); // Show the modal
  });
</script>
</body>

</html>