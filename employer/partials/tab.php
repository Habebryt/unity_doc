<?php
require_once "partials/header.php";
require_once "classes/User.php";
require_once "classes/Utilities.php";


$id = $_SESSION['orgadminonline'];

$orgEmail = $id['org_admin_email'];
print_r($orgEmail);

$user = new User;
$thisUser = $user->getAdmin($orgEmail);

print_r($thisUser);

?>

<div class="topbar">
  <div class="toggle">
    <ion-icon name="menu-outline"></ion-icon>
  </div>
  <!-- <div class="search">
    <label>
      <input type="text" placeholder="Search here" />
    </label>
  </div> -->
  <div class="userDetails">
    <div class="userName">
    <h2 class="lead"><?php echo $thisUser['firstname'] . " " . Utilities::getFirstLetterOfLastName($thisUser['lastname']) ?></h2>
    </div>
    <div class="user">
      <?php if (isset($thisUser['org_admin_image'])) { ?>
        <img src="uploads/<?php echo $thisUser['org_admin_image'] ?>" alt="" />
      <?php
      } else { ?>
        <img src="uploads/<?php echo $thisUser['org_admin_image'] ?>" alt="default image" />
      <?php  } ?>
    </div>
  </div>
</div>