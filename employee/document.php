<?php

ini_set("display_errors", "1");
session_start();
require_once "employee_guard.php";
require_once "classes/User.php";
require_once "classes/Document.php";
require_once "classes/Utilities.php";


$id = $_SESSION['useronline'];

$userId = $id['idusers'];
$docs = new Document;
$documents = $docs->getDocuments($userId);


$tableLimit = isset($_GET['limit']) ? intval($_GET['limit']) : 10;

$totalPages = ceil(count($documents) / $tableLimit);

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$offset = ($page - 1) * $tableLimit;

$currentPageDocuments = array_slice($documents, $offset, $tableLimit);

$maxDocumentsPerPage = count($documents);

$limitOptions = array();
for ($i = 5; $i <= $maxDocumentsPerPage; $i += 5) {
  $limitOptions[] = $i;
}




$user = new User;
$userId = $user->getUserById($id);  //Get user details by ID

$getUser = new User;
$user = $getUser->getUser($_SESSION['useronline']);


?>

<?php require_once "partials/header.php" ?>

<!-- ========================= Main ==================== -->
<div class="main">
  <!--  =============================TopBar ============================= -->
  <?php require_once "partials/tab.php" ?>
  <!--  =============================TopBar Ends Here ============================= -->
  <!-- ================ Document Details List ================= -->
  <div class="details">
    <div class="alert-fly">
      <?php if (isset($_SESSION['doc_success'])) : ?>
        <div class="alert alert-primary alert-dismissible text-center alert-fly">
          <p class="text-success"><?php echo $_SESSION['doc_success']; ?> <i class="fa-regular fa-circle-check"></i></p>
        </div>
        <?php unset($_SESSION['doc_success']); ?>
      <?php endif; ?>
      <?php if (isset($_SESSION['doc_error'])) : ?>
        <div class="alert alert-danger text-center alert-fly">
          <p class="text-success"><?php echo $_SESSION['doc_error']; ?> <i class="fa-regular fa-circle-check"></i></p>
        </div>
        <?php unset($_SESSION['doc_error']); ?>
      <?php endif; ?>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="recentDocs">
          <div class="cardHeader d-flex justify-content-between align-items-center">
            <h2>Documents</h2>
            <a class="btn btn-primary d-flex justify-content-between" data-bs-target="#addDocument" data-bs-toggle="modal">
              <div class="iconBx">
                <ion-icon name="add-circle-outline"></ion-icon>
              </div>Add Document
            </a>
          </div>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Doc Title</th>
                  <th scope="col">Doc Tags</th>
                  <th scope="col">Description</th>
                  <th scope="col">Creator</th>
                  <th scope="col">Created</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($currentPageDocuments as $userdocuments) : ?>

                  <tr>
                    <td><?php echo Utilities::reduceTitle($userdocuments['doc_title']); ?></td>
                    <td><?php echo ($userdocuments['tag_name']) ?></td>
                    <td><?php echo $userdocuments['doc_desc']; ?></td>
                    <td>
                      <div class="row justify-content-evenly align-content-center">
                        <div class="col-md-2">
                          <div style="border: 2px solid blue; border-radius: 50%; width: 30px; height: 30px;">
                            <img src="uploads/<?php
                                              if (isset($userdocuments['profile_image'])) {
                                                echo $userdocuments['profile_image'];
                                              } else {
                                                echo $userdocuments['default_image'];
                                              } ?>" alt="" style="width: 100%; height: 100%; border-radius: 50%;">
                          </div>
                        </div>
                        <div class="col-md-6 mx-auto">
                          <?php echo $userdocuments['firstname'] . " " . Utilities::getFirstLetterOfLastName($userdocuments['lastname']); ?>
                        </div>
                      </div>
                    </td>
                    <td><?php echo Utilities::getDateParts($userdocuments['upload_date']);  ?></td>
                    <td>
                      <button class="btn btn-primary view-doc-btn" data-bs-toggle="modal" data-bs-target="#viewDoc" data-user="<?php echo $userdocuments['iddocument']; ?>" onclick="viewDocument(this)">
                        View
                      </button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="container">

            <form class="row g-3" action="" method="get">
              <?php if ($limitOptions >= 10) { ?>
                <div class="col-auto">
                  <label for="limit" class="col-form-label">Rows per Page:</label>
                </div>
                <div class="col-auto">

                  <select class="form-select" name="limit" id="limit">
                    <?php foreach ($limitOptions as $option) : ?>
                      <option value="<?php echo $option; ?>" <?php if ($tableLimit == $option) echo "selected"; ?>><?php echo $option; ?></option>
                    <?php endforeach; ?>
                  </select>

                </div>
                <div class="col-auto">
                  <input type="submit" class="btn btn-primary" value="Apply">
                </div>
              <?php } ?>
          </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 d-flex justify-content-center">

    <a href="?limit=<?php echo count($documents); ?>" class="btn btn-primary">View All</a>

  </div>
</div>

<!--++++++++++Footer+++++++++++++++++++++  -->

<?php
require_once "partials/footer.php";
?>