<?php
ini_set("display_errors", "1");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UnityDocs Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-container {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="image-container">
                    <img src="assets/statics/images/logo/unitydoclogo.png" alt="Login Image" class="img-fluid">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-container">
                    <?php if (isset($_SESSION['user_errormsg'])) : ?>
                        <div class="error-message"><?php echo $_SESSION['user_errormsg']; ?></div>
                        <?php unset($_SESSION['user_errormsg']); ?>
                    <?php endif; ?>
                    <h2 class="form-title">Welcome Back</h2>
                    <form action="process/loginhandler.php" method="post">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>