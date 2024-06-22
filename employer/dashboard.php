<?php
ini_set("display_errors", "1");
session_start();
require_once "employee_guard.php";
require_once "classes/Document.php";
require_once "classes/User.php";
require_once "classes/Share.php";
require_once "classes/Utilities.php";

$id = ($_SESSION['orgadminonline']);

$orgId = $id['organization_id'];

$docs = new Document;
$documents = $docs->getDocuments($orgId);

$share = new Share;
$sharedWith = $share->sharedWith($orgId);

$share = new Share;
$sharedBy = $share->sharedBy($orgId);

$recDocuments = $docs->getRecentDocuments($orgId);

$allShared = is_array($sharedWith) ? count($sharedWith) : 0;

$allReceived = is_array($sharedBy) ? count($sharedBy) : 0;

$totalDocuments = is_array($documents) ? count($documents) : 0;

$allDocuments = array_merge($documents, $sharedWith, $sharedBy);

$sumDocuments = is_array($allDocuments) ? count($allDocuments) : 0;

$id = $_SESSION['orgadminonline'];

$orgEmail = $id['org_admin_email'];

$user = new User;
$thisUser = $user->getAdmin($orgEmail);




?>



<?php require_once "partials/header.php" ?>

<!-- ========================= Main ==================== -->
<div class="main">
  <!--  =============================TopBar ============================= -->
  <?php require_once "partials/tab.php" ?>
  <!--  =============================TopBar Ends Here ============================= -->

  <?php

  $id = ($_SESSION['orgadminonline']);
  // print_r($id);
  ?>
  <!-- ======================= Cards ================== -->
  <div class="cardBox">
    <div class="cardDoc">
      <div>
        <div class="numbers"><?php echo $totalDocuments;
                              ?></div>
        <div class="cardName">Documents</div>
      </div>

      <div class="iconBx">
        <ion-icon name="document-attach-outline"></ion-icon>
      </div>
    </div>

    <div class="cardDoc">
      <div>
        <div class="numbers"><?php echo $allShared; ?></div>
        <div class="cardName">Shared Documents</div>
      </div>

      <div class="iconBx">
        <ion-icon name="share-outline"></ion-icon>
      </div>
    </div>

    <div class="cardDoc">
      <div>
        <div class="numbers"><?php echo $allReceived; ?></div>
        <div class="cardName">Received Documents</div>
      </div>
      <div class="iconBx">
        <ion-icon name="archive-outline"></ion-icon>
      </div>
    </div>

    <div class="cardDoc d-block">
      <div class="row mb-3">
        <div class="col-md-12">
          <div class="numbers"><?php echo $sumDocuments; ?></div>
          <div class="cardName">All Documents:</div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-auto">
          <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#addDocument">
            Add Doc
          </button>
        </div>
        <div class="col-md-auto">
          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#shareDoc">
            Share
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- ================ Document Details List ================= -->
  <div class="details">
    <div class="row">
      <div class="col-md-8">
        <div class="recentDocs">
          <div class="cardHeader d-flex justify-content-between align-items-center">
            <h2>Documents</h2>
            <a href="document.php" class="btn btn-primary">View All</a>
          </div>
          <div class="table-responsive">
            <table class="table table-hover">
              <?php if (empty($recDocuments)) : ?>
                <tr>
                  <td colspan="6" class="alert alert-danger d-flex justify-content-between align-content-center" role="alert">You currently have no documents on UnityDocs. <a class="alert-link btn btn-primary link-light" data-bs-target="#addDocument" data-bs-toggle="modal">Kindly add documents</a></td>
                </tr>
              <?php else : ?>
                <thead>
                  <tr>
                    <th scope="col">Doc Title</th>
                    <th scope="col">Doc Tag</th>
                    <th scope="col">Doc Type</th>
                    <th scope="col">Creator</th>
                    <th scope="col">Created</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($recDocuments as $recdoc) : ?>
                    <tr>
                      <td><?php echo Utilities::reduceTitle($recdoc['doc_title'] ?? ''); ?></td>
                      <td><?php echo $recdoc['tag_name']; ?></td>
                      <td>PDF</td>
                      <td>
                        <img src="uploads/<?php echo $thisUser['profile_image']; ?>" alt="<?php echo $recdoc['firstname'] ?? ''; ?>" class="img-fluid" width="20" height="20">
                        <?php echo ($recdoc['firstname'] ?? '') . ' ' . Utilities::getFirstLetterOfLastName($recdoc['lastname'] ?? ''); ?>
                      </td>
                      <td><?php echo Utilities::getDateParts($recdoc['upload_date'] ?? ''); ?></td>
                      <td>
                        <button class="btn btn-primary view-doc-btn" data-bs-toggle="modal" data-bs-target="#viewDoc" data-user="<?php echo $recdoc['iddocument']; ?>" onclick="viewDocument(this)">
                          View
                        </button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>

                </tbody>

            </table>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="recentDocuments">
          <div class="cardHeader d-flex justify-content-between align-items-center">
            <h2>Received Docs</h2>
            <?php if (!empty($sharedBy)) { ?>
              <a href="collaboration.php" class="btn btn-primary disabled">View All</a>
            <?php } else { ?>
              <a href="collaboration.php" class="btn btn-primary d-none">View All</a>
            <?php } ?>
          </div>
          <table class="table table-hover">
            <tbody>
              <?php if (empty($sharedBy)) : ?>
                <tr>
                  <td class="bg-danger text-white">You presently have no actively shared documents.</td>
                </tr>
              <?php else : ?>
                <?php foreach ($sharedBy as $received) : ?>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="imgBx me-2">
                          <img src="uploads/<?php echo $received['profile_image']; ?>" alt="<?php echo $received['firstname'] ?? ''; ?>" class="img-fluid rounded-circle" width="30" height="30">
                        </div>
                        <div>
                          <h6 class="mb-0"><?php echo $received["firstname"]; ?></h6>
                          <small><?php echo $received["doc_title"]; ?></small>
                        </div>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!--++++++++++Footer+++++++++++++++++++++  -->

  <?php
  require_once "partials/footer.php";
  ?>