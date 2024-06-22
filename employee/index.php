<?php
ini_set("display_errors", "1");
session_start();

require_once "classes/User.php";

$allOrgs = new User;
$orgs = $allOrgs->getOrgs();



require_once "partials/accessheader.php";
?>

<main class="cd__main">
    <div class="main">
        <!-- Signup Form  Starts Here -->
        <div class="container a-container" id="a-container">
            <form class="form" id="a-form" method="post" action="process/register_process.php">
                <h2 class="form_title title">Create Account</h2>
                <input class="form__input" type="text" name="firstname" id="firstname" placeholder="First Name" required>
                <input class="form__input" type="text" name="lastname" id="lastname" placeholder="Last Name" required>
                <input class="form__input" type="text" name="user_email" id="user_email" placeholder="Email" required>
                <select name="user_org" id="user_org" class="form__select" required>
                    <option value="" hidden>Select Company</option>
                    <?php foreach ($orgs as $org) { ?>
                        <option class="form__option" value="<?php echo $org['idorganization']; ?>"><?php echo $org['org_name']; ?></option>
                    <?php } ?>
                </select>
                <div class="password-toggle">
                    <input class="form__input" type="password" name="user_password" id="password" placeholder="Password" required>
                    <button type="button" id="togglePassword">
                        <i class="fa fa-eye-slash" id="togglePasswordIcon"></i>
                    </button>
                </div>
                <input type="submit" class="form__button button submit" value="REGISTER">
                <div id="form-message"></div>
            </form>
        </div>


        <!-- Signup Form  Ends Here -->

        <!-- <?php
                // $password = 1234;
                // $hashpassword = password_hash($password, PASSWORD_DEFAULT);
                // echo $hashpassword;
                ?> -->

        <!-- Login Form  Starts Here -->
        <div class="container b-container" id="b-container">
            <form class="form" id="b-form" method="post" action="process/loginhandler.php">
                <h2 class="form_title title">Sign in to UnityDocs</h2>
                <input class="form__input" type="text" placeholder="Email" name="user_email" id="user_email">
                <input class="form__input" type="password" placeholder="Password" name="user_password" id="user_password"><a class="form__link">Forgot your password?</a>
                <input type="submit" class="form__button button submit" name="sub-msg" value="LOGIN">
            </form>
        </div>
        <!-- Login Form  Ends Here -->

        <div class="switch" id="switch-cnt">
            <div class="switch__circle"></div>
            <div class="switch__circle switch__circle--t"></div>
            <div class="switch__container" id="switch-c1">
                <?php if (isset($_SESSION['user_errormsg'])) : ?>
                    <div class="user_errormsg" style="color: red;"><?php echo $_SESSION['user_errormsg']; ?></div>
                    <?php unset($_SESSION['user_errormsg']); ?>
                <?php endif; ?>
                <h2 class="switch__title title">Welcome Back !</h2>
                <p class="switch__description description">To keep connected with us please login with your personal info</p>
                <button class="switch__button button switch-btn">SIGN IN</button>
            </div>
            <div class="switch__container is-hidden" id="switch-c2">
                <h2 class="switch__title title">Hello Friend !</h2>
                <p class="switch__description description">Enter your personal details and start document management with us</p>
                <input type="submit" class="switch__button button switch-btn" value="Sign Up">
            </div>
        </div>
    </div>
</main>


<?php
require_once "partials/accessfooter.php";

?>