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

        if (!empty($firstname) || !empty($lastname) || !empty($email) || !empty($password)) {
            return "UnityDocs User Registered";
            die();
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
                // Username is correct, let's check the password
                if ($result['user_password'] === $password) {
                    // Login is correct, then we keep the person's id in session.
                    $_SESSION['adminonline'] = $result['admin_id'];

                    // We fetch all user information and store it in session
                    $user = "SELECT * FROM users WHERE admin_id=?";
                    $stmt = $this->conn->prepare($user);
                    $stmt->execute([$result['admin_id']]);
                    $userdata = $stmt->fetch(PDO::FETCH_ASSOC);
                    // Store user data in session
                    $_SESSION['result'] = $userdata;
                } else {
                    $_SESSION['admin_errormsg'] = "Invalid credentials";
                    return 0;
                }
            } else {
                // If the username is not correct
                $_SESSION['admin_errormsg'] = "Invalid credentials";
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


    public function profileUpdate()
    {
        return "UnityDocs User profile updated Successfully";
    }

    public function logoutUser()
    {
        session_destroy();
        session_unset();
    }
}

//$newUser = new User;
//$user = $newUser->loginUser('habeeb@unitydocs', 'admin1234');
//$user = $newUser->logoutUser();
//echo "$user";
