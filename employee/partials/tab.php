<?php
require_once "partials/header.php";
require_once "classes/User.php";
require_once "classes/Utilities.php";

$id = $_SESSION['useronline'];

$userId = $id['idusers'];

$user = new User;
$thisUser = $user->getUser($userId);

?>

<div class="topbar">
  <div class="toggle">
    <ion-icon name="menu-outline"></ion-icon>
  </div>
  <div class="search">

  </div>
  <div class="userDetails">
    <div class="userName">
      <h2 class="lead"><?php echo $thisUser['firstname'] . " " . Utilities::getFirstLetterOfLastName($thisUser['lastname']) ?></h2>
    </div>
    <div class="user"> <a href="profile.php">
        <?php if (isset($thisUser['profile_image'])) { ?>
          <img src="uploads/<?php echo $thisUser['profile_image'] ?>" alt="" />
        <?php
        } else { ?>
          <img src="uploads/<?php echo $thisUser['default_image'] ?>" alt="default image" />
        <?php  } ?>
      </a>
    </div>
  </div>
</div>

<div id="notifications"></div>
<!-- <input type="text" placeholder="Search here" /> -->