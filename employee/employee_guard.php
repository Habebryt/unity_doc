<?php
if(!isset($_SESSION['useronline'])){
    $_SESSION['user_errormsg'] = '<div class="alert alert-danger text-center display-5"> You need to login </div>';
    header("location: index.php");
    exit;
}
?>