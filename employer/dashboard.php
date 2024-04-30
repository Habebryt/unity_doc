<?php
session_start();
ini_set("display_errors", "1");

echo "<pre>";
print_r($_SESSION['userdata']);
echo "</pre>";
?>

<!-- Header Here -->
<?php require_once "partials/header.php"; ?>
<!-- Header Ends Here -->
        <!-- Aside Content Starts Here -->
        <?php require_once "partials/aside.php"; ?>
        <!-- Aside Content Ends Here -->
        <!-- Main Content Starts Here -->
        <main>
            <h1>Dashboard</h1>
            <div class="date">
                <input type="date" />
            </div>
            <div class="search">
                <input type="search" placeholder="Search" />
            </div>

            <!-- Insights -->
            <?php require_once "partials/insights.php"; ?>

            <!-- Documents Table -->
            <div class="recent-docs">
                <h2>Recent Documents</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Document Name</th>
                            <th>Document Tags</th>
                            <th>Creator</th>
                            <th>Collaborators</th>
                            <th>Status</th>
                            <th>Upload Date</th>
                            <th>Activity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Cloud Engineering</td>
                            <td><span>Cloud</span> <span>Engineering</span></td>
                            <td>Habeeb B.</td>
                            <td>2</td>
                            <td><span class="success">Active</span></td>
                            <td>27th - April - 2024</td>
                            <td>Update</td>
                        </tr>
                        <tr>
                            <td>Cloud Engineering</td>
                            <td><span>Cloud</span> <span>Engineering</span></td>
                            <td>Habeeb B.</td>
                            <td>2</td>
                            <td><span class="success">Active</span></td>
                            <td>27th - April - 2024</td>
                            <td>Update</td>
                        </tr>
                        <tr>
                            <td>Cloud Engineering</td>
                            <td><span>Cloud</span> <span>Engineering</span></td>
                            <td>Habeeb B.</td>
                            <td>2</td>
                            <td><span class="success">Active</span></td>
                            <td>27th - April - 2024</td>
                            <td>Update</td>
                        </tr>
                        <tr>
                            <td>Cloud Engineering</td>
                            <td><span>Cloud</span> <span>Engineering</span></td>
                            <td>Habeeb B.</td>
                            <td>2</td>
                            <td><span class="success">Active</span></td>
                            <td>27th - April - 2024</td>
                            <td>Update</td>
                        </tr>
                        <tr>
                            <td>Cloud Engineering</td>
                            <td><span>Cloud</span> <span>Engineering</span></td>
                            <td>Habeeb B.</td>
                            <td>2</td>
                            <td><span class="success">Active</span></td>
                            <td>27th - April - 2024</td>
                            <td>Update</td>
                        </tr>
                         <tr>
                            <td>Cloud Engineering</td>
                            <td><span>Cloud</span> <span>Engineering</span></td>
                            <td>Habeeb B.</td>
                            <td>2</td>
                            <td><span class="success">Active</span></td>
                            <td>27th - April - 2024</td>
                            <td>Update</td>
                        </tr>
                    </tbody>
                </table>
                <a href="#">View All</a>
            </div>
        </main>
        <!-- Main Content Ends Here -->
        <!-- Right Sidebar -->
        <div class="right">
            <!-- Top Section -->
            <div class="top">
                <button class="menu-btn">
                    <span class="material-symbols-outlined"> menu </span>
                </button>
                <div class="theme-toggler">
                    <span class="material-symbols-outlined active"> light_mode </span>
                    <span class="material-symbols-outlined"> dark_mode </span>
                </div>
                <div class="user-info">
                    <p>Hey, <b>Habeeb</b></p>
                    <small class="muted-text">Admin</small>
                </div>
            </div>
            <!-- Notifications -->
            <div class="recent-notifications">
                <h2>Recent Notifications</h2>
                <div class="notifications">
                    <div class="notification">
                        <div class="profile-pic">
                            <img src="assets/statics/images/feedback/customer_12.jpg" alt="" />
                        </div>
                        <div class="message">
                            <p><b>John Blessing</b> Shared A Document with you.</p>
                            <small class="text-muted"> 2 Minutes Ago</small>
                        </div>
                    </div>
                    <div class="notification">
                        <div class="profile-pic">
                            <img src="assets/statics/images/feedback/customer_11.jpg" alt="" />
                        </div>
                        <div class="message">
                            <p><b>Alex Paul</b> Dropped a Comment on a Shared Document.</p>
                            <small class="text-muted"> 2 Hours Ago</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="doc-analytics">
                <h2>My Documents</h2>
                <div class="uploaded docs">
                    <div class="icon">
                        <span class="material-symbols-outlined"> upload </span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>Uploaded.</h3>
                            <small>Last 24 Hours.</small>
                        </div>
                        <h5 class="success">+20</h5>
                        <h3>Total Docs: <span>56</span></h3>
                    </div>
                </div>
                <div class="shared docs">
                    <div class="icon">
                        <span class="material-symbols-outlined"> share </span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>Shared.</h3>
                            <small>Last 24 Hours.</small>
                        </div>
                        <h5 class="warning">0</h5>
                        <h3>Total Shared: <span>40</span></h3>
                    </div>
                </div>
            </div>
        </div>
<!-- Footer Here -->
<?php require_once "partials/footer.php"; ?>
<!-- Footer Ends Here -->