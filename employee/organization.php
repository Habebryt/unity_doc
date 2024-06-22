<?php
session_start();
ini_set("display_errors", "1");
require_once "partials/header.php";
require_once "classes/Team.php";


//$members = $teams->getTeamMembers();
?>

<!-- ========================= Main ==================== -->
<div class="main">
  <!--  =============================TopBar ============================= -->
  <?php
  require_once "partials/tab.php";

  $user = $_SESSION['useronline'];

  $userOrg = $user['user_org'];

  $teams = new Team;
  $members = $teams->getTeamMembers($userOrg);
  ?>
  <!--  =============================TopBar Ends Here ============================= -->
  <!-- ================ Organization Details List ================= -->
  <div class="container">
    <div class="row justify-content-center mt-4">
      <div class="col-md-10">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h3>Organization Members & Teams</h3>
          <div>
            <button class="btn btn-primary mr-2">Invite Member</button>
            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addTeam">Add Team</button>
          </div>
        </div>
        <div class="d-flex flex-wrap">
          <?php foreach ($members as $member) { ?>
            <div class="card mx-2 my-2" style="width: 18rem;">
              <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                  <img src="uploads/<?php echo $member['profile_image']; ?>" class="rounded-circle me-3" alt="User Avatar" style="width: 60px; height: 60px;">
                  <div>
                    <h5 class="card-title mb-0"><?php echo $member['firstname'] . " " . $member['lastname']; ?></h5>
                    <?php if (isset($member['user_role'])) { ?>
                      <p class="card-text mb-0"><small class="text-muted btn badge badge-pill badge-dark text-bg-secondary"><?php echo $member['user_role']; ?></small></p>
                    <?php } ?>
                  </div>
                </div>
                <ul class="list-unstyled mb-0">
                  <li class="mb-1"><i class="bi bi-envelope me-2"></i><?php echo $member['user_email']; ?></li>
                  <?php if (isset($member[''])) { ?>
                    <li class="mb-1"><i class="bi bi-telephone me-2"></i><?php echo $member['']; ?></li>
                  <?php } ?>
                  <?php if (isset($member[''])) { ?>
                    <li class="mb-1"><i class="bi bi-at me-2"></i><?php echo $member['']; ?></li>
                  <?php } ?>
                  <?php if (isset($member[''])) { ?>
                    <li class="mb-1"><i class="bi bi-globe me-2"></i><?php echo $member['']; ?></li>
                  <?php } ?>
                  <?php if (isset($member[''])) { ?>
                    <li class="mb-1"><i class="bi bi-geo-alt me-2"></i><?php echo $member['']; ?></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <!--++++++++++Footer+++++++++++++++++++++  -->

  <?php
  require_once "partials/footer.php";
  ?>