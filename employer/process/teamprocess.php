<?php
session_start();
require_once "../employee_guard.php";
require_once "../classes/Team.php";
require_once "../classes/Utilities.php";


$admin = ($_SESSION['useronline']);
$org = $admin['organization_id'];

$addTeam = new Team();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['addTeam'])) {
        $team = Utilities::cleanText($_POST['teamName']);
        $desc = Utilities::cleanText($_POST['teamDesc']);
        $teamOrg = $org;

        $result = $addTeam->addTeam($team, $desc, $teamOrg);
        if ($result) {
            // Team added successfully
            $successMessage = "Team added successfully";
            header("location: ../organization.php");
        } else {
            $errors[] = "Error adding team to Organization";
        }
    } else {
        //submit button not used
    }
} else {
    //method is not post
}
