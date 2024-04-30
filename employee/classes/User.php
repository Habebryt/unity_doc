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

    public function registerUser($firstname, $lastname, $email, $password)
    {
        try {
            $sql = "INSERT INTO USERS (firstname, lastname, user_email, user_password) VALUES (?,?,?,?)";
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute([$firstname, $lastname, $email, $password]);

            if ($result) {
                // Registration successful
                $id = $this->conn->lastInsertId();
                return $id;
            } else {
                // Registration failed
                $_SESSION['user_errormsg'] = "Failed to register user. Please try again.";
                return false;
            }
        } catch (PDOException $p) {
            // Set error message
            $_SESSION['user_errormsg'] = $p->getMessage();
            return false;
        } catch (Exception $e) {
            // Set error message
            $_SESSION['user_errormsg'] = $e->getMessage();
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

//$newUser = new User;
//$user = $newUser->loginUser('habeeb@unitydocs', 'admin1234');
//$user = $newUser->logoutUser();
//echo "$user";
