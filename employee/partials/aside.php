<?php
$user = ($_SESSION['useronline']);
?>

<aside>
    <div class="top">
        <div class="logo">
            <img src="assets/statics/images/logo/unitydocsicon.png" alt="UnityDocs Logo" />
            <h2><?php
                if(!empty($user['user_org'])){
                    echo "UnityDocs";
                }else{
                     echo $user['user_org'];
                }
                ?></h2>
        </div>
        <div class="close close-btn">
            <span class="material-symbols-outlined"> left_panel_close </span>
        </div>
    </div>
    <div class="sidebar">
        <a href="dashboard.php" class="active">
            <span class="material-symbols-outlined"> dashboard </span>
            <h3>Dashboard</h3>
        </a>
        <a href="document.php">
            <span class="material-symbols-outlined"> article </span>
            <h3>Documents</h3>
        </a>
        <a href="organization.php">
            <span class="material-symbols-outlined"> group </span>
            <h3>Organization</h3>
        </a>
        <a href="collaboration.php">
            <span class="material-symbols-outlined"> folder_shared </span>
            <h3>Collaboration</h3>
        </a>
        <a href="update.php">
            <span class="material-symbols-outlined"> notifications </span>
            <h3>Updates</h3>
            <span class="update-count">99</span>
        </a>
        <a href="control.php">
            <span class="material-symbols-outlined"> lock </span>
            <h3>Access Control</h3>
        </a>
        <a href="support.php">
            <span class="material-symbols-outlined"> support_agent </span>
            <h3>Support</h3>
        </a>
        <a href="settings.php">
            <span class="material-symbols-outlined"> Settings </span>
            <h3>Settings</h3>
        </a>
        <a href="#" onclick="confirmLogout()">
            <span class="material-symbols-outlined"> logout </span>
            <h3>Logout</h3>
        </a>
    </div>
</aside>