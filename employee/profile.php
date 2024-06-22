<?php
session_start();
require_once "partials/header.php";
require_once "classes/User.php";
require_once "classes/Utilities.php";
require_once "classes/Country.php";
require_once "classes/Team.php";
require_once "employee_guard.php";
?>

<!-- Main Content -->
<div class="main">
  <?php require_once "partials/tab.php"; ?>

  <?php
  $allTeam = new Team;
  $id = $_SESSION['useronline'];
  $userId = $id['idusers'];
  $user = new User;
  $thisUser = $user->getUser($userId);
  $orgid = $thisUser['user_org'];
  $teams = $allTeam->getTeam($orgid);
  $country = new Country();
  $countries = $country->getCountries();
  ?>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body text-center">
            <?php
            if (isset($thisUser['profile_image'])) {
              echo "<img src='uploads/" . $thisUser['profile_image'] . "' alt='Profile Image' class='img-fluid rounded-circle mb-3' style='width: 100px; height: 100px;'>";
            } else {
              echo '<form action="process/profile_update.php" method="POST" enctype="multipart/form-data">';
              echo '<label for="profile-image" class="upload-label mb-3">';
              echo '<span class="material-symbols-outlined">upload</span>';
              echo 'Upload Profile Image';
              echo '</label>';
              echo "<input type='file' id='profile-image' name='profile-image' value=''>";
            }
            ?>
            <h4 class="card-title"><?php echo $thisUser['firstname'] . " " . $thisUser['lastname']; ?></h4>
            <p class="card-text text-muted"><?php echo $thisUser['user_role']; ?></p>
            <p class="card-text text-muted"><strong>@<?php echo $thisUser['org_name']; ?></strong></p>

          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <i class="material-symbols-outlined me-2">calendar_today</i>
              <?php echo Utilities::getDateParts($thisUser['user_date_registered']); ?>
            </li>
            <li class="list-group-item">
              <i class="material-symbols-outlined me-2">event_available</i>
              Last Login: 8 days ago
            </li>
            <li class="list-group-item">
              <i class="material-symbols-outlined me-2">tag</i>
              Employee Id: #2454353
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <ul class="nav nav-tabs" id="profileTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab" aria-controls="personal" aria-selected="true">Personal Info</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="company-tab" data-bs-toggle="tab" data-bs-target="#company" type="button" role="tab" aria-controls="company" aria-selected="false">Company Info</button>
              </li>
            </ul>
            <div class="tab-content" id="profileTabContent">
              <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                <form method="post" id="profileUpdate">
                  <!-- Feedback response div -->
                  <div id="responseMessage" class="mt-3 text-center"></div>
                  <div class="row mt-3">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" name="firstname" value="<?php echo $thisUser['firstname']; ?>" class="form-control" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" name="lastname" value="<?php echo $thisUser['lastname']; ?>" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" placeholder="Enter Username" value="<?php echo $thisUser['username']; ?>" class="form-control" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="zip">Zip Code</label>
                        <input type="text" name="zip" placeholder="Your Area Zip Code" value="<?php echo $thisUser['zip_code']; ?>" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="country">Country</label>
                        <select name="country" id="country" class="form-control">
                          <option value="<?php echo isset($thisUser['user_country']) ? $thisUser['user_country'] : ''; ?>" selected><?php echo isset($thisUser['country_name']) ? $thisUser['country_name'] : ''; ?></option>
                          <?php foreach ($countries as $country) : ?>
                            <option value="<?php echo $country['idcountry']; ?>"><?php echo $country['country_name']; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="state">State</label>
                        <select name="state" id="state" class="form-control">
                          <option value="" <?php echo isset($thisUser['user_state']) ? $thisUser['user_state'] : ''; ?>"" selected><?php echo isset($thisUser['state_name']) ? $thisUser['state_name'] : ''; ?></option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="id" value="<?php echo $thisUser['idusers'] ?>">
                  <button type="submit" name="personalUpdate" class="btn btn-primary mt-3">Update Personal Info</button>
                </form>
                <div id="loadingBar" class="progress mt-3" style="display:none;">
                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%;"></div>
                </div>
              </div>
              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <form method="post" id="contactUpdate">
                  <div id="responseMessage" class="mt-3 text-center"></div>
                  <div class="row mt-3">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="phone">Telephone</label>
                        <input type="text" name="phone" value="<?php echo $thisUser['user_phone']; ?>" class="form-control" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Your Email" value="<?php echo $thisUser['user_email']; ?>" class="form-control" readonly />
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="id" value="<?php echo $thisUser['idusers'] ?>">
                  <button type="submit" name="contactUpdate" class="btn btn-primary mt-3">Update Contact Info</button>
                </form>
                <div id="loadingBar" class="progress mt-3" style="display:none;">
                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%;"></div>
                </div>
              </div>
              <div class="tab-pane fade" id="company" role="tabpanel" aria-labelledby="company-tab">
                <form method="post" id="companyUpdate">
                  <div class="row mt-3">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="company_name">Organization:</label>
                        <input type="text" name="company_name" value="<?php echo isset($thisUser['user_org']) ? $thisUser['org_name'] : ''; ?>" class="form-control" readonly />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="company_access">Access Level:</label>
                        <input type="text" name="company_access" placeholder="Access Level" value="<?php echo Utilities::makeCapital($thisUser['user_level_name']); ?>" class="form-control" readonly />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="company_role">Company Role:</label>
                        <input type="text" name="company_role" value="<?php echo isset($thisUser['user_role']) ? $thisUser['user_role'] : ''; ?>" <?php echo isset($thisUser['user_role']) ? 'readonly' : ''; ?> class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="team">Team:</label>
                        <select name="team" id="team" class="form-control">
                          <?php if (!isset($thisUser['user_team_id'])) : ?>
                            <option value="" hidden>Select Team</option>
                          <?php else : ?>
                            <option value="<?php echo $thisUser['user_team_id']; ?>" selected><?php echo $thisUser['team_name']; ?></option>
                          <?php endif; ?>
                          <?php foreach ($teams as $team) : ?>
                            <?php if (isset($thisUser['user_team_id']) && $thisUser['user_team_id'] == $team['idteam']) continue; ?>
                            <option value="<?php echo $team['idteam']; ?>"><?php echo $team['team_name']; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="id" value="<?php echo $thisUser['idusers'] ?>">
                  <button type="submit" name="companyUpdate" class="btn btn-primary mt-3">Update Company Info</button>
                </form>
                <div id="loadingBar" class="progress mt-3" style="display:none;">
                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%;"></div>
                </div>
              </div>
              <div id="responseMessage"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once "partials/footer.php"; ?>