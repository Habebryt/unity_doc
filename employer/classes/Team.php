<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

require_once "Db.php";


class Team extends Db
{
    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }

    public function addTeam($team_name, $team_desc, $team_org)
    {

        try {

            $add = "INSERT INTO team (team_name, team_desc, team_org) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($add);
            $result = $stmt->execute([$team_name, $team_desc, $team_org]);

            if ($result) {
                //doc added successfully
                $id = $this->conn->lastinsertId();
                return $id;
            } else {
                //upload failed
                $_SESSION['team_errormsg'] = "Failed to add team. Please try again";
                return false;
            }
        } catch (PDOException $d) {
            $_SESSION['team_errormsg'] = $d->getMessage();
            return false;
        } catch (Exception $e) {
            $_SESSION['team_errormsg'] = $e->getMessage();
            return false;
        }
    }

    public function getTeamMembers($orgid)
    {
        try {
            $sql = "SELECT * FROM users
            WHERE users.user_org = ?
        ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$orgid]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            $_SESSION['errormsg'] = $e->getMessage();
            return 0;
        } catch (Exception $e) {
            $_SESSION['errormsg'] = $e->getMessage();
            return 0;
        }
    }

    public function getTeam($orgid)
    {
        try {
            $sql = "SELECT * FROM team WHERE team_org = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$orgid]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            $_SESSION['errormsg'] = $e->getMessage();
            return 0;
        } catch (Exception $e) {
            $_SESSION['errormsg'] = $e->getMessage();
            return 0;
        }
    }
}
