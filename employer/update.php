<?php
session_start();
require_once "partials/header.php";
?>
<!-- ========================= Main ==================== -->
<div class="main">
  <!--  =============================TopBar ============================= -->
  <?php
  require_once "partials/tab.php";
  ?>
  <!--  =============================TopBar Ends Here ============================= -->
  <!-- ================ Update Details List ================= -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Notifications</h5>
            <button class="btn btn-sm btn-outline-secondary">Mark all as Read</button>
          </div>
          <div class="card-body">
            <p class="card-text">You have 6 notifications to go through</p>
            <h6 class="mt-4 mb-3">Today</h6>
            <div class="notification">
              <div class="media">
                <img src="https://via.placeholder.com/50" class="mr-3 rounded-circle" alt="Notification Image">
                <div class="media-body">
                  <h6 class="mt-0">Drone Survey Results</h6>
                  Your drone survey results are in, and we are uploading them to your dashboard
                  <a href="#" class="btn btn-sm btn-primary float-right">View</a>
                </div>
              </div>
            </div>
            <!-- Add more notification items here -->
            <h6 class="mt-4 mb-3">Yesterday</h6>
            <!-- Add notification items for yesterday here -->
            <h6 class="mt-4 mb-3">30 Jun</h6>
            <!-- Add notification items for 30 Jun here -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--++++++++++Footer+++++++++++++++++++++  -->

  <?php
  require_once "partials/footer.php";
  ?>