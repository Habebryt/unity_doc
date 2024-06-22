<?php
ini_set("display_errors", "1");
session_start();

print_r($_SESSION);

require_once "partials/accessheader.php";
?>

<main class="cd__main">
    <div class="main">
        <!-- Signup Form  Starts Here -->
        <div class="container a-container" id="a-container">
            <form class="form" id="a-form" method="post" action="process/register_process.php">
                <h2 class="form_title title">Create Employer Account</h2>
                <input class="form__input" type="text" name="firstname" placeholder="First Name">
                <input class="form__input" type="text" name="lastname" placeholder="Last Name">
                <input class="form__input" type="text" name="user_email" placeholder="Email">
                <input class="form__input" type="text" name="user_org" placeholder="Your Organization">
                <div class="password-toggle">
                    <input class="form__input" type="password" name="user_password" id="password" placeholder="Password">
                    <button type="button" id="togglePassword">
                        <span class="material-symbols-outlined" id="togglePassword"> 
                        </span>
                    </button>
                </div>

                <input type="submit" class="form__button button submit" value="SIGN UP">
            </form>
        </div>

        <!-- Signup Form  Ends Here -->

        <!-- Login Form  Starts Here -->
        <div class="container b-container" id="b-container">
            <form class="form" id="b-form" method="post" action="process/loginhandler.php">
                <h2 class="form_title title">Sign in to UnityDocs</h2>
                <input class="form__input" type="text" placeholder="Email" name="admin_email" id="user_email">
                <input class="form__input" type="password" placeholder="Password" name="admin_password" id="user_password"><a class="form__link">Forgot your password?</a>
                <input type="submit" class="form__button button submit" name="sub-msg" value="LOGIN">
            </form>
        </div>
        <!-- Login Form  Ends Here -->

        <div class="switch" id="switch-cnt">
            <div class="switch__circle"></div>
            <div class="switch__circle switch__circle--t"></div>
            <div class="switch__container" id="switch-c1">
                <?php if (isset($_SESSION['admin_errormsg'])) : ?>
                    <div class="admin_errormsg"><?php echo $_SESSION['admin_errormsg']; ?></div>
                    <?php unset($_SESSION['admin_errormsg']); ?>
                <?php endif; ?>
                <h2 class="switch__title title">Welcome Back !</h2>
                <p class="switch__description description">To keep connected with your Team please login with your Admin Details</p>
                <button class="switch__button button switch-btn">SIGN IN</button>
            </div>
            <div class="switch__container is-hidden" id="switch-c2">
                <h2 class="switch__title title">Hello Employer !</h2>
                <p class="switch__description description">Enter your personal details and start document management with us</p>
                <input type="submit" class="switch__button button switch-btn" value="Sign Up">
            </div>
        </div>
    </div>
</main>


<?php
require_once "partials/accessfooter.php";

?>