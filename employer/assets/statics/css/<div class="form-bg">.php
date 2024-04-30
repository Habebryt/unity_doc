<div class="form-bg">
            <form action="signup.php" method="post">
                <div class="user_details">
                    <div class="group">
                        <label for="user_fname" class="label">First Name</label>
                        <input id="user_fname" type="text" class="input" name="user_fname" required>
                    </div>
                    <div class="group">
                        <label for="user_lname" class="label">Last Name</label>
                        <input id="user_lname" type="text" class="input" name="user_lname" required>
                    </div>
                </div>
                <div class="user_details">
                    <div class="group">
                        <label for="user_org" class="label">Company Name</label>
                        <input id="user_org" type="text" class="input" name="user_org">
                    </div>
                    <div class="group">
                        <label for="user_email" class="label">Email Address</label>
                        <input id="user_email" type="email" class="input" name="user_email" required>
                    </div>
                </div>
                <div class="user_details">
                    <div class="group">
                        <label for="user_password" class="label">Password</label>
                        <input id="user_password" type="password" class="input" name="user_password" required>
                    </div>
                    <div class="group">
                        <label for="user_confirm_password" class="label">Confirm Password</label>
                        <input id="user_confirm_password" type="password" class="input" name="user_confirm_password" required>
                    </div>
                </div>
                <div class="user_details">
                    <div class="group">
                        <input type="reset" class="button" value="Reset Form">
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign Up">
                    </div>
                </div>
            </form>
        </div>