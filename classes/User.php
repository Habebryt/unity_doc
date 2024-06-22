<?php
ini_set("display_errors", "1");
// session_start();
error_reporting(E_ALL);

require_once "Db.php";

class User extends Db
{
    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }

    public function registerUser($firstname, $lastname, $email, $password)
    {
        try {
            // Begin a registration
            $this->conn->beginTransaction();
    
            $sql = "INSERT INTO USERS (firstname, lastname, user_email, user_password) VALUES (:firstname, :lastname, :email, :password)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $result = $stmt->execute();
    
            if ($result) {
                // Registration successful, fetch user details
                $user_id = $this->conn->lastInsertId();
                $sql = "SELECT * FROM USERS WHERE idusers = :user_id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':user_id', $user_id);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
                // Commit registration
                $this->conn->commit();
    
                return $user;
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

    public function trialRegister($firstname, $lastname, $email)
    {
        try{
            $this->conn->beginTransaction();
    
            $sql = "INSERT INTO TRIALS (firstname, lastname, trial_email) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute([$firstname, $lastname, $email]);
    
            if ($result) {
                // Trial registration successful, fetch trial user details
                $trial_user = $this->conn->lastInsertId();
                $sql = "SELECT * FROM TRIALS WHERE trial_id = $trial_user";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$trial_user]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
                // Commit registration
                $this->conn->commit();
    
                return $user;
            } else {
                // Rollback registration if registration fails
                $this->conn->rollBack();
    
                // Registration failed
                $_SESSION['user_errormsg'] = "Failed to register trial user. Please try again.";
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
            $sql = "SELECT * FROM users WHERE user_email=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                // Username is correct, let's verify the password
                if ($result['user_password'] === $password) {
                    // Login is correct, then we keep the person's id in session.
                    $_SESSION['useronline'] = $result['admin_id'];
                    // Store user data directly in session
                    $_SESSION['useronline'] = $result;
                    return 1; // Login successful
                } else {
                    $_SESSION['user_errormsg'] = "Invalid credentials";
                    return 0;
                }
            } else {
                // If the username is not correct
                $_SESSION['user_errormsg'] = "Invalid credentials";
                return 0;
            }
        } catch (PDOException $e) {
            $_SESSION['user_errormsg'] = $e->getMessage();
            return 0;
        } catch (Exception $e) {
            $_SESSION['user_errormsg'] = $e->getMessage();
            return 0;
        }
    }
    
    public function profileUpdate()
    {
        return "UnityDocs User profile updated Successfully";
    }

    public function logoutUser()
    {
        session_unset();
        session_destroy();
    }
}

$newUser = new User;
$user = $newUser->trialRegister('habeeb', 'bright', 'habeeb2@gmail.com');

echo "<pre>";
print_r($user);
echo "</pre>";
