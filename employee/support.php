<?php
require_once "partials/header.php";
session_start();

require_once "employee_guard.php";
require_once "classes/Document.php";
require_once "classes/User.php";
require_once "classes/Utilities.php";

$id = $_SESSION['useronline'];

$userId = $id['idusers'];

$user = new User;
$thisUser = $user->getUser($userId);


?>
<!-- ========================= Main ==================== -->
<div class="main">
  <!--  =============================TopBar ============================= -->
  <?php
  require_once "partials/tab.php";
  ?>
  <!--  =============================TopBar Ends Here ============================= -->
  <!-- ================ Support Details List ================= -->
  <div class="container mt-3">
    <div class="row justify-content-around">
      <div class="col-md-8">
        <div class="text-center mb-4">
          <span class="btn badge badge-pill badge-dark text-bg-dark">For Support online</span>
          <span class="btn badge badge-pill badge-dark ml-2 text-bg-dark">Join us</span>
        </div>
        <h1 class="text-center text-dark mb-4">Lets Have a Chat 👋</h1>
        <p class="text-center text-secondary mb-5">Questions about UnityDocs, or just want to say hello? We're here to help</p>
        <form id="supportForm">
          <!-- Feedback response div -->
          <div id="responseMessage" class="mt-3 text-center"></div>
          <div class="form-row d-flex justify-content-evenly">
            <div class="col-md-6 mb-3">
              <label for="firstName" class="text-dark">First name</label>
              <input type="text" class="form-control" name="firstname" id="firstName" placeholder="First name" value="<?php echo $thisUser['firstname'] ?>" readonly>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName" class="text-dark">Last name</label>
              <input type="text" class="form-control" name="lastname" id="lastName" placeholder="Last name" value="<?php echo $thisUser['lastname'] ?>" readonly>
            </div>
          </div>
          <div class="form-row d-flex justify-content-between">
            <div class="col-md-6 mb-3">
              <label for="email" class="text-dark">Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $thisUser['user_email'] ?>" readonly>
            </div>
            <div class="col-md-6 mb-3">
              <label for="subject" class="text-dark">Subject</label>
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group mb-4">
              <label for="message" class="text-dark">Message</label>
              <textarea class="form-control" name="message" id="message" placeholder="Hey, I have some issues activating my account...👨‍💻"></textarea>
            </div>
          </div>
          <div class="text-center">
            <!-- <input type="number" value="1" hidden name="userStatus"> -->
            <button type="submit" class="btn btn-primary btn-lg col-md-6">Send message</button>
          </div>
        </form>
        <!-- Loading bar -->
        <div id="loadingBar" class="progress mt-3" style="display:none;">
          <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%;"></div>
        </div>
      </div>
    </div>
  </div>
  <!--++++++++++Footer+++++++++++++++++++++  -->

  <?php
  require_once "partials/footer.php";
  ?>