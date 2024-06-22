<?php
ini_set("display_errors", "1");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/statics/css/style.css">
    <link rel="stylesheet" href="assets/statics/css/bootstrap/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/6b3bb32019.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>UnityDocs</title>

    <style>
        a {
            text-decoration: none !important;
        }
    </style>
</head>

<body onload="updateYear()">
    <div class="container-fluid">
        <!-- navigation section starts here -->
        <section class="container-md">
            <div class="row">
                <div class="col-md-12">
                    <header class="header">
                        <nav class="header-nav">
                            <div class="logo d-flex justify-content-center align-items-center">
                                <a href="index.php"><img src="employee/assets/statics/images/logo/unitydoclogo.png" alt=""></a>
                            </div>
                            <ul class="nav-links">
                                <li><a href="index.php" class="">Home</a></li>
                                <!-- <li><a href="about.php">About</a></li> -->
                                <li><a href="#features">Features</a></li>
                                <li><a href="#feedback">Feedback</a></li>
                            </ul>
                            <div class="nav-buttons">
                                <button class="sign-in get-started btn-primary">Get Started</button>
                                <button class="sign-in login btn-info">Login</button>
                            </div>
                            <div class="burger">
                                <div class="line1"></div>
                                <div class="line2"></div>
                                <div class="line3"></div>
                            </div>
                        </nav>
                        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title" id="loginModalLabel">Login as:</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex justify-content-center">
                                            <button type="button" class="btn btn-primary me-3" onclick="redirectToEmployerLogin()">Employer</button>
                                            <button type="button" class="btn btn-primary" onclick="redirectToEmployeeLogin()">Employee</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                </div>
            </div>

        </section>