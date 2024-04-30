<?php
// Example email address
$email = 'email@email.com';

// Example email extension to check against
$emailExtension = '@email.com';

// Check if email domain matches the allowed domain
if (strpos($email, '@') !== false) {
    $emailParts = explode('@', $email);
    $domain = $emailParts[1];
    
    if ($domain === $emailExtension) {
        // Query database to check if admin already exists for this domain
        $query = "SELECT * FROM users WHERE user_email = :email AND role = 'admin'";
        $statement = $this->dbconn->prepare($query);
        $statement->bindParam(':email', $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        
        if (!$result) {
            // No admin found, designate current user as admin
            $updateQuery = "UPDATE users SET role = 'admin' WHERE email = :email";
            $updateStatement = $this->dbconn->prepare($updateQuery);
            $updateStatement->bindParam(':email', $email);
            if ($updateStatement->execute()) {
                echo "User designated as admin successfully.";
            } else {
                echo "Error updating record: " . $this->dbconn->errorInfo()[2];
            }
        } else {
            // Admin already exists for this domain
            echo "Admin already exists for this domain.";
        }
    } else {
        // Domain not allowed
        echo "Domain not allowed for admin privileges.";
    }
} else {
    // Invalid email format
    echo "Invalid email address format.";
}
?>



<script type="text/javascript">
        $(function() {
            $("#message_form").submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                var $submitInput = $("#sub_msg");
                var originalInputValue = $submitInput.val();
                var spinnerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
                var holdOnMessage = 'Hold On... Message Sending.';

                $.ajax({
                    url: "server4.php", // Double-check the path
                    method: "POST",
                    data: formData,
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    cache: false,
                    beforeSend: function() {
                        // Before sending
                        $submitInput.val(holdOnMessage).attr('disabled', true);
                        $submitInput.before(spinnerHTML);
                    },
                    success: function(response) {
                        // Remove the spinner
                        $submitInput.prev('.spinner-border').remove();

                        switch (response.success) {
                            case true:
                                $("#res").html('<p class="alert alert-success" role="alert">' + response.message + '</p>');

                                // Clear relevant form fields on success (optional)
                                $("#cv").val("");
                                $submitInput.val(originalInputValue).attr('disabled', false);
                                break;
                            case false:
                                $("#res").html('<p class="alert alert-danger" role="alert">' + response.message + '</p>');
                                $submitInput.val("Try Again").attr('disabled', false);
                                break;
                        }
                    },
                    complete: function() {
                        // After completion, reset the input value and enable it
                        $submitInput.val(originalInputValue).attr('disabled', false);
                    },
                    error: function(error) {
                        console.error("Error:", error); // Log the error object
                    }
                });
            });
        });
    </script>
