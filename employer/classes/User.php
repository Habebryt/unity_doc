<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

require_once "Db.php";

class User extends Db
{
    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }


    public function registerUser($firstname, $lastname, $email, $password, $org)
    {

        try {
            // Begin a registration
            $this->conn->beginTransaction();
            $sql = "INSERT INTO organization (org_name) VALUES (?)";
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute([$org]);

            if ($result) {
                // Organization Registration successful, fetch Org Id

                $orgId = $this->conn->lastInsertId();

                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO org_admin (org_admin_email, org_admin_pass, firstname, lastname, organization_id) VALUES (?,?,?,?,?)";
                $stmt = $this->conn->prepare($sql);
                $result1 = $stmt->execute([$email, $hashedPassword, $firstname, $lastname, $orgId]);

                if ($result1) {
                    $adminId = $this->conn->lastInsertId();
                    $sql = "SELECT * FROM org_admin WHERE org_admin_id = ?";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute([$adminId]);
                    $admin = $stmt->fetch(PDO::FETCH_ASSOC);
                    // Commit registration
                    $this->conn->commit();
                    return $admin;
                }
            } else {
                // Rollback registration if registration fails
                $this->conn->rollBack();
                // Registration failed
                $_SESSION['user_errormsg'] = "Failed to register user. Please try again.";
                return false;
            }
        } catch (PDOException $p) {
            // Set error message
            $_SESSION['user_errormsg'] = $p->getMessage();

            // Rollback the transaction
            $this->conn->rollBack();

            return false;
        } catch (Exception $e) {
            // Set error message
            $_SESSION['user_errormsg'] = $e->getMessage();

            // Rollback the transaction
            $this->conn->rollBack();

            return false;
        }
    }

    public function loginUser($email, $password)
    {
        try {
            $sql = "SELECT * FROM org_admin WHERE org_admin_email=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $hashedPassword = $result['org_admin_pass'];
                if (password_verify($password, $hashedPassword)) {
                    $_SESSION['orgadminonline'] = $result['admin_id'];
                    $_SESSION['orgadminonline'] = $result;
                    return 1;
                } else {
                    return 0;
                }
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            $_SESSION['admin_errormsg'] = $e->getMessage();
            return 0;
        } catch (Exception $e) {
            $_SESSION['admin_errormsg'] = $e->getMessage();
            return 0;
        }
    }

    public function getAdmin($OrgEmail)
    {
        $sql = "SELECT * FROM org_admin 
        JOIN organization ON organization.idorganization =org_admin.organization_id
        JOIN country  ON country.idcountry =  organization.org_country
        JOIN state ON state.idstate =  organization.org_state
        WHERE org_admin_email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$OrgEmail]);
        $orgAdmin = $stmt->fetch(PDO::FETCH_ASSOC);
        return $orgAdmin;
    }
    public function logoutUser()
    {
        session_unset();
        session_destroy();
    }
}


// $admin = new User;
// $add = $admin->registerUser('firstname', 'lastname', 'admin@email.com', 'password', 'org');
// print_r($add);
