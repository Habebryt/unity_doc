<?php
ini_set("display_errors", "1");
session_start();
require_once "partials/header.php";
require_once "classes/User.php";

// $newUser = new User;
// $user = $newUser->registerUser('habeeb', 'bright', 'habeeb@gmail.com', 'habeeb1234');
// echo $user;

echo "<pre>";
print_r($_SESSION);
echo "</pre>";
?>



<div class="row justify-content-center">
    <div class="col-md-6">

        <?php
        if (isset($_SESSION['user_errormsg']) && is_array($_SESSION['user_errormsg']) && count($_SESSION['user_errormsg']) > 0) {
            // echo "<div class='alert alert-danger'>Registration failed. Please correct the following errors:</div>";
            foreach ($_SESSION['user_errormsg'] as $error) {
                echo "<div class='alert alert-danger'>" . $error . "</div>";
            }
            unset($_SESSION['user_errormsg']);
        }
        ?>
        <h3 class="text-center">Welcome to UnityDocs Registration Form</h3>
        <form id="registrationForm" method="post" enctype="multipart/form-data" action="process/register_process.php">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstname" placeholder="Enter First Name">
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="user_email" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="user_password" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label for="confirm">Confirm Password</label>
                <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirm Password">
            </div>
            <input type="submit" name="register" id="register" class="btn btn-primary btn-block" value="Register">
            <!-- Response Messages -->
            <div id="res"></div>
        </form>
    </div>
</div>
<?php require_once "partials/copyright.php"; ?>
<script src="assets/statics/js/jquery-3.7.1.js"></script>
<script type="text/javascript">
    $(function() {
        // Update Year script
        function updateYear() {
            var currentYear = new Date().getFullYear();
            var yearSpan = document.querySelector("span a");
            yearSpan.textContent = "UnityDocs " + currentYear;
        }
    });
</script>
</body>

</html>