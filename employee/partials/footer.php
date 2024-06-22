<div class="modal fade" id="addDocument" aria-hidden="true" aria-labelledby="addDocumentLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="addDocumentLabel">Upload Document</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="documentForm" action="process/document_process.php" method="post" enctype="multipart/form-data">
          <div class="mb-3 col-12">
            <label for="fileUpload" class="form-label fw-bold">Select Document:</label>
            <input type="file" class="form-control" id="fileUpload" name="fileUpload" accept=".pdf,.doc,.docx" required>
          </div>
          <div class="mb-3 col-12">
            <label for="tag" class="form-label fw-bold">Tag Document:</label>
            <input type="text" class="form-control" id="tag" name="tag" placeholder="Enter a tag">
          </div>
          <div class="mb-3 col-12">
            <label for="description" class="form-label fw-bold">Document Description:</label>
            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter a description" style="resize: none;"></textarea>
          </div>
          <div class="d-flex justify-content-end">
            <button type="submit" id="uploadBtn" class="btn btn-primary" name="uploadBtn">Upload</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="shareDoc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="staticBackdropLabel">Document Sharing</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="process/sharing_process.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="doc_file" class="form-label fw-bold">Document File:</label>
            <input type="file" class="form-control" id="doc_file" name="doc_file" required>
          </div>
          <div class="mb-3">
            <label for="doc_desc" class="form-label fw-bold">Document Description:</label>
            <textarea class="form-control" id="doc_desc" name="doc_desc" rows="3" placeholder="Enter document description"></textarea>
          </div>
          <div class="mb-3">
            <label for="receiver_email" class="form-label fw-bold">Collaborator Email:</label>
            <input type="email" class="form-control" id="receiver_email" name="receiver_email" placeholder="Enter collaborator email" required>
          </div>
          <div class="mb-3">
            <label for="receiver_username" class="form-label fw-bold">Collaborator Username:</label>
            <input type="text" class="form-control" id="receiver_username" name="receiver_username" placeholder="Enter collaborator username (optional)">
          </div>
          <div class="mb-3">
            <label for="collaboration_desc" class="form-label fw-bold">Collaboration Description:</label>
            <textarea class="form-control" id="collaboration_desc" name="collaboration_desc" rows="3" placeholder="Enter collaboration description"></textarea>
          </div>
          <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" name="shareBtn">Share</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="viewDoc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="staticBackdropLabel"><strong>Document:</strong> <span id="modalDocTitle"></span></h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8">
            <p class="fw-bold mb-2">Document File:</p>
            <iframe id="modalDocFile" width="100%" height="500px"></iframe>
          </div>
          <div class="col-md-4">
            <div class="mb-3">
              <label for="modalDocDesc" class="form-label fw-bold">Description:</label>
              <input type="text" class="form-control" id="modalDocDesc" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label fw-bold">Uploaded By:</label>
              <div class="row">
                <div class="col-md-4">
                  <input type="text" class="form-control" id="modalUploadedBy" readonly>
                </div>
                <div class="col-md-5">
                  <input type="text" class="form-control" id="modalEmail" readonly>
                </div>
                <div class="col-md-3">
                  <input type="text" class="form-control" id="modalUploadedDate" readonly>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Share</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="viewSharedDoc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="staticBackdropLabel"><strong>Document:</strong> <span id="sharedDocTitle"></span></h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6 overflow-hidden">
            <p class="fw-bold mb-2">Document File:</p>
            <iframe id="sharedDocFilePDF" width="100%" height="400px" style="display:none;"></iframe>
            <iframe id="sharedDocFileDOCX" width="100%" height="400px" style="display:none;"></iframe>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="sharedCollabDesc" class="form-label fw-bold">Collaboration Description:</label>
              <input type="text" class="form-control" id="sharedCollabDesc" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label fw-bold">Shared With:</label>
              <div class="row">
                <div class="col-md-4">
                  <input type="text" class="form-control" id="sharedDocTo" readonly>
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="sharedDocToEmail" readonly>
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="sharedDocDate" readonly>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success sharebtn" id="shareDocInView" data-bs-target="#shareViewDoc" data-bs-toggle="modal">Share</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="shareViewDoc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Doc Sharing</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form action="process/sharing_process.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <input type="hidden" id="hidden_doc_file" name="hidden_doc_file">
            </div>
            <div class="form-group">
              <label for="share_doc_desc">Document Description:</label>
              <textarea class="form-control" id="share_doc_desc" name="doc_desc" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="share_receiver_email">Collaborator Email</label>
              <input type="email" class="form-control" id="share_receiver_email" name="receiver_email" placeholder="Collaborator Email">
            </div>
            <div class="form-group">
              <label for="share_receiver_username">Collaborator Username</label>
              <input type="text" class="form-control" id="share_receiver_username" name="receiver_username" placeholder="Collaborator Username Optional">
            </div>
            <div class="form-group">
              <label for="share_collaboration_desc">Collaboration Description:</label>
              <textarea class="form-control" id="share_collaboration_desc" name="collaboration_desc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="shareBtn">Share</button>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- =========== Scripts =========  -->
<script src="assets/statics/js/jquery-3.7.1.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    window.viewDocument = function(button) {
      var docId = $(button).data('user');

      $.ajax({
        url: 'process/doc_process.php',
        method: 'POST',
        data: {
          docId: docId
        },
        dataType: 'json', // Expecting JSON response
        success: function(response) {
          //console.log('Parsed docId:', response);

          if (response.error) {
            console.error(response.error);
            // Handle error case
            return;
          }

          // Assuming response is an array of objects with doc details
          var docDetails = response[0];

          if (docDetails) {
            //console.log(docDetails);
            $('#modalDocTitle').text(docDetails.doc_title);
            $('#modalDocDesc').val(docDetails.doc_desc);
            $('#modalUploadedBy').val(docDetails.firstname + ' ' + docDetails.lastname);
            $('#modalEmail').val(docDetails.user_email);
            $('#modalUploadedDate').val(docDetails.upload_date);
            $('#modalDocFile').attr('src', 'documents/' + docDetails.document_file);
          } else {
            // Handle case where no document details are available
          }

          // Show the modal after updating content
          $('#viewDoc').modal('show');
        },
        error: function(xhr, status, error) {
          console.error("AJAX request failed:", error);
          // Handle AJAX request error
        }
      });
    }


    window.viewSharedDocument = function(button) {
      var docId = $(button).data('user');

      $.ajax({
        url: 'process/shared_doc_process.php',
        method: 'POST',
        data: {
          docId: docId
        },
        dataType: 'json', // Expecting JSON response
        success: function(response) {
          if (response.error) {
            return;
          }

          var sharedDoc = response[0];

          if (sharedDoc) {
            $('#sharedDocTitle').text(sharedDoc.doc_title);
            $('#sharedCollabDesc').val(sharedDoc.collaboration_desc);
            $('#sharedDocTo').val(sharedDoc.shared_with_firstname + ' ' + sharedDoc.shared_with_lastname);
            $('#sharedDocToEmail').val(sharedDoc.shared_with_email);
            $('#sharedDocDate').val(sharedDoc.upload_date);

            var fileUrl = 'sharing/' + sharedDoc.document_file;
            var fileExtension = fileUrl.split('.').pop().toLowerCase();

            if (fileExtension === 'pdf') {
              $('#sharedDocFilePDF').attr('src', fileUrl).show();
              $('#sharedDocFileDOCX').hide();
            } else {
              $('#sharedDocFilePDF').hide();
              $('#sharedDocFileDOCX').hide();
            }
          } else {
            // Handle case where no document details are available
          }

          $('#viewSharedDoc').modal('show');
        },
        error: function(xhr, status, error) {
          console.error("AJAX request failed:", error);
        }
      });
    };

    // Function to populate the shareViewDoc modal
    window.populateShareModal = function() {
      if (window.sharedDocData) {
        var sharedDoc = window.sharedDocData;
        $('#share_doc_desc').val(sharedDoc.doc_desc);
        $('#share_receiver_email').val(sharedDoc.shared_with_email);
        $('#share_receiver_username').val(sharedDoc.shared_with_username);
        $('#share_collaboration_desc').val(sharedDoc.collaboration_desc);

        // Populate the hidden input field with the file path
        $('#hidden_doc_file').val(sharedDoc.document_file);

        $('#shareViewDoc').modal('show');
      }
    }

    // Attach event listener to the "Share" button in the viewSharedDoc modal
    $(document).ready(function() {
      $('#shareDocInView').click(function() {
        populateShareModal();
      });
    });
  });
</script>
<script src="assets/statics/js/main.js"></script>
<script src="assets/statics/css/bootstrap/js/bootstrap.js"></script>
<script src="assets/statics/css/bootstrap/js/bootstrap.bundle.js"></script>
<script>
  $(document).ready(function() {
    $('#supportForm').on('submit', function(s) {
      s.preventDefault();

      // Show loading bar
      $('#loadingBar').show();

      $.ajax({
        url: 'process/support_process.php',
        method: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response) {
          // Hide loading bar
          $('#loadingBar').hide();

          if (response.status === 'success') {
            $('#responseMessage').html('<div class="alert alert-success">' + response.message + '</div>');
            $('#subject').val('');
            $('#message').val('');

          } else {
            $('#responseMessage').html('<div class="alert alert-danger">' + response.message + '</div>');
          }
        },
        error: function(xhr, status, error) {
          // Hide loading bar
          $('#loadingBar').hide();

          $('#responseMessage').html('<div class="alert alert-danger"> An error occurred while sending your request. Please try again.</div>');
        }
      });
    });

    $('#profileUpdate').on('submit', function(p) {
      p.preventDefault();

      $('#loadingBar').show();

      $.ajax({
        url: 'process/profile_update.php',
        method: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response) {
          // Hide loading bar
          $('#loadingBar').hide();

          if (response.status === 'success') {
            $('#responseMessage').html('<div class="alert alert-success">' + response.message + '</div>');

          } else {
            $('#responseMessage').html('<div class="alert alert-danger">' + response.message + '</div>');
          }
        },
        error: function(xhr, status, error) {
          // Hide loading bar
          $('#loadingBar').hide();

          $('#responseMessage').html('<div class="alert alert-danger"> An error occurred while updating your profile. Please try again.</div>');
        }
      });
    });

    $('#contactUpdate').on('submit', function(c) {
      c.preventDefault();

      $('#loadingBar').show();

      $.ajax({
        url: 'process/contact_update.php',
        method: 'POST',
        data: $(this).serialize(),
        dataType: 'text',
        success: function(response) {
          // Hide loading bar
          $('#loadingBar').hide();

          if (response.status === 'success') {
            $('#responseMessage').html('<div class="alert alert-success">' + response.message + '</div>');

          } else {
            $('#responseMessage').html('<div class="alert alert-danger">' + response.message + '</div>');
          }
        },
        error: function(xhr, status, error) {
          // Hide loading bar
          $('#loadingBar').hide();

          $('#responseMessage').html('<div class="alert alert-danger"> An error occurred while updating contact info. Please try again.</div>');
        }
      });
    });

    $('#companyUpdate').on('submit', function(m) {
      m.preventDefault();

      $('#loadingBar').show();

      $.ajax({
        url: 'process/company_update.php',
        method: 'POST',
        data: $(this).serialize(),
        dataType: 'text',
        success: function(response) {
          // Hide loading bar
          $('#loadingBar').hide();

          if (response.status === 'success') {
            $('#responseMessage').html('<div class="alert alert-success">' + response.message + '</div>');

          } else {
            $('#responseMessage').html('<div class="alert alert-danger">' + response.message + '</div>');
          }
        },
        error: function(xhr, status, error) {
          // Hide loading bar
          $('#loadingBar').hide();

          $('#responseMessage').html('<div class="alert alert-danger"> An error occurred while updating contact info. Please try again.</div>');
        }
      });
    });
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var alerts = document.querySelectorAll('.alert-fly');

    alerts.forEach(function(alert) {
      setTimeout(function() {
        alert.style.transition = 'opacity 0.5s ease-in-out';
        alert.style.opacity = '0';
        setTimeout(function() {
          alert.remove();
        }, 500);
      }, 3000);
    });
    var alertz = document.querySelectorAll('.alert-fly2');

    alertz.forEach(function(alert) {
      setTimeout(function() {
        alertz.style.transition = 'opacity 0.5s ease-in-out';
        alertz.style.opacity = '0';
        setTimeout(function() {
          alert.remove();
        }, 500);
      }, 3000);
    });
  });
</script>




<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>