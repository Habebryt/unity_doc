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

    public function registerUser($firstname, $lastname, $email, $password, $org) {
        try {
            // Begin a registration
            $this->conn->beginTransaction();
    
            // Hash the password using bcrypt
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
            $sql = "INSERT INTO users (firstname, lastname, user_email, user_password, user_org) VALUES (?,?,?,?,?)";
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute([$firstname, $lastname, $email, $hashedPassword, $org]);
    
            if ($result) {
                // Registration successful, fetch user details
                $user_id = $this->conn->lastInsertId();
                $sql = "SELECT * FROM USERS WHERE idusers = ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$user_id]);
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

    // public function registerUser($firstname, $lastname, $email, $password, $org)
    // {
    //     try {
    //         // Begin a registration
    //         $this->conn->beginTransaction();
    //         $sql = "INSERT INTO users (firstname, lastname, user_email, user_password, user_org) VALUES (?,?,?,?,?)";
    //         $stmt = $this->conn->prepare($sql);
    //         $result = $stmt->execute([$firstname, $lastname, $email, $password, $org]);

    //         if ($result) {
    //             // Registration successful, fetch user details
    //             $user_id = $this->conn->lastInsertId();
    //             $sql = "SELECT * FROM USERS WHERE idusers = ?";
    //             $stmt = $this->conn->prepare($sql);
    //             $stmt->execute([$user_id]);
    //             $user = $stmt->fetch(PDO::FETCH_ASSOC);
    //             // Commit registration
    //             $this->conn->commit();
    //             return $user;
    //         } else {
    //             // Rollback registration if registration fails
    //             $this->conn->rollBack();
    //             // Registration failed
    //             $_SESSION['user_errormsg'] = "Failed to register user. Please try again.";
    //             return false;
    //         }
    //     } catch (PDOException $p) {
    //         // Set error message
    //         $_SESSION['user_errormsg'] = $p->getMessage();

    //         // Rollback the transaction
    //         $this->conn->rollBack();

    //         return false;
    //     } catch (Exception $e) {
    //         // Set error message
    //         $_SESSION['user_errormsg'] = $e->getMessage();

    //         // Rollback the transaction
    //         $this->conn->rollBack();

    //         return false;
    //     }
    // }

    public function loginUser($email, $password)
    {
        try {
            $sql = "SELECT * FROM users WHERE user_email=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                // Username is correct, let's verify the password
                $hashedPassword = $result['user_password'];
                if (password_verify($password, $hashedPassword)) {
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

    public function getUser($user)
    {
        if ($user) {
            // Convert $user to string if it's an array
            if (is_array($user)) {
                $user = $user['idusers']; // Assuming 'idusers' is the key for user ID
            }

            $sql = "SELECT 
        users.*, 
        user_access_level.user_level_name, 
        organization.org_name, 
        organization.org_email, 
        organization.org_phone, 
        organization.org_country, 
        organization.org_state,
        team.team_name, 
        country.country_name, 
        state.state_name
    FROM 
        users
    LEFT JOIN 
        organization ON organization.idorganization = users.user_org 
    LEFT JOIN 
        team ON team.idteam = users.user_team_id
    LEFT JOIN 
        user_access_level ON user_access_level.user_level_id = users.user_access_level_id 
    LEFT JOIN 
        country ON country.idcountry = users.user_country
    LEFT JOIN 
        state ON state.idstate = users.user_state
    WHERE 
        users.idusers = :user_id;
    ";

            $statement = $this->dbconn->prepare($sql);
            $statement->bindParam(':user_id', $user, PDO::PARAM_STR); // Specify the parameter type as string
            $statement->execute();
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            return $user;
        }
    }

    public function getAdmin($admin){
        
    }

    public function updateContactInfo($phone, $profileId)
    {
        try {
            // Prepare the SQL statement with placeholders
            $sql = "UPDATE users SET user_phone = :phone WHERE idusers = :id";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
            $statement->bindParam(':id', $profileId, PDO::PARAM_INT);
            $result = $statement->execute();

            if ($result) {
                return true;
            } else {
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

    public function updatePersonalInfo($firstname, $lastname, $username, $country, $state, $zip, $profileId)
    {
        try {
            // Prepare the SQL statement with placeholders
            $sql = "UPDATE users SET username = :username, firstname = :firstname, lastname = :lastname, user_country = :user_country, user_state = :user_state, zip_code = :zip_code WHERE idusers = :id";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(':username', $username, PDO::PARAM_STR);
            $statement->bindParam(':firstname', $firstname, PDO::PARAM_STR);
            $statement->bindParam(':lastname', $lastname, PDO::PARAM_STR);
            $statement->bindParam(':user_country', $country, PDO::PARAM_INT);
            $statement->bindParam(':user_state', $state, PDO::PARAM_INT);
            $statement->bindParam(':zip_code', $zip, PDO::PARAM_STR);
            $statement->bindParam(':id', $profileId, PDO::PARAM_INT);
            $result = $statement->execute();

            if ($result) {
                return true;
            } else {
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

    public function updateCompanyInfo($role, $team, $profileId)
    {
        try {
            $sql = "UPDATE users SET user_role = :role, user_team_id = :team WHERE idusers = :id";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(':role', $role, PDO::PARAM_STR);
            $statement->bindParam(':team', $team, PDO::PARAM_INT);
            $statement->bindParam(':id', $profileId, PDO::PARAM_INT);
            $result = $statement->execute();

            return $result;
        } catch (PDOException $p) {
            $_SESSION['user_errormsg'] = $p->getMessage();
            return false;
        } catch (Exception $e) {
            $_SESSION['user_errormsg'] = $e->getMessage();
            return false;
        }
    }



    public function getUserById($id)
    {
        try {
            $query = "SELECT * FROM org_admin WHERE org_admin_id = ?";
            $stmt = $this->dbconn->prepare($query);
            $stmt->execute($id);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            $_SESSION['errormsg'] = $e->getMessage();
            return false; // Return false to indicate failure
        }
    }


    public function logoutUser()
    {
        session_unset();
        session_destroy();
    }

    public function getOrgs()
    {
        $sql = "SELECT * FROM organization";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

// $user = new User;

// $add = $user->registerUser('lastnamek', 'firstname', 'tesre2@email.com', '1234', 1);


// print_r($add);
