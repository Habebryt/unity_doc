<?php
ini_set("display_errors", "1");
require_once "partials/header.php";
?>

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <?php if (isset($_SESSION['admin_errormsg'])) : ?>
                        <div class="error-message"><?php echo $_SESSION['admin_errormsg']; ?></div>
                        <?php unset($_SESSION['admin_errormsg']); ?>
                    <?php endif; ?>
                    <h2 class="form-title">Welcome Back</h2>
                    <form action="process/login_process.php" method="post">
                        <div class="mb-3">
                            <label for="user_email" class="form-label">Email</label>
                            <input type="email" name="user_email" id="user_email" placeholder="Enter your Email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="user_password" class="form-label">Password</label>
                            <input type="password" name="user_password" id="user_password" placeholder="Enter your password" class="form-control">
                        </div>
                        <div class="text-center">
                            <input type="submit" name="sub_msg" id="sub_msg" value="Login" class="btn btn-primary col-md-12">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php
require_once "partials/copyright.php";
?>

<script type="text/javascript">
    // Update Year script
    function updateYear() {
        var currentYear = new Date().getFullYear();
        var yearSpan = document.querySelector("span a");
        yearSpan.textContent = "UnityDocs " + currentYear;
    }
</script>
</body>

</html>