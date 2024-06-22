<div class="modal fade" id="addDocument" aria-hidden="true" aria-labelledby="addDocumentLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addDocumentLabel">Upload Document</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="documentForm" action="process/document_process.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="fileUpload">Select Document:</label>
            <input type="file" id="fileUpload" name="fileUpload" accept=".pdf,.doc,.docx" required>
          </div>
          <div class="form-group">
            <label for="tag">Tag Document:</label>
            <input type="text" id="tag" name="tag">
          </div>
          <div class="form-group">
            <label for="description">Document Description:</label>
            <textarea id="description" name="description"></textarea>
          </div>
          <div class="button-container">
            <button type="submit" id="uploadBtn" class="uploadbtn" name="uploadBtn">Upload</button>
            <button type="button" id="closeBtn" class="closebtn">Close</button>
            <button type="button" id="shareBtn" class="sharebtn" data-bs-target="#addDocument2" data-bs-toggle="modal">Share</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="addDocument2" aria-hidden="true" aria-labelledby="addDocumentLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addDocumentLabel2">Doc Sharing</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h2>Share Document</h2>
        <form id="shareForm">
          <div class="form-group">
            <label for="shareEmail">Email:</label>
            <input type="email" id="shareEmail" name="shareEmail" required>
          </div>
          <div class="button-container">
            <button type="submit" id="shareSubmitBtn" class="uploadbtn">Share</button>
            <button type="button" id="shareCloseBtn" class="closebtn"><span class="close">&times;</span></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addTeam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Team</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="process/teamprocess.php" method="post" enctype="multipart/form-data">
          <label for="teamName">
            <input type="text" name="teamName" id="teamName" placeholder="Team Name">
          </label>
          <label for="teamDesc">
            <input type="text" name="teamDesc" id="teamDesc" placeholder="Describe Team">
          </label>
          <input type="submit" name="addTeam" value="Add Team" class="btn btn-primary">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- =========== Scripts =========  -->
<script src="assets/statics/js/jquery-3.7.1.js"></script>
<script src="assets/statics/js/main.js"></script>
<script src="assets/statics/js/ajax.js"></script>
<script src="assets/statics/css/bootstrap/js/bootstrap.js"></script>
<script src="assets/statics/css/bootstrap/js/bootstrap.bundle.js"></script>


<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>