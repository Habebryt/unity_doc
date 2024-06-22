<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UnityDocs</title>

  <!-- ======= Styles ====== -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
  <link rel="stylesheet" href="assets/statics/css/style.css" />
  <link rel="stylesheet" href="assets/statics/css/bootstrap/css/bootstrap-grid.css" />
  <link rel="stylesheet" href="assets/statics/css/bootstrap/css/bootstrap.css" />
</head>

<body>
  <!-- =============== Navigation ================ -->
  <div class="container-fluid">
    <div class="navigation">
      <ul>
        <li>
          <nav class="navbar">
            <div class="container-fluid">
              <img src="assets/statics/images/logo/unitydocsicon.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
              <h2 class="navbar-brand d-flex justify-content-evenly align-items-center" href="#">
                UnityDocs
              </h2>
            </div>
          </nav>
        </li>

        <li>
          <a href="dashboard.php">
            <span class="icon">
              <ion-icon name="home-outline"></ion-icon>
            </span>
            <span class="title">Dashboard</span>
          </a>
        </li>

        <li>
          <a href="document.php">
            <span class="icon">
              <ion-icon name="document-text-outline"></ion-icon>
            </span>
            <span class="title">Documents</span>
          </a>
        </li>

        <!-- <li>
          <a href="update.php" data-updates="10">
            <span class="icon">
              <ion-icon name="notifications-circle-outline"></ion-icon>
            </span>
            <span class="updates">10</span>
            <span class="title">Updates</span>
          </a>
        </li> -->

        <li>
          <a href="organization.php">
            <span class="icon">
              <ion-icon name="briefcase-outline"></ion-icon>
            </span>
            <span class="title">Organization</span>
          </a>
        </li>

        <li>
          <a href="support.php">
            <span class="icon">
              <ion-icon name="settings-outline"></ion-icon>
            </span>
            <span class="title">Support</span>
          </a>
        </li>

        <li>
          <a href="profile.php">
            <span class="icon">
              <ion-icon name="people-circle-outline"></ion-icon>
            </span>
            <span class="title">Profile</span>
          </a>
        </li>

        <li>
          <a href="#" onclick="confirmLogout()">
            <span class="icon">
              <ion-icon name="log-out-outline"></ion-icon>
            </span>
            <span class="title">Logout</span>
          </a>
        </li>
      </ul>
    </div>